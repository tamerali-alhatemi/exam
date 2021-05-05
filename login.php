<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="icon" href="img/favicon.ico">
		<!-- CSS FILES -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style2.css">
	</head>
	<body class="login uk-cover-container uk-background-secondary uk-flex uk-flex-center uk-flex-middle uk-height-viewport uk-overflow-hidden uk-light" data-uk-height-viewport>
		<!-- overlay -->
		<div class="uk-position-cover uk-overlay-primary"></div>
		<!-- /overlay -->
		<div class="uk-width-large uk-padding-small uk-position-z-index" uk-scrollspy="cls: uk-animation-fade">
			
			<div class="uk-text-center uk-margin">
		
			</div>
			<?php
session_start();
require_once('connection/conect.php');
if(isset($_POST["login"]))
{
$error="";
if(isset($_POST["Email"])&& isset($_POST["Password"]))
{
		echo '<script>alert("dfasdf")</script>';
$query='select Email from users where Email="'.$_POST['Email'].'";';
$result=mysqli_query($con_db,$query);
$que='select Password from users where Password="'.$_POST['Password'].'";';
$resu=mysqli_query($con_db,$que);
if((mysqli_num_rows($result)>0)&&(mysqli_num_rows($resu)>0))
{
$query1='select * from users where Email="'.$_POST['Email'].'" and  Password="'.$_POST['Password'].'";';
$result1=mysqli_query($con_db,$query1);
	   while($row1=mysqli_fetch_assoc($result1))
		{
		$_SESSION['U_id'] =$row1['U_id'];
		$_SESSION['Name'] =$row1['Name'];
		$_SESSION['Email'] =$row1['Email'];
		$_SESSION['Password'] =$row1['Password'];
		header("location:accounts.php");
		}
		
}
else if((mysqli_num_rows($result)>0)&&(mysqli_num_rows($resu)==0))
    {
echo '<script> alert("كلمة المرور غير صحيحة"); </script>';	
	}
else if((mysqli_num_rows($result)==0)&&(mysqli_num_rows($resu)>0))
   {
	echo '<script> alert("الايميل غير صحيح"); </script>';
   }
else if((mysqli_num_rows($result)==0)&&(mysqli_num_rows($resu)==0))
   {
	echo '<script> alert("الايميل وكلمة المرور غير صحيح"); </script>';	
   }
}
}
 ?>
			<!-- login -->
			<form class="toggle-class" method="post" enctype="multipart/form-data">
				<fieldset class="uk-fieldset">
					<div class="uk-margin-small">
						<div class="uk-inline uk-width-1-1">
							<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
							<input class="uk-input uk-border-pill" required placeholder="Email" type="Email" name="Email" >
						</div>
					</div>
					<div class="uk-margin-small">
						<div class="uk-inline uk-width-1-1">
							<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
							<input class="uk-input uk-border-pill" required placeholder="Password" type="Password" name="Password">
						</div>
					</div>
					<div class="uk-margin-bottom uk-margin-top">
						<button type="submit" name="login" id="login" class="uk-button uk-border-pill login uk-width-1-1">تسجيل الدخول</button>
					</div>
				</fieldset>
			</form>
			<!-- /login -->
		</div>
		
		<!-- JS FILES -->
		<script src="js/script.js"></script>
		<script src="js/iconscript.js"></script>
	</body>
</html>