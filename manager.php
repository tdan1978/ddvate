<?php
session_start();
if (!$_SESSION['userid']) {
    die();
}

?>


<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no,viewport-fit=cover">
    <meta charset="utf-8">
    <title>铁岭银行2020年度考评</title>
    <link rel="stylesheet" href="lib/hsycmsAlert.css">
    <link rel="stylesheet" href="lib/normalize.css">
    <link rel="stylesheet" href="lib/style.css">
    <link rel="stylesheet" href="lib/zzsc-demo.css">
    <style>
        .name {
            width: 5em;
            height: 36px;
            display: block;
            float: left;
            line-height: 36px;
        }

        .dept {
            width: 10em;
            height: 36px;
            display: block;
            float: left;
            line-height: 36px;
        }

        .total {
            width: 5em;
            height: 36px;
            display: block;
            float: left;
            line-height: 36px;
        }

        .count {
            width: 5em;
            height: 36px;
            display: block;
            float: left;
            line-height: 36px;
        }

        .managerlist,
        .managerhead,
        .depthead,
        .deptlist {
            font-size: 14px;
            display: inline-flex;
            border-bottom: 1px solid;
        }

        .detailhead .detail {
            width: 15vw;
            height: 40px;
            display: block;
            float: left;
            text-align: center;
            display: table-cell;
            line-height: 40px;
        }

        .detaillist .detail {
            width: 15vw;
            height: 40px;
            display: block;
            float: left;
            text-align: center;
            display: table-cell;
            line-height: 40px;
            color: #fff;
            background-size: 2px 2px;
            box-shadow: inset -1px 1px 0px 0px #fff;
            font-size: 18px;
            font-weight: bold;
            text-shadow: 1px 1px 1px #888;

        }

        .detaillist {
            margin: auto;
            display: table;
        }

        .voteuserlist {
            border-bottom: 1px solid #ddd;
            display: table;
            margin: auto;
        }

        .hsycms-model {
            position: fixed;
            z-index: 3333;
            display: none;
            left: 0;
            right: 0;
            margin: auto;
            top: 10vh/2;
            transform-origin: center;
            max-width: 100%;
            max-height: 100%;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            min-height: 10%;
            height: 100%;

        }

        .hsycms-model .hscysm-model-title {
            padding-bottom: 0px;
            margin-bottom: 0px;
        }

        .hsycms-model-btn {
            position: absolute;
            bottom: 0px;
            width: 100%;
        }

        .hsycms-model .hsycms-model-content {
            overflow: auto;
            height: 85%;
            max-height: 100%;
            padding-top: 0px;
        }

        .detailhead {
            display: table;
            margin: auto;
            font-size: 12px;
            height: 40px;
            font-weight: 100;
        }

        .hscysm-model-title {
            margin-bottom: 10px;
        }

        .voteuserlist:first {
            margin-top: 30px;
        }

        .finishname {
            width: 45vmin;
            height: 40px;
            display: block;
            float: left;
            text-align: center;
            display: table-cell;
            line-height: 40px;

        }

        .yesno {
            width: 45vmin;
            height: 40px;
            display: block;
            float: left;
            text-align: center;
            display: table-cell;
            line-height: 40px;

        }

        .hsycms-model .hsycms-model-btn button:last-child {
            color: #ffffff;
            background-color: #f00;
        }

        .deptpjname {
            width: 7em;
            height: 36px;
            display: block;
            float: left;
            line-height: 36px;
        }

        .YX {
            width: 4.5em;
            height: 36px;
            display: block;
            float: left;
            text-align: center;
            line-height: 36px;
        }

        .HG {
            width: 4.5em;
            height: 36px;
            display: block;
            float: left;
            text-align: center;
            line-height: 36px;
        }

        .JBHG {
            width: 4.5em;
            height: 36px;
            display: block;
            float: left;
            text-align: center;
            line-height: 36px;
        }

        .BHG {
            width: 4.5em;
            height: 36px;
            display: block;
            float: left;
            text-align: center;
            line-height: 36px;
        }

        .deptlist .deptpjres {
            background: linear-gradient(145deg, transparent 49.5%, #ddd 49.5%, #ddd 50.5%, transparent 50.5%);
        }

        .bfb {
            position: absolute;
            margin-top: 8px;
        }

        .deptcount {
            position: absolute;
            margin-top: -8px;
            margin-left: -10px;
        }
    </style>
    <script src="https://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.3.min.js"></script>
    <script src="lib/hsycmsAlert.js"></script>
    <script src="https://g.alicdn.com/dingding/dingtalk-jsapi/2.10.3/dingtalk.open.js"></script>
    <script>
        $(function() {

            //if (dd.env.platform=="notInDingTalk") {
            //alert("请用手机钉钉打开！");
            //return;
            //	}
            // dd.runtime.permission.requestAuthCode({
            // corpId: "ding953111b3fd867b24a1320dcb25e91351",
            //onSuccess: function (res) {

            // 调用成功时回调
            //var acctoken = ""
            $(".depttype").click(function() {
                //alert("ddd");
                var who = $(this);
                $.ajax({
                    type: "GET",
                    contentType: "application/json;charset=UTF-8",
                    url: "result.php",
                    dataType: "json",
                    data: {
                        grouptype: $(this).attr("id")
                    },
                    beforeSend: function() {
                        $('.load8').show();
                    },
                    success: function(data) {
                        //alert(data);
                        //alert(data);
                        $('.load8').hide();
                        if (data.zhbzpj) {
                            var content = '<div class="depthead"><span class="deptpjname">部门</span><span class="deptpjres YX">优秀</span><span class="deptpjres HG">合格</span><span class="deptpjres JBHG">基本合格</span><span class="deptpjres BHG">不合格</span></div>'
                            $.each(data.data, function(i, item) {
                                var zs = Number(item.YX) + Number(item.HG) + Number(item.JBHG) + Number(item.BHG);
                                content = content + '<div class="deptlist"><span class=" deptpjname">' + item.deptname + '</span><span class="deptpjres YX"><span class="deptcount">' + item.YX + '</span><span class="bfb">' + Percentage(item.YX, zs) + '</span></span><span class="deptpjres HG"><span class="deptcount">' + item.HG + '</span><span class="bfb">' + Percentage(item.HG, zs) + '</span></span><span class="deptpjres JBHG"><span class="deptcount">' + item.JBHG + '</span><span class="bfb">' + Percentage(item.JBHG, zs) + '</span></span><span class="deptpjres BHG"><span class="deptcount">' + item.BHG + '</span><span class="bfb">' + Percentage(item.BHG, zs) + '</span></span></span></div>'
                            });
                            who.next("p").html(content);

                        } else {
                            var content = '<div class="managerhead"><span class="name">姓名</span><span class="dept">部门</span><span class="count">已投</span><span class="total">得分</span></div>';
                            $.each(data.data, function(i, item) {
                                content = content + '\
							<div class="managerlist" id="' + item.Employeeid + '"><span class="name">' + item.name + '</span><span class="dept">' + item.dept + '</span><span class="count">' + item.count + '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 4h18v2H3V4zm0 15h18v2H3v-2zm8-5h10v2H11v-2zm0-5h10v2H11V9zm-8 3.5L7 9v7l-4-3.5z" fill="rgba(255,255,255,0.57)"/></svg></span><span class="total">' + parseFloat(item.total).toFixed(2) + '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 4h18v2H3V4zm0 15h18v2H3v-2zm8-5h10v2H11v-2zm0-5h10v2H11V9zm-8 3.5L7 9v7l-4-3.5z" fill="rgba(255,255,255,0.57)"/></svg></span></div>';
                            });
                            who.next("p").html(content);
                            $(".managerlist").children(".total").click(function() {
                                $(".hsycms-model-content").html("");

                                $(".hscysm-model-title").html("");
                                total($(this).parent().attr("id"), $(this).prevAll(".name").text());
                            });
                            $(".managerlist").children(".count").click(function() {
                                $(".hsycms-model-content").html("");

                                $(".hscysm-model-title").html("");
                                voteuser($(this).parent().attr("id"), $(this).prevAll(".dept").text());
                            });

                        }
                        //hsycms.alert('model');
                    },
                    error: function(e) {
                        alert("no");
                        console.log(e.status);
                        console.log(e.responseText);
                    }
                });
                //},
                // onFail: function (err) {
                // 调用失败时回调
                //   alert(err);
                //   console.log(err);
                //  }
                // });
            });
            'use strict';
            $('.item').on("click", function() {
                $(this).next().slideToggle(100);
                $('p').not($(this).next()).slideUp('fast');
            });
        });



        function alert(txt) {
            hsycms.alert('alert', txt, function() {
                hsycms.close('alert');
                console.log("点击了确定");
            })
        }

        function total(Employeeid, Employeename) {

            $.ajax({
                type: "GET",
                contentType: "application/json;charset=UTF-8",
                url: "detail.php",
                dataType: "json",
                data: {
                    Employeeid: Employeeid
                },
                beforeSend: function() {
                    // $('.load8').show();
                },
                success: function(data) {
                    //alert(data);
                    //alert(data);

                    //hsycms.alert('model');
                    var managername = "";
                    var content = '';
                    $.each(data.data, function(i, item) {
                        content = content + '\
							<div class="detaillist" ><span class="zzsz detail">' + item.zzsz + '</span><span class="zysy detail">' + item.zysy + '</span><span class="kxjc detail">' + item.kxjc + '</span><span class="tdzx detail">' + item.tdzx + '</span><span class="tdjs detail">' + item.tdjs + '</span><span class="ktcx detail">' + item.ktcx + '</span></div>';
                    });

                    $(".hsycms-model-content").html(content);

                    $(".hscysm-model-title").html(Employeename + '得分详情 <br> <div class="detailhead"><span class="zzsz detail">政治素质</span><span class="zysy detail">职业素养</span><span class="kxjc detail">科学决策</span><span class="tdzx detail">推动执行</span><span class="tdjs detail">团队建设</span><span class="ktcx detail">开拓创新</span></div>');
                    //alert($(".detail").text());
                    $(".detail").each(function() {
                        if ($(this).text() == "5") {
                            $(this).css({
                                "background": "linear-gradient( 45deg, rgb(255 0 0 / 50%) 0, rgb(255 0 0 / 50%) 25%, transparent 25%, transparent 50%, rgb(255 0 0 / 50%) 50%, rgb(255 0 0 / 50%) 75%, transparent 75%, transparent )",
                                "background-size": "2px 2px"
                            })
                        } else if ($(this).text() == "4") {
                            $(this).css({
                                "background": "linear-gradient( 45deg, rgb(0 140 4 / 50%) 0, rgb(0 140 4 / 50%) 25%, transparent 25%, transparent 50%, rgb(0 140 4 / 50%) 50%, rgb(0 140 4 / 50%) 75%, transparent 75%, transparent )",
                                "background-size": "2px 2px"
                            })
                        } else if ($(this).text() == "3") {
                            $(this).css({
                                "background": "linear-gradient( 45deg, rgb(255 124 0 / 50%) 0, rgb(255 124 0 / 50%) 25%, transparent 25%, transparent 50%, rgb(255 124 0 / 50%) 50%, rgb(255 124 0 / 50%) 75%, transparent 75%, transparent )",
                                "background-size": "2px 2px"
                            })
                        } else if ($(this).text() == "2") {
                            $(this).css({
                                "background": "linear-gradient( 45deg, rgb(0 130 202 / 50%) 0, rgb(0 130 202 / 50%) 25%, transparent 25%, transparent 50%, rgb(0 130 202 / 50%) 50%, rgb(0 130 202 / 50%) 75%, transparent 75%, transparent )",
                                "background-size": "2px 2px"
                            })
                        } else if ($(this).text() == "1") {
                            $(this).css({
                                "background": "linear-gradient( 45deg, rgb(170 170 170 / 50%) 0, rgb(170 170 170 / 50%) 25%, transparent 25%, transparent 50%, rgb(170 170 170 / 50%) 50%, rgb(170 170 170 / 50%) 75%, transparent 75%, transparent )",
                                "background-size": "2px 2px"
                            })
                        }
                    });







                },
                error: function(e) {
                    alert("no");
                    console.log(e.status);
                    console.log(e.responseText);
                }
            });
            hsycms.alert('model');


        }

        function voteuser(Employeeid, deptname) {

            $.ajax({
                type: "GET",
                contentType: "application/json;charset=UTF-8",
                url: "voteuser.php",
                dataType: "json",
                data: {
                    Employeeid: Employeeid,
                    deptname: deptname
                },
                beforeSend: function() {
                    // $('.load8').show();
                },
                success: function(data) {

                    //alert(data);

                    //hsycms.alert('model');
                    var managername = "";
                    var content = '';
                    $.each(data.dddept, function(i, item) {
                        content = content + '\
							<div class="voteuserlist" ><span class="finishname">' + item.name + '</span><span class="yesno" id="' + item.userid + '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="40"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-5-5h2a3 3 0 0 1 6 0h2a5 5 0 0 0-10 0zm1-6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm8 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" fill="rgba(223,223,223,1)"/></svg></span></div>';
                    });

                    $(".hsycms-model-content").html(content);

                    $(".hscysm-model-title").html(deptname + "投票情况<br/><br/>");

                    $.each(data.data, function(i, item) {
                        $("#" + item.userid).html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="40"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-.997-6l7.07-7.071-1.414-1.414-5.656 5.657-2.829-2.829-1.414 1.414L11.003 16z" fill="rgba(7,221,0,1)"/></svg>');
                        $("#" + item.userid).prevAll(".finishname").css({
                            "background": "linear-gradient( 45deg, rgb(0 140 4 / 50%) 0, rgb(0 140 4 / 50%) 25%, transparent 25%, transparent 50%, rgb(0 140 4 / 50%) 50%, rgb(0 140 4 / 50%) 75%, transparent 75%, transparent )",
                            "background-size": "2px 2px"
                        });

                    });




                },
                error: function(e) {
                    alert("no");
                    console.log(e.status);
                    console.log(e.responseText);
                }
            });
            hsycms.alert('model');


        }


        function Percentage(number1, number2) {
            return (Math.round(number1 / number2 * 10000) / 100.00 + "%"); //小数点后两位百分比
        }
    </script>
</head>

<body>
    <div class="zzsc-container">
        <section class="accordion">

            <div class="item depttype" id="calss1z">
                <img src="img/Location-Pin.png" alt="">
                <h3>一类支行正职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="calss2z">
                <img src="img/Headphones.png" alt="">
                <h3>二类支行正职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="runz">
                <img src="img/Lightbulb.png" alt="">
                <h3>经营部门正职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="norunz">
                <img src="img/Bookmarks.png" alt="">
                <h3>非经营部门正职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="class1f">
                <img src="img/Lightning-Bolt.png" alt="">
                <h3>一类支行副职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="class2f">
                <img src="img/Lightning-Bolt.png" alt="">
                <h3>二类支行副职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="runf">
                <img src="img/Lightning-Bolt.png" alt="">
                <h3>经营部门副职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="norunf">
                <img src="img/Lightning-Bolt.png" alt="">
                <h3>非经营部门副职</h3>
            </div>
            <p></p>
            <div class="item depttype" id="zhbzpj">
                <img src="img/Location-Pin.png" alt="">
                <h3>支行班子评价</h3>
            </div>
            <p></p>
        </section>
    </div>

    <div class="hsycms-model-mask" onclick="hsycms.closeAll()" id="mask-model"></div>
    <div class="hsycms-model hsycms-model-model" id="model">
        <div class="hscysm-model-title">详情</div>
        <div class="hsycms-model-content">

        </div>
        <div class="hsycms-model-btn">
            <button type="button ok">关闭</button>
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

</body>

</html>