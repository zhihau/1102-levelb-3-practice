<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="css/s2.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.9.1.min.js"></script>
</head>

<body>
<div id="main">
  <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="03P01.htm">首頁</a> <a href="03P02.htm">線上訂票</a> <a href="#">會員系統</a> <a href="03P03.htm">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
    <?php
    if(isset($_POST['acc'])){
      if($_POST['acc']=='admin'&&$_POST['pw']=='1234'){
        $_SESSION['login']=$_POST['acc'];
      }else{
        echo "<div class='ct' style='color:red'>帳號或密碼錯誤</div>";
      }
    }
    if(isset($_SESSION['login'])){
      include "back/nav.php";
      $do=$_GET['do']??'main';
      $file='back/'.$do.'.php';
      if(file_exists($file)){
          include $file;
      }else{
          include "back/main.php";
      }
    }else{
      ?>
      <form action="?" method="post">
      <table>
        <tr>
          <td>帳號</td>
          <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
          <td>密碼</td>
          <td><input type="password" name="pw" id="pw">
          </td>
        </tr>
        <tr>
          <td><input type="submit" value="登入"></td>
          <td></td>
        </tr>
      </table>
      </form>
      <?php
    }
    ?>
    
    
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>