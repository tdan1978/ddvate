<?php
session_start();

if (!$_SESSION['userid']) {
    die();
}
include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');
$grouptype = $_GET['grouptype'];
//echo $grouptype;
$zhbzpj = false;
if ($grouptype == "class1z") {
    $depttype = "一类、县域支行";
    $classtype = "正职";
} else if ($grouptype == "class1f") {
    $depttype = "一类、县域支行";
    $classtype = "副职";
} else if ($grouptype == "class2z") {
    $depttype = "二类支行";
    $classtype = "正职";
} else if ($grouptype == "class2f") {
    $depttype = "二类支行";
    $classtype = "副职";
} else if ($grouptype == "runz") {
    $depttype = "经营部室";
    $classtype = "正职";
} else if ($grouptype == "runf") {
    $depttype = "经营部室";
    $classtype = "副职";
} else if ($grouptype == "norunz") {
    $depttype = "非经营部室";
    $classtype = "正职";
} else if ($grouptype == "norunf") {
    $depttype = "非经营部室";
    $classtype = "副职";
} else if ($grouptype == "zhbzpj") {
    $zhbzpj = true;
}

if ($_SESSION['userid'] != " " && $_SESSION['userid'] !=" "){
    die();
}
$jarr = array();
$serve = 'server';
$dbusername = 'dbusername';
$password = 'password';
$dbname = 'dbname';
$mysqli = new Mysqli($serve, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die('connect error:' . $mysqli->connect_errno);
} else {
    //$sql = "select  sum(`zzsz`) from manager_score where `Employeeid` in (select `Employeeid` from manager_list where depttype='非经营部室') GROUP BY `Employeeid`";
    //$sql = "select  * from manager_score where `Employeeid` in (select `Employeeid` from manager_list where depttype='非经营部室') ";
    if ($zhbzpj) {
        $sql = "SELECT  deptname, count(case when `dept_score`.`deptscore`='优秀' then 1 end) as YX,count(case when `dept_score`.`deptscore`='合格' then 1 end) as HG,count(case when `dept_score`.`deptscore`='基本合格' then 1 end) as JBHG,count(case when `dept_score`.`deptscore`='不合格' then 1 end) as BHG  FROM `dept_score` GROUP BY  `deptname`";
    } else {
          $sql = "SELECT  manager_result.Employeeid,  manager_list.name , manager_list.dept, count(case when manager_result.tpresult='优秀' then 1 end) as YX,count(case when  manager_result.tpresult='合格' then 1 end) as HG,count(case when manager_result.tpresult='基本合格' then 1 end) as JBHG,count(case when  manager_result.tpresult='不合格' then 1 end) as BHG  FROM manager_result inner join manager_list on manager_result.Employeeid=manager_list.Employeeid where manager_list.depttype='" . $depttype . "' and manager_list.classtype='" . $classtype . "' GROUP BY  Employeeid";
          
          
        //$sql = "select count(manager_list.Employeeid) as count, manager_list.Employeeid , manager_list.name , manager_list.dept , avg(manager_score.zzsz)*0.2 + avg(manager_score.ktcx)*0.15 + avg(manager_score.zysy)*0.1 + avg(manager_score.kxjc)*0.15 + avg(manager_score.tdzx)*0.2 + avg(manager_score.tdjs)*0.2 as total from manager_score inner join manager_list on manager_score.Employeeid=manager_list.Employeeid where manager_list.depttype='" . $depttype . "' and manager_list.classtype='" . $classtype . "' GROUP BY manager_list.Employeeid ORDER BY total DESC ";
    }

    $result = mysqli_query($mysqli, $sql);

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
    $jarr1 = array("code" => 0, "msg" => "sucess", "count" => $count, "zhbzpj" => $zhbzpj, "data" => $jarr);

    echo $str = json_encode($jarr1);
}
$mysqli->close();
