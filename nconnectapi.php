<?php
require_once '../include/DbHandler.php';
require_once '../include/PassHash.php';
require '.././libs/Slim/Slim.php';
define('DB_HOST', 'localhost');
define('DB_NAME', 'task_manager');
define('DB_USER','vyk');
define('DB_PASSWORD','navneeta');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$u = $_POST['user'];
$p = $_POST['pass'];


$db = new DbHandler();
            // check for correct email and password
            if ($db->checkLogin($email, $password)) {
                // get the user by email
                $user = $db->getUserByEmail($email);

                if ($user != NULL) {
	echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
    }
	else
	{
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}
}
?>
