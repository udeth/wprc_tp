<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: white; font-family: '微软雅黑'; color: #fff; font-size: 16px; }
#href{text-decoration: none;}
</style>
</head>
<body>
<div class="system-message">
    <!-- <p class="success" style="color:black"><?php echo($message); ?></p> -->
    <div style="margin-top:80px;">

        <p class="jump" style="text-align:center;width:90%;margin:20px auto;height:30px;color:black;">
            页面<b id="wait"><?php echo($waitSecond); ?></b> 秒后页面将自动跳转,如不能跳转请点击&nbsp;&nbsp;<a id="href" id="btn-now" href="<?php echo($jumpUrl); ?>">这里</a>...
        </p>
        <div style="width:80%;margin:40px auto;diaplay:table">
            <div style="display:table-cell;width:30%;vertical-align: bottom;float:left">
                <img src="/Public/static/img/success.jpg" style="margin:auto auto;width:100%;display:block">
            </div>
            <div style="display:table-cell;width:65%;margin-left:4%;vertical-align: bottom;float:left;color:black">
                <?php echo($message); ?>
            </div>
            <div style="clear:both"></div>
        </div>
        <!-- <a id="href" id="btn-now" href="<?php echo($jumpUrl); ?>">立即跳转</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
        <!-- <button id="btn-stop" type="button" onclick="stop()">停止跳转</button>  -->
    </div>
    <p class="detail"></p>
</div>
<script type="text/javascript">
(function(){
 var wait = document.getElementById('wait'),href = document.getElementById('href').href;
 var interval = setInterval(function(){
     	var time = --wait.innerHTML;
     	if(time <= 0) {
     		location.href = href;
     		clearInterval(interval);
     	};
     }, 1000);
  window.stop = function (){
         console.log(111);
            clearInterval(interval);
 }
 })();
</script>
</body>
</html>