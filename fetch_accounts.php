<?php
//fetch.php
require_once('connection/conect.php');
session_start();
if(isset($_SESSION['U_id']))
{
$counter=0;
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con_db, $_POST["query"]);
 $query = "
  SELECT * FROM accounts 
  WHERE account_number LIKE '%".$search."%'
  OR account_name LIKE '%".$search."%' or father_account LIKE '%".$search."%'
 ";
}
else
{
 $query ="select * from accounts";
}
$result = mysqli_query($con_db, $query);
if(mysqli_num_rows($result)> 0)
{
  $output.='<style media="screen">
      .uk-button{
      padding: 13px;
      border-radius: 30px;
      width: 100px;
      height: 48px;
      text-align: center;
      font-family: "Open Sans";
      font-size: 18px;
      font-weight: 600;
      color: black;
      line-height: 1;
      background:-webkit-linear-gradient(left, rgb(244, 118, 14) 0%, rgb(244, 176, 14) 100%);
      }
      .uk-table-hover tbody tr:hover, .uk-table-hover > tr:hover {
      background-color: #80808014;
      }
      td{
            text-align: -webkit-center !important;
      }
      th{
            text-align: -webkit-center !important;
			color:black !important;
			font-size:20px;
      }
  </style>';
	$output .='
  <table class="uk-table uk-table-hover uk-table-divider uk-table-right" style="margin-top: 70px;" align="center">
  				<thead>
  			<tr>
            <th>العدد</th>
            <th>أسم الحساب</th>
            <th>رقم الحساب</th>
            <th>الحساب الاب</th>
            <th>العملات</th>
            <th>تعديل</th>
			<th>حذف</th>
			</tr>
				</thead>
  <form action ="" method="post">
';
 while($row1 = mysqli_fetch_array($result))
 {
					$counter++;
					$id=$row1['id'];
					$account_number=$row1['account_number'];
					$account_name=$row1['account_name'];
					$output .= '<tr style="border-bottom: white 3px solid;background-color:white">';
                    $output .= '<td>'.$counter.'</td>';
					 $output .= '<td>'.$account_name.'</td><td>'.$account_number.'</td>';
					 $query4 = "SELECT * FROM main_accounts where id=".$row1['father_account']."";
					$result4 = mysqli_query($con_db, $query4);
					$row4 = mysqli_fetch_array($result4);
					$father_account =$row4['name'];
					 $output .= '
					  <td>'. $father_account.'</td>';
					  $currencies='';
					   $query2 ="select * from account_currencies where account_id=".$id."";
						$result2 = mysqli_query($con_db, $query2);
						if(mysqli_num_rows($result2) > 0)
						{
							 while($row2 = mysqli_fetch_array($result2))
							 {
								$query3 = "SELECT * FROM currencies where id=".$row2['currency_id']."";
								$result3 = mysqli_query($con_db, $query3);
								$row3 = mysqli_fetch_array($result3);
								$currencies .= ' '.$row3['name'].' - ';
							 }
							 $currencies=substr($currencies, 0, -2);
						}
						
					 $output .='
					 <td>'. $currencies.'</td>
					  <td><a href="update.php?id='.$id.'" data-uk-icon="file-edit" style="color:back;"></a></td>
					  <td><a onclick="return checkDelete()" href="delete_account.php?id='.$id.'" data-uk-icon="trash" style="color:Red;"></button></td></tr>';
 }
  $output .= '</form></table>';
 echo $output;
}
else
{
 echo '<div class="uk-container uk-text-center" style="margin-top: 62px;" dir="rtl"><h1 style="margin-top">لا يوجد نتائج</h1><div>';
}
}