<?php
//session_start();
//if(!$_SESSION['userid']){
//	die();
//}

?>
<!doctype html>
<html>

<head>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no,viewport-fit=cover">
    <meta charset="utf-8">
    <title>铁岭银行2020年度考评</title>
    <link rel="stylesheet" href="lib/jquery.raty.css">
    <link rel="stylesheet" href="lib/hsycmsAlert.css">
    <link rel="stylesheet" href="lib/animate.css">
    <style>
        html,
        body {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-size: 4vw;
            margin: 0px;
            padding: 0px;
            background-image: url('/images/back.png');
            color: #154478;
        }

        .cancel-on-png,
        .cancel-off-png,
        .star-on-png,
        .star-off-png,
        .star-half-png {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            font-family: "raty";
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            line-height: 1;
            speak: none;
            text-transform: none;
            color: #f00;
            font-size: 10vw;
            text-shadow: 1px 1px #aaa;
        }

        .tpdiv {
            border: 0px;
            border-top: 8px solid #f00;
            border-radius: 10px;
            width: 90%;
            margin: auto;
            background-color: #fafafa;
        }

        .deptdiv {
            border: 0px;
            border-top: 8px solid #f00;
            border-radius: 10px;
            width: 90%;
            margin: auto;
            background-color: #fafafa;
        }

        .deptname {
            padding: 30px;
            line-height: 15vw;
            font-size: 4vw;
            font-weight: bold;
        }

        li {
            list-style: none;
            height: 50px;
        }

        .tplist lable {
            height: 50px;
            line-height: 50px;
        }

        .tplist span {
            float: right;
        }

        .submit {
            width: 100vw;
            margin: 0px;
            height: 10vh;
            display: block;
            font-size: 5vw;
            /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#ff3019+0,cf0404+100;Red+3D */
            background: #ff3019;
            /* Old browsers */
            background: -moz-linear-gradient(top, #ff3019 0%, #cf0404 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(top, #ff3019 0%, #cf0404 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, #ff3019 0%, #cf0404 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff3019', endColorstr='#cf0404', GradientType=0);
            /* IE6-9 */
            color: #fff;
            border: 0px;
        }

        .top img {
            width: 100%;
            margin-bottom: 30px;
        }

        .managerinfo {
            padding: 30px;
            line-height: 15vw;
            font-size: 4vw;
            font-weight: bold;
        }

        hr {
            border: 1px #ddd solid;
            box-shadow: 0px 1px #fff;
            line-height: 30px;
        }

        .tplist {
            padding: 0px;
        }

        .tplist li,
        lable {
            padding-left: 30px;
        }

        .tplist span {
            font-size: 7vw;
            color: #154478;
            padding-right: 30px;
            font-weight: bold;
            margin-top: 30px;
        }

        .finish {
            top: 0px;
            color: #555;
            width: 100vw;
            height: 100vh;
            background-color: #fff;
            text-align: center;
            vertical-align: center;
            font-size: 5vw;
            display: none;
            position: absolute;
            z-index: 99;
        }

        .finish img {
            width: 30vw;
            margin-top: 40vh;
        }

        .load8 {
            width: 100vw;
            height: 100vh;
            background-color: rgba(255, 255, 255);
            position: absolute;
            z-index: 99;
            top: 0px;
        }

        .load8 .loader {
            margin: 40vh auto;
            font-size: 10px;
            position: relative;
            text-indent: -9999em;
            border-top: 0.5em solid rgba(0, 0, 0, 0.1);
            border-right: 0.5em solid rgba(0, 0, 0, 0.1);
            border-bottom: 0.5em solid rgba(0, 0, 0, 0.1);
            border-left: 0.5em solid #f00;
            -webkit-animation: load8 1.1s infinite linear;
            animation: load8 1.1s infinite linear;
        }

        .load8 .loader,
        .load8 .loader:after {
            border-radius: 50%;
            width: 5em;
            height: 5em;
        }

        @-webkit-keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .info {
            margin: 0 5px;
            width: 24px;
            vertical-align: text-bottom;
        }

        .explain {
            display: none;
        }

        .alertinfo {
            text-align: left;
        }

        .depttp {
            text-align: left;
        }

        .depttp {
            font-size: 4vw;
        }

        .depttp input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .depttp input[type="radio"]+.radio-label:before {
            content: '';
            background: #f4f4f4;
            border-radius: 100%;
            border: 1px solid #b4b4b4;
            display: inline-block;
            width: 1.2em;
            height: 1.2em;
            position: relative;
            top: -0.2em;
            margin-right: 0.2em;
            margin-left: 0.5em;
            vertical-align: top;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 250ms ease;
            transition: all 250ms ease;
        }

        .depttp input[type="radio"]:checked+.radio-label:before {
            background-color: #3197EE;
            box-shadow: inset 0 0 0 4px #f4f4f4;
        }

        .depttp input[type="radio"]:focus+.radio-label:before {
            outline: none;
            border-color: #3197EE;
        }

        .depttp input[type="radio"]:disabled+.radio-label:before {
            box-shadow: inset 0 0 0 4px #f4f4f4;
            border-color: #b4b4b4;
            background: #b4b4b4;
        }

        .depttp input[type="radio"]+.radio-label:empty:before {
            margin-right: 0;
        }
        
        
        .tplist input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .tplist input[type="radio"]+.radio-label:before {
            content: '';
            background: #f4f4f4;
            border-radius: 100%;
            border: 1px solid #b4b4b4;
            display: inline-block;
            width: 1.2em;
            height: 1.2em;
            position: relative;
            top: -0.2em;
            margin-right: 0.2em;
            margin-left: 0.5em;
            vertical-align: top;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 250ms ease;
            transition: all 250ms ease;
        }

        .tplist input[type="radio"]:checked+.radio-label:before {
            background-color: #3197EE;
            box-shadow: inset 0 0 0 4px #f4f4f4;
        }

        .tplist input[type="radio"]:focus+.radio-label:before {
            outline: none;
            border-color: #3197EE;
        }

        .tplist input[type="radio"]:disabled+.radio-label:before {
            box-shadow: inset 0 0 0 4px #f4f4f4;
            border-color: #b4b4b4;
            background: #b4b4b4;
        }

        .tplist input[type="radio"]+.radio-label:empty:before {
            margin-right: 0;
        }
        .radio-label{
            vertical-align:top;
        }
    </style>
    <script src="https://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.3.min.js"></script>
    <script src="lib/jquery.raty.js"></script>
    <script src="lib/hsycmsAlert.js"></script>
    <script src="https://g.alicdn.com/dingding/dingtalk-jsapi/2.10.3/dingtalk.open.js"></script>
    <script>

        $(function () {

            var deptdiv;
            if (dd.env.platform == "notInDingTalk") {
                alert("请用手机钉钉打开！");
                return;
            }
            dd.runtime.permission.requestAuthCode({
                corpId: "corpId",
                onSuccess: function (res) {

                    // 调用成功时回调
                    var acctoken = "";
                    $.ajax({
                        type: "GET",
                        contentType: "application/json;charset=UTF-8",
                        url: "login.php",
                        dataType: "json",
                        data: { code: res.code },
                        beforeSend: function () {
                            $('.load8').show();
                        },
                        success: function (data) {
                            $('.load8').hide();
                            //alert(data);
                            if (data.count <= 0) {

                                $(".finish").show();
                                return false;
                            }
                            hsycms.alert('model');
                            var content = "";
                            if (data.dept.slice(-2) == "支行" || data.dept == "营业部") {
                                content = '<div class="deptdiv" id="' + data.dept + '"><label class="deptname">您对' + data.dept + '班子评价</label>\
                                    <div class="depttp checkradio">\
                                    <input type="radio" id="radio-1" name="depttp" value="优秀" ><label for="radio-1" class="radio-label">优秀</label>\
                                    \
                                    <br /><br /><input type="radio" id="radio-2" name="depttp" value="合格"><label for="radio-2" class="radio-label">合格</label>\
                                    <br /><br /><input type="radio" id="radio-3" name="depttp" value="基本合格"><label for="radio-3" class="radio-label">基本合格</label>\
                                    <br /><br /><input type="radio" id="radio-4" name="depttp" value="不合格"><label for="radio-4" class="radio-label">不合格</label></div><br/></div><br/>';
                           }
                            $.each(data.data, function (i, item) {

                                content = content + '\
		                                    <div class="tpdiv"><label class="managerinfo">您对' + item.dept + item.class+ " " +item.name +  '的评价</label>\
		                                        <div class="tplist checkradio" id="'+ item.Employeeid + '">\
                                    <input type="radio" id="'+item.Employeeid+'radio-1" name="'+item.Employeeid+'" value="优秀" ><label for="'+item.Employeeid+'radio-1" class="radio-label">优秀</label>\
                                    \
                                    <br /><br /><input type="radio" id="'+item.Employeeid+'radio-2" name="'+item.Employeeid+'" value="合格"><label for="'+item.Employeeid+'radio-2" class="radio-label">合格</label>\
                                    <br /><br /><input type="radio" id="'+item.Employeeid+'radio-3" name="'+item.Employeeid+'" value="基本合格"><label for="'+item.Employeeid+'radio-3" class="radio-label">基本合格</label>\
                                    <br /><br /><input type="radio" id="'+item.Employeeid+'radio-4" name="'+item.Employeeid+'" value="不合格"><label for="'+item.Employeeid+'radio-4" class="radio-label">不合格</label></div><br/></div><br/>';
                            });

                            $(".container").html(content);
                            if ($(".deptdiv").length > 0) {
                                deptdiv = $(".deptdiv");
                            }
                            $('.star').raty({
                                starType: 'i', targetType: 'score', click: function (score, evt) {
                                    dd.device.notification.vibrate({
                                        duration: 100, //震动时间，android可配置 iOS忽略
                                        onSuccess: function (result) {
                                        },
                                        onFail: function (err) { }
                                    })
                                    $(this).prev('span').html(score);
                                    //$(this).children(":lt(" + score + ")").removeClass("animate__animated animate__zoomIn");

                                    //setTimeout(() => {
                                    //$(this).children(":lt(" + score + ")").addClass("animate__animated animate__zoomIn");
                                    // }, 1);

                                }
                            });
                            $(".load8").hide();
                            $(".zzszinfo").click(function () {
                                alert("<div class='alertinfo'>政治素质高绩效行为标准:<br />政治立场坚定，正确领会党的路线方针政策和总行党委的各项决策部署；遵守党的政治纪、组织等各项纪律；坚守正道，清正廉洁，作风正派，坚持原则。</div>");
                            });
                            $(".zysyinfo").click(function () {
                                alert("<div class='alertinfo'>职业素养高绩效行为标准:<br />勤勉敬业，有高度事业心、责任感，工作尽职尽责，始终充满干事创业的激情和活力；风控意识强，能有效平衡风险管理与业务发展，严守商业秘密，坚守职业操守。</div>");
                            });
                            $(".kxjcinfo").click(function () {
                                alert("<div class='alertinfo'>科学决策高绩效行为标准:<br />工作思路清晰、有前瞻性、有战略思维和广阔视野；善于把握经济发展趋势和市场发展规律，能从大局出发谋划工作，坚持科学、民主、依法决策。</div>");
                            });
                            $(".tdzxinfo").click(function () {
                                alert("<div class='alertinfo'>推动执行高绩效行为标准:<br />坚持党建统领，贯彻落实总行决策部署，具有驾驭全局、应对复杂局面、解决重点问题的能力；善于将发展战略转化为具体可行的目标和行动计划，协调各方力量、有序推进工作。</div>");
                            });
                            $(".tdjsinfo").click(function () {
                                alert("<div class='alertinfo'>团队建设高绩效行为标准:<br />善于抓班子、带队伍，注重发现、培养人才，能充分调动员工积极性、主动性和创造性；明确团队职责，有效分解工作任务，对下属及分管工作进行及时有效指导、监督和检查。</div>");
                            });
                            $(".ktcxinfo").click(function () {
                                alert("<div class='alertinfo'>开拓创新高绩效行为标准:<br />注重学习、学以致用，能够准确把握战略方向，推动转型发展；善于接受新知识、新事物，积极推进机制体制创新、经营管理创新。</div>");
                            });
                        },
                        error: function (e) {
                            $('.load8').hide();
                            alert(e);
                            console.log(e.status);
                            console.log(e.responseText);
                        }
                    });
                },
                onFail: function (err) {
                    // 调用失败时回调
                    alert(err);
                    console.log(err);
                }
            });

            $(".submit").click(function () {
                var checkradio=true;
                $(".checkradio").each(function (i, checkscore) {
                if($(this).children('input:radio:checked').val()==null){
                checkradio=false;
 }


                })
              
            if(checkradio==false){
     alert("请全部进行评价后再提交。");
      return false ;
 }

               // if (!checkscore()) {
                //    return false;
               // }
                if (!confirm("此次评分为无记名评分，因此提交后无法进行修改。确认提交吗？")) {
                    return false;
                }
                var errmsg = true;


                //alert($("input:radio").length);
                if ($(".deptdiv").length > 0) {
                    var depttp = $('input:radio[name=depttp]:checked').val();
                    var deptname = $(".deptdiv").attr("id");
                    $.post("depttp.php", {
                        depttp: depttp,
                        deptname: deptname
                    },
                        function (data) {
                            //alert(data);
                            if (data = "提交成功") {
                                errmsg = true;
                            } else {
                                errmsg = false;
                            }
                        });
                }
                $(".tplist").each(function () {
                    var Employeeid = $(this).attr("id");
                    var tpresult = $(this).children('input:radio:checked').val();
                   
                    $.ajax({
                        type: "POST",
                        url: "newtp.php",
                        dataType: "text",
                        async: false,
                        data: { Employeeid: Employeeid, tpresult:tpresult },
                        success: function (data) {
                            //alert(data);
                        },
                        error: function (e) {

                            alert(e);
                            console.log(e.status);
                            console.log(e.responseText);
                        }
                    });


                });
                //window.location.href = './index.php?'+random();
                window.location.reload();
            });
        });
        function checked(){
            
        }
        function checkscore() {

            var checkzero = true;
            var checksum = true;
            $(".tplist").each(function (i, checkscore) {
                var chkzzsz = "";
                var chkzysy = $(this).children("#zysyscore").text();
                var chkkxjc = $(this).children("#kxjcscore").text();
                var chktdzx = $(this).children("#tdzxscore").text();
                var chktdjs = $(this).children("#tdjsscore").text();
                var chkktcx = $(this).children("#ktcxscore").text();
                if (chkzzsz == "" || chkzysy == "" || chkkxjc == "" || chktdzx == "" || chktdjs == "" || chkktcx == "") {
                    checkzero = false;
                }
                if (parseInt(chkzzsz) + parseInt(chkzysy) + parseInt(chkkxjc) + parseInt(chktdzx) + parseInt(chktdjs) + parseInt(chkktcx) >= 30) {
                    checksum = false;
                }
            });
            if (!checkzero) {
                alert("每项至少一分。请检查后重新提交");
                return false;
            }
            if (!checksum) {
                alert("每位被评选者至少一项低于5分。");
                return false;
            }
            return true;
        }


        //function alert(txt) {
        //hsycms.alert('alert', txt, function () {
        //hsycms.close('alert');
        // console.log("点击了确定");
        // })
        //}
        function vibrate() {
            navigator.vibrate(200);
        }

    </script>
</head>

<body>
    <audio id="chatAudio">
        <source src="images/kada.mp3" type="audio/mpeg">
    </audio>
    <div class="explain"><img src="images/exp.png"></div>
    <div class="explain">
        为客观公正地评价员工年度工作业绩及履职表现，加强员工绩效管理，在评先选优、职业发展、教育培训、选拔任用及劳动合同续订或终止等方面提供重要参数，根据总行相关规定及工作安排，现组织开展员工2020年度考核工作
    </div>
    <div class="top"><img src="images/top.png"></div>
    <div id="target"></div>
    <div class="container"> </div>
    <div class="load8">
        <div class="loader"></div>
    </div>
    <div class="finish">
        <img src="images/finish.png" /><br />
        您已经完成投票<br />谢谢参与!<br />
        <a href="manager.php"><br><br><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="64"
                height="64">
                <path fill="none" d="M0 0H24V24H0z" />
                <path
                    d="M5 3v16h16v2H3V3h2zm14.94 2.94l2.12 2.12L16 14.122l-3-3-3.94 3.94-2.12-2.122L13 6.88l3 3 3.94-3.94z"
                    fill="rgba(144,144,144,1)" />
            </svg></a><br>统计数据
    </div>
    <button class="submit">提交投票</button>
    <div class="hsycms-model-mask" onclick="hsycms.closeAll()" id="mask-model"></div>
    <div class="hsycms-model hsycms-model-model" id="model">
        <div class="hscysm-model-title">温馨提示</div>
        <div class="hsycms-model-content">
            此次考核评价采用“无记名”方式，每位有权考核人只有一次评价机会，提交后无法修改。<br><br>为保证此次评分工作的客观、公正，我们已经将此次评分开发的程序源码发布到开源平台
            <a href='https://github.com/tdan1978/ddvate'>
                <svg class="octicon octicon-mark-github v-align-middle" height="24" viewBox="0 0 16 16" version="1.1"
                    width="24" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z">
                    </path>
                </svg><b>Github</b></a>，欢迎有兴趣的伙伴前去查看和验证。我们无法将您提交的评价结果与您的个人信息匹配，请各位放心评价。<br><br>
            
        </div>
        <div class="hsycms-model-btn">
            <button type="button ok">我已了解</button>
        </div>
    </div> 
    <div class="hsycms-model-mask" id="mask-alert"></div>
    <div class="hsycms-model hsycms-model-alert" id="alert">
        <div class="hscysm-model-title">温馨提示</div>
        <div class="hsycms-model-text">这里是内容</div>
        <div class="hsycms-model-btn">
            <button type="button ok">我已了解</button>
        </div>
    </div>
    <div class="hsycms-model-mask" id="mask-confirm"></div>
    <div class="hsycms-model hsycms-model-confirm" id="confirm">
        <div class="hscysm-model-title">温馨提示</div>
        <div class="hsycms-model-text">确定要操作？</div>
        <div class="hsycms-model-btn">
            <button type="button" class="cancel">取消</button>
            <button type="button" class="ok">确定</button>
        </div>
    </div>
</body>

</html>