<?php
session_start();

include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');

$c = new DingTalkClient(DingTalkConstant::$CALL_TYPE_OAPI, DingTalkConstant::$METHOD_GET, DingTalkConstant::$FORMAT_JSON);
$req = new OapiGettokenRequest;
$req->setAppkey("setAppkey");
$req->setAppsecret("setAppsecret");
$resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/gettoken");


$token = json_decode(json_encode($resp), true);


$code = $_GET["code"];
$access_token = $token['access_token'];
$req = new OapiUserGetuserinfoRequest;
$req->setCode($code);
$resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/user/getuserinfo");
$userid = json_decode(json_encode($resp), true);



$req = new OapiUserGetRequest;
$req->setUserid($userid['userid']);
$resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/user/get");
$userinfo = json_decode(json_encode($resp), true);



$req = new OapiDepartmentListParentDeptsByDeptRequest;
$req->setId($userinfo["department"][0]);
$resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/department/list_parent_depts_by_dept");

$deptclass = json_decode(json_encode($resp), true);




$req = new OapiDepartmentGetRequest;
$req->setId(array_reverse($deptclass["parentIds"])[2]);
$resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/department/get");
$deptinfo = json_decode(json_encode($resp), true);

$_SESSION['userid'] = $userid['userid'];
$_SESSION['username'] = $userinfo['name'];
$_SESSION['deptoder'] = $deptinfo['name'];

$serve = 'localhost:3306';
$username = 'username';
$password = 'password';
$dbname = 'dbname';
$mysqli = new Mysqli($serve, $username, $password, $dbname);
if ($mysqli->connect_error) {
	die('connect error:' . $mysqli->connect_errno);
} else {
	$sql = "select  `finish` from finish_list where `userid`='" . $userid['userid'] . "'";
	$result = mysqli_query($mysqli, $sql);
	$jarr = array();
	if (mysqli_num_rows($result)) {
		while ($rows = mysqli_fetch_row($result)) {

			array_push($jarr, $rows[0]);
		}
		$jarr = join(",", $jarr);

		$sql2 = "select `Employeeid`,  `name`,  `dept` , `class` from manager_list where `dept`='" . $deptinfo["name"] . "' and `Employeeid` not in (" . $jarr . ")";
	} else {

		$sql2 = "select `Employeeid`,  `name`,  `dept` , `class` from manager_list where `dept`='" . $deptinfo["name"] . "'";
	}


	if (!$result) {
		printf("Error: %s\n", mysqli_error($mysqli));
		exit();
	}

	$result2 = mysqli_query($mysqli, $sql2);
	if (!$result2) {
		printf("Error: %s\n", mysqli_error($mysqli));
		exit();
	}

	$jarr2 = array();
	while ($rows2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
		$count2 = count($rows2); 
		for ($i = 0; $i < $count2; $i++) {
			unset($rows2[$i]); 
		}
		array_push($jarr2, $rows2);
	}
	$jarr3 = array("code" => 0, "msg" => "sucess", "count" => $count2, "data" => $jarr2);

	echo $str = json_encode($jarr3); 

}
$mysqli->close();
