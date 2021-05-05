<?php
define('HOST','localhost');
define('USER_NAME','root');
define('PASSWORD','');
define('DB_NAME','account');
$con_db=mysqli_connect(HOST,USER_NAME);
if(mysqli_connect_errno())
{
	echo "error number:".mysqli_connect_errno();
	echo "error number:".mysqli_connect_error();
}
mysqli_select_db($con_db,DB_NAME);
?>
