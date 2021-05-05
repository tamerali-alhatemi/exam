<?php
require_once('connection/conect.php');
if(isset($_POST["insert"]))
{
	$number=$_POST['number'];
	$name=$_POST['name'];
	$father=$_POST['father'];
	$query="INSERT INTO `accounts`(account_number,account_name,father_account) VALUES (".$number.",'".$name."',".$father.")";
	$resultat = $con_db->query($query);
    $id= $con_db->insert_id;
	if($id!=0){
	foreach ($_POST['currencies'] as $selectedOption){
	$query2="INSERT INTO `account_currencies`(account_id,currency_id) VALUES (".$id.",'".$selectedOption."')";
	$do2=mysqli_query($con_db, $query2);
	}
	}	
	if ($id!=0 && $do2)
	{
		?>
		<script>alert("تم الاضافة بنجاح");</script>
		<?php
	}
	else{
		?>
		<script>alert("حدث خطأ");</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html lang="ar">
  <head>
  <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contact</title>
		<link rel="icon" href="img/favicon.ico">
		<!-- CSS FILES -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php
  session_start();
  if (isset($_SESSION['U_id'])) {
  ?>
	<style>
		*{
			font-family: "Hacen", Tunisia Lt_0 !important;
		}
		@font-face {
		font-family: 'Hacen';
		src:url('fonts/Hacen Tunisia_0.ttf');
		}
	  </style>
<div class="uk-flex uk-flex-center uk-flex-middle" dir="rtl" style="margin-top: 60px;">
		<div class="uk-width-large uk-padding-small uk-position-z-index" uk-scrollspy="cls: uk-animation-fade">
    		<div class="uk-text-center">
            <h3>إضافة حساب</h3>
			<form method="post" enctype="multipart/form-data">
			<fieldset class="uk-fieldset">
			    <div class="uk-margin">
					<input class="uk-input uk-border-pill" type="number" placeholder="رقم الحساب" name="number" required>
				</div>
				<div class="uk-margin">
					<input class="uk-input uk-border-pill" type="text" placeholder="الأسم" name="name" required>
				</div>
                <div class="uk-margin">
					 <div class="uk-form-controls">
                              <select class="uk-select" id="father" name="father">
                                <?php
                                $query2 = "select * from main_accounts";
                                $result2 = mysqli_query($con_db, $query2);
                                if (mysqli_num_rows($result2) > 0) {
                                  while ($row1 = mysqli_fetch_assoc($result2)) {
                                    $name = $row1['name'];
                                    $id = $row1['id'];
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                  }
                                }
                                ?>
                              </select>
                            </div>
				</div>
				<div class="uk-margin">
					 <div class="uk-form-controls">
                              <select class="uk-select" id="currencies" name="currencies[]" multiple>
                                <?php
                                $query2 = "select * from currencies";
                                $result2 = mysqli_query($con_db, $query2);
                                if (mysqli_num_rows($result2) > 0) {
                                  while ($row1 = mysqli_fetch_assoc($result2)) {
                                    $name = $row1['name'];
                                    $id = $row1['id'];
                                    $symbol = $row1['symbol'];
                                    echo '<option value="' . $id . '"><span>'.$symbol.' - </span>' . $name . '</option>';
                                  }
                                }
                                ?>
                              </select>
                            </div>
				</div>
				<button class="uk-button uk-button-default uk-border-pill uk-width-1-1" style="color:white;background-color:#e6717a;margin-top:10px;font-size: 1.2em;" type="submit" id="insert" value="insert" name="insert">أرسال</button>
			</fieldset>
			</form>
		   </div>
		    </div>
 </div>
<!-- End Footer -->
<script src="js/script.js"></script>
		<script src="js/iconscript.js"></script>
  </body>
  <?php } else {
    header("Location:login.php");
  }
?>
</html>
