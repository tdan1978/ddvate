<?php
session_start();

if (!$_SESSION['userid']) {
    die();
}
include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');
$Employeeid = $_GET['Employeeid'];
$deptname = $_GET['deptname'];
if ($_SESSION['userid'] != "") {
    die();
}
$serve = '';
$username = '';
$password = '';
$dbname = '';
$mysqli = new Mysqli($serve, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die('connect error:' . $mysqli->connect_errno);
} else {

    $sql = "select `id` from dept_list where name='" . $deptname . "'";
    $result = mysqli_query($mysqli, $sql);
    $jarr = array();
    if (!$result) {
        printf("Error: %s\n", mysqli_error($mysqli));
        exit();
    }
    $rows = mysqli_fetch_row($result);
    $access_token = $_SESSION['token'];
    $c = new DingTalkClient(DingTalkConstant::$CALL_TYPE_OAPI, DingTalkConstant::$METHOD_GET, DingTalkConstant::$FORMAT_JSON);
    $req = new OapiUserSimplelistRequest;
    $req->setDepartmentId($rows[0]);
    $resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/user/simplelist");

    $deptclass = json_decode(json_encode($resp), true);
    $sql1 = "select * from finish_list where finish='" . $Employeeid . "'";
    $result1 = mysqli_query($mysqli, $sql1);
    $jarr1 = array();
    if (!$result1) {
        printf("Error: %s\n", mysqli_error($mysqli));
        exit();
    }
    while ($rows1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
        $count1 = count($rows1);
        for ($i = 0; $i < $count1; $i++) {
            unset($rows1[$i]);
        }
        array_push($jarr1, $rows1);
    }
    $jarr2 = array("code" => 0, "msg" => "sucess", "count" => $count1, "dddept" => $deptclass["userlist"], "data" => $jarr1);

    echo $str = json_encode($jarr2);
}
$mysqli->close();
