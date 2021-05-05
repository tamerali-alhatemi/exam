<?php
require_once('connection/conect.php');
session_start();
if (isset($_SESSION['U_id'])){
						$value = $_GET["id"];
				        $result=mysqli_query($con_db,"delete from accounts where id=".$value."") ;
						$result=mysqli_query($con_db,"delete from account_currencies where account_id=".$value."") ;
				        header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else
{
	echo "<h1>هذه الصفحة غير متاحة</h1>";
}
?>
