<?php
session_start();

include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');
//特殊用户数组。
$moveuser = array(
    
    "05493646531068118"=>	"纪检监察室",
"0224115525794475"=>	"风险合规部",
"25336341621279993"=>	"风险合规部",
"252933686621470272"=>	"风险合规部",
"254733061423991059"=>	"风险合规部",
"3332305245950408"=>	"广泰支行",
"253303582924151135"=>	"广泰支行",
"254659483221347591"=>	"广泰支行",
"253602152319978109"=>	"安全保卫部",
"121934320335548774"=>	"营业部",
"2162301354772389"=>	"开发区支行",
"253367412426137920"=>	"站前支行",
"2533024432100080578"=>	"东北城支行",
"253433121623280718"=>	"开原支行",
"253322461523118652"=>	"广合支行",
"144118144732205303"=>	"营业部",
"254525656729070092"=>	"营业部",
"245828313326020088"=>	"开发区支行",
"241719623026098171"=>	"铁西支行",
"241732506423827254"=>	"审计部",
"0237363949776243"=>	"信息科技部",
"1133164737996542"=>	"网络金融部",
"2459022447771137"=>	"昌图支行",
"1746156125769095"=>	"计划财务部",
"0239594055858277"=>	"昌兴支行",
"246116435123114282"=>	"红旗支行",
"24611728641181593"=>	"站前支行",
"2540324437249164092"=>	"开发区支行",
"080864175629108027"=>	"开发区支行",
"253524214721863688"=>	"铁岭县支行",
"2534211420688241"=>	"岭东支行",
"2536244958319929803"=>"风险合规部",
"202614675723686683"=>"风险合规部",
"0304152018957497"=>"风险合规部",
"2514131923673242"=>"风险合规部",
"253409595626702837"=>"风险合规部",
"2463474448701205"=>"风险合规部",
"253441045827214748"=>"风险合规部",
"016854431021464151"=>"风险合规部"
);

//获取access_token，每7000s重新获取
$c = new DingTalkClient(DingTalkConstant::$CALL_TYPE_OAPI, DingTalkConstant::$METHOD_GET, DingTalkConstant::$FORMAT_JSON);
$tokenFile = "./access_token.htaccess";
$data = json_decode(file_get_contents($tokenFile));
if ($data->expire_time < time() || !$data->expire_time) {
    $req = new OapiGettokenRequest;
    $req->setAppkey("Appkey");
    $req->setAppsecret("Appsecret");
    $resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/gettoken");
    $token = json_decode(json_encode($resp), true);
    $access_token = $token['access_token'];
    if ($access_token) {
        $data_new['expire_time'] = time() + 7000;
        $data_new['access_token'] = $access_token;
        file_put_contents($tokenFile, json_encode($data_new));
    }
} else {
    $access_token = $data->access_token;
}

$code = $_GET["code"];
$req = new OapiUserGetuserinfoRequest;
$req->setCode($code);
$resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/user/getuserinfo");
$userid = json_decode(json_encode($resp), true);

$req = new OapiUserGetRequest;
$req->setUserid($userid['userid']);
$resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/user/get");
$userinfo = json_decode(json_encode($resp), true);

if (array_key_exists($userid['userid'], $moveuser)) {
    $deptname = $moveuser[$userid['userid']];
} else {
    $req = new OapiDepartmentListParentDeptsByDeptRequest;
    $req->setId($userinfo["department"][0]);
    $resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/department/list_parent_depts_by_dept");
    $deptclass = json_decode(json_encode($resp), true);
    $req = new OapiDepartmentGetRequest;
    $req->setId(array_reverse($deptclass["parentIds"])[2]);
    $resp = $c->execute($req, $access_token, "https://oapi.dingtalk.com/department/get");
    $deptinfo = json_decode(json_encode($resp), true);
    $deptname = $deptinfo['name'];
}
$_SESSION['token'] = $access_token;
$_SESSION['userid'] = $userid['userid'];
$_SESSION['username'] = $userinfo['name'];
$_SESSION['deptoder'] = $deptname;
$serve = 'server';
$dbusername = 'dbusername';
$password = 'password';
$dbname = 'dbname';
$mysqli = new Mysqli($serve, $dbusername, $password, $dbname);
if ($mysqli->connect_error) {
    die('connect error:' . $mysqli->connect_errno);
} else {
    $sql = "select  `finish` from finish_list where `userid`='" . $userid['userid'] . "'";
    $result = mysqli_query($mysqli, $sql);
    $jarr = array();
    if (mysqli_num_rows($result)) {
        while ($rows = mysqli_fetch_row($result)) {

            array_push($jarr, "'" . $rows[0] . "'");
        }
        $jarr = join(",", $jarr);

        $sql2 = "select `Employeeid`,  `name`,  `dept` , `class` from manager_list where `dept`='" . $deptname . "' and `Employeeid` not in (" . $jarr . ")";
    } else {

        $sql2 = "select `Employeeid`,  `name`,  `dept` , `class` from manager_list where `dept`='" . $deptname . "'";
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
    $jarr3 = array("code" => 0, "msg" => "sucess", "count" => $count2, "dept" => $deptname, "data" => $jarr2);

    echo $str = json_encode($jarr3);
}
$mysqli->close();
