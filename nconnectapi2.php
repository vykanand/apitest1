<?php
require_once '/include/PassHash.php';
define('DB_HOST', 'localhost');
define('DB_NAME', 'task_manager');
define('DB_USER','vyk');
define('DB_PASSWORD','navneeta');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$u = $_POST['user'];
$p = $_POST['pass'];
$pi = $_POST['pin'];

$sql = "SELECT password_hash FROM users where email = '$u' and pin = '$pi'" ;
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
    $row = mysql_fetch_array($result);
            // check for correct email and password
            if (PassHash::check_password($row[0] ,$p)) 
	echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
    
	else
	
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	
?>
