<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ديرتي</title>
  <!-- CSS FILES -->
  	<link rel="icon" href="img/favicon.ico">
		<!-- CSS FILES -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- UIkit JS -->
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['U_id'])) {
  ?>
    <style media="screen">
      * {
        font-family: "Hacen", Tunisia Lt_0 !important;
      }

      @font-face {
        font-family: 'Hacen';
        src: url('fonts/Hacen Tunisia_0.ttf');
      }
    </style>
    <?php
    require_once('connection/conect.php');
    $value = $_GET["id"];
    if ($value > 0) {
      $query2 = "select * from accounts where id=" . $value . "";
      $result2 = mysqli_query($con_db, $query2);
      if (mysqli_num_rows($result2) > 0) {
        while ($row1 = mysqli_fetch_assoc($result2)) {
          $account_number = $row1['account_number'];
          $account_name = $row1['account_name'];
          $father_account = $row1['father_account'];
        }
      

      if (isset($_POST["update"])) {
		  
    $number=$_POST['number'];
	$name=$_POST['name'];
	$father=$_POST['father'];
	$query="UPDATE `accounts`set account_number=".$number." ,account_name='".$name."' ,father_account=".$father." where id=".$value."";
	$resultat = $con_db->query($query);
	$result=mysqli_query($con_db,"delete from account_currencies where account_id=".$value."");
    foreach ($_POST['currencies'] as $selectedOption){
	$query2="INSERT INTO `account_currencies`(account_id,currency_id) VALUES (".$value.",".$selectedOption.")";
	$do2=mysqli_query($con_db, $query2);
	}
if ($do2)
	{
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else{
		?>
		<script>alert("حدث خطأ");</script>
		<?php
	}	
      }
    ?>
	
	<div class="uk-flex uk-flex-center uk-flex-middle" dir="rtl" style="margin-top: 60px;">
		<div class="uk-width-large uk-padding-small uk-position-z-index" uk-scrollspy="cls: uk-animation-fade">
    		<div class="uk-text-center">
            <h3>تعديل بيانات الحساب</h3>
			<form method="post" enctype="multipart/form-data">
			<fieldset class="uk-fieldset">
			    <div class="uk-margin">
					<input class="uk-input uk-border-pill" type="number" placeholder="رقم الحساب" value="<?php echo (htmlspecialchars($account_number)); ?>" name="number" required>
				</div>
				<div class="uk-margin">
					<input class="uk-input uk-border-pill" type="text" placeholder="الأسم" value="<?php echo (htmlspecialchars($account_name)); ?>" name="name" required>
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
									echo '<option value="' . $id . '"';
                                    if ($id == $father_account)
                                      echo 'selected="selected"';
                                    echo '>' . $name . '</option>';
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
								$account_currencies=array();
								 $query3 = "select currency_id from account_currencies where account_id=".$value."";
                                $result3= mysqli_query($con_db, $query3);
                                if (mysqli_num_rows($result3) > 0) {
                                  while ($row3 = mysqli_fetch_assoc($result3)) {
									  $account_currencies[]=$row3['currency_id'];
								  }
								}
                                $query2 = "select * from currencies";
                                $result2 = mysqli_query($con_db, $query2);
                                if (mysqli_num_rows($result2) > 0) {
                                  while ($row1 = mysqli_fetch_assoc($result2)) {
                                    $name = $row1['name'];
                                    $id = $row1['id'];
                                    $symbol = $row1['symbol'];
									echo '<option value="' . $id . '"';
                                    if (in_array($id, $account_currencies)==true)
                                      echo 'selected="selected"';
                                    echo '><span>'.$symbol.' - </span>' . $name . '</option>';
                                   
                                  }
                                }
                                ?>
                              </select>
                            </div>
				</div>
				<button class="uk-button uk-button-default uk-border-pill uk-width-1-1" style="color:white;background-color:#e6717a;margin-top:10px;font-size: 1.2em;" type="submit" id="update" value="update" name="update">أرسال</button>
			</fieldset>
			</form>
		   </div>
		    </div>
 </div>
	
   
    <!-- end right side-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit-icons.min.js"></script>
  <?php }}} else {
    header("Location:login.php");
  }
  ?>
</body>

</html>