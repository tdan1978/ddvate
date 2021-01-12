<?php
session_start();
if (!$_SESSION['userid']) {
	die();
}
$deptscore = $_POST['depttp'];
$deptname = $_POST['deptname'];
$Creattime = date('Y-m-d h:i:s');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$serve = '';
$dbusername = '';
$password = '';
$dbname = '';
$mysqli = new Mysqli($serve, $dbusername, $password, $dbname);
if ($mysqli->connect_error) {
	die('connect error:' . $mysqli->connect_errno);
}
$sql = "insert into dept_score (  
`deptscore`,
`deptname`) values( 
'$deptscore',
'$deptname')";

if ($mysqli->query($sql) === TRUE) {
	echo "提交成功";
} else {
	echo "提交失败，错误信息:" . $mysqli->error;
}

$mysqli->close;
