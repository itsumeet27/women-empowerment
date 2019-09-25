<?php

// $db = mysqli_connect('localhost', 'root', '', 'women_empowerment');
$db = mysqli_connect('us-cdbr-iron-east-02.cleardb.net', 'b648b7587f8192', 'b66f141a', 'heroku_b342f2365cab7e0');
if(mysqli_connect_errno()){
	echo "Database connection failed with following errors: ".mysqli_connect_error();
	die();
}

// require_once $_SERVER['DOCUMENT_ROOT'].'/women-empowerment/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/aqueous-coast-08816/config.php';
require_once BASEURL.'helpers/helpers.php';

if(isset($_SESSION['SBUser'])){
	$user_id = $_SESSION['SBUser'];
	$query = $db->query("SELECT * FROM users WHERE id = '$user_id'");
	$user_data = mysqli_fetch_assoc($query);
	$fn = explode(' ', $user_data['full_name']);
	$user_data['first'] = $fn[0];
	$user_data['last'] = $fn[1];
}

?>

