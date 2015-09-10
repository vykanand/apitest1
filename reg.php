<?php
require_once '/include/config.php';
require_once '/include/DbHandler.php';
require_once '/include/PassHash.php';
require '/libs/Slim/Slim.php';
$con=mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$n = $_POST['name'];
$e = $_POST['email'];
$p = $_POST['pass'];
$cp = $_POST['cpass'];
$pi = $_POST['pin'];
if($p == $cp)
{
 $db = new DbHandler();
 $reqst = $db->createUser($n, $e, $p, $pi);
 if($reqst == USER_CREATED_SUCCESSFULLY){
 echo "User created successfully";
 }
 else if ($reqst == USER_CREATE_FAILED){ echo "Signup Failed.Use Different Credentials";}
 else if ($reqst == USER_ALREADY_EXISTED){echo "User with this email already exists.";}
}
else
{
	echo "Failed to Sign up..Confirming password again.";
}
?>