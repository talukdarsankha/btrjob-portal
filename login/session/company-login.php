<?php
session_start();

include '../../classes/Crud.php';

ini_set('display_errors', 1);

include 'deviceInfo.php';

$crud = new Crud();

// $details = $crud -> Read("details", " 1 ORDER BY `id` DESC LIMIT 1");

// $appName = $details[0]['app_name'];

// $appNameLower = strtolower($appName);
if (isset($_SESSION['user-email']) && isset($_SESSION['user-password'])){

date_default_timezone_set('Asia/Kolkata');
	$connection = new DbConfig();
	$con = $connection -> connect();
	$email = $_SESSION['user-email'];
	$password = $_SESSION['user-password'];
	

	$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string

	$hash = hash('sha512', $password . $salt);
	// echo $email;
	// echo $hash;

	$stmt=$con->prepare("SELECT * FROM `company` WHERE (`email`='$email') AND `password`='$hash'");
	$stmt->execute();
	// var_dump($stmt);
	$row = $stmt -> fetch(PDO:: FETCH_ASSOC);
	if($stmt->rowCount()==1)
	{	
		
			// $_SESSION[$appNameLower . '_email'] = $email;
			$_SESSION['this_user_id'] = $row['id'];

			$_SESSION['this_user_name'] = $row['name'];
			// $_SESSION['this_user_username'] = $row['username'];
			// $_SESSION['userType'] = $row['user_type'];
			$_SESSION['userType'] = 'COMPANY';
			$_SESSION['userMail'] = $row['email'];
			// $_SESSION['user_image'] = $row['user_image'];

			$user_id = $row['id'];

			$os = getOs();

			$browser = getBrowser();

			$ip = $_SERVER['REMOTE_ADDR'];

			$login_date = date('Y-m-d');

			$login_time = date('H:i:s');

			$sql2 = $con -> prepare("INSERT INTO `company_login_details` (`user_id`, `os`, `browser`, `ip`, `login_date`, `login_time`) VALUES ('$user_id', '$os', '$browser', '$ip', '$login_date', '$login_time')");

			$sql2 -> execute();

			$_SESSION['errorLogin'] = "";

			header("location: ../../btrjob-admin/index");
		
	}
	else
	{
		$_SESSION['errorLogin'] = "Username or Password is incorrect. <br>Please try again.";

		header("location: ../login");

	}
}else{

}

?>
