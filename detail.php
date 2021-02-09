<?php
session_start();
if(!$_SESSION['userid']){
	die();
}

include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');
$Employeeid = $_GET['Employeeid'];
//echo $grouptype;


if($_SESSION['userid'] !=" " && $_SESSION['userid'] !=" "){
	die();
}

$serve = 'server';
$dbusername = 'dbusername';
$password = 'password';
$dbname = 'dbname';
$mysqli = new Mysqli($serve, $username, $password, $dbname);
if ($mysqli->connect_error) {
	die('connect error:' . $mysqli->connect_errno);
} else {
	$sql = "select * from manager_score where Employeeid='".$Employeeid."'";
	$result = mysqli_query($mysqli, $sql);
	$jarr = array();
	if (!$result) {
		printf("Error: %s\n", mysqli_error($mysqli));
		exit();
	}

	while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$count = count($rows); 
		for ($i = 0; $i < $count; $i++) {
			unset($rows[$i]); 
		}
		array_push($jarr, $rows);
	}
	$jarr1 = array("code" => 0, "msg" => "sucess", "count" => $count, "data" => $jarr);

	echo $str = json_encode($jarr1); 

}
$mysqli->close();

