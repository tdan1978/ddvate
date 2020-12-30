<?php
session_start();
$Employeeid  = $_POST['Employeeid'];
$zzsz = $_POST['zzsz'];
$zysy = $_POST['zysy'];
$kxjc = $_POST['kxjc'];
$tdzx = $_POST['tdzx'];
$tdjs = $_POST['tdjs'];
$ktcx = $_POST['ktcx'];
$Creattime = date('Y-m-d h:i:s');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$dept = $_SESSION['deptoder'];


$serve = 'localhost:3306';
$dbusername = 'username';
$password = 'password';
$dbname = 'dbname';

$mysqli = new Mysqli($serve, $dbusername, $password, $dbname);
if ($mysqli->connect_error) {
	die('connect error:' . $mysqli->connect_errno);
}
$sql = "insert into manager_score (  
`Employeeid`,
`zzsz`,
`zysy`,
`kxjc`,
`tdzx`,
`tdjs`,
`ktcx`) values( 
'$Employeeid',
'$zzsz',
'$zysy',
'$kxjc',
'$tdzx',
'$tdjs',
'$ktcx')";

$sql1 = "insert into finish_list (  
`userid`,
`name`,
`dept`,
`finish`) values( 
'$userid',
'$username',
'$dept',
'$Employeeid')";



if ($mysqli->query($sql) === TRUE and $mysqli->query($sql1) === TRUE) {
	echo "提交成功";
} else {
	echo "提交失败，错误信息:" . $mysqli->error;
}

$mysqli->close;
