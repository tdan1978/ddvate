<?php
session_start();
if (!$_SESSION['userid']) {
    die();
}
$Employeeid  = $_POST['Employeeid'];
$tpresult = $_POST['tpresult'];



//echo ("aaaa".$Employeeid.$zysy.$zzsz);
$Creattime = date('Y-m-d h:i:s');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$dept = $_SESSION['deptoder'];
$serve = 'server';
$dbusername = 'dbusername';
$password = 'password';
$dbname = 'dbname';
$mysqli = new Mysqli($serve, $dbusername, $password, $dbname);
if ($mysqli->connect_error) {
    die('connect error:' . $mysqli->connect_errno);
}
$sql = "insert into manager_result (  
`Employeeid`,`tpresult`) values( '$Employeeid','$tpresult')";

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
