<?php
        require "isLogin.php";
        require_once "main.inc.php";
        include "connect.inc.php";
        ini_set('display_errors',true);       //显示调试信息
        error_reporting(E_ALL);    
        db_connect();
        $mysqli = new mysqli("localhost", "sun", "6865215441", "demo");
        $mysqli->set_charset("utf8");
        $sql_result = "select * from student";
        $result = $mysqli->query($sql_result);
        if (!$result)
        {
            echo $mysqli->errno.': '.$mysqli->error;
            exit(); 
        }
        $sqlPage = getSql();
        $pageResult = $mysqli->query($sqlPage);
        if ($pageResult->num_rows == 0)
        {
          echo "<div class='alert alert-warning fade in'>";
          echo "<button class='close' data-dismiss='alert'>";
          echo "<span>&times;</span>";
          echo "</button>";
          echo "<p>查无此人。。。</p>";
          echo "</div>";           
        }
    ?>

    <?php
      function getSql()
      {
        if (!empty($_POST['sqlQuery']))
        {
          return $_POST['sqlQuery'];
        }
        elseif (!empty($_POST['condition']))
        {
           return "select * from student where {$_POST["condition"]} like '%{$_POST['conditionValue']}%'";
        }
        else
        {
           return "select * from student where class like '%计153%'";
        }
      }
    ?>

<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>北京石油化工学院</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mycss/mystyle.css">
  </head>
  <body>

  <?php
        echoHeader();
  ?>

<div class="container">
      <form class="form-inline text-align" method="POST">
        <select name="condition" class="form-control">
            <option value="name">姓名</option>
            <option value="stuid">学号</option>
            <option value="class">班级</option>
            <option value="politics">政治面貌</option>
            <option value="job">职务</option>
        </select>
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="conditionValue" class="form-control" placeholder="支持模糊查询"> 
            </div> 
          </div>
       <input type="submit" name="submit" class="btn btn-info" value="提交查询" >
      </form> 
</div>
<div class="container">

  <?php
        echoTable($pageResult);              //输出表格
        $result->close();
        $mysqli->close();
   ?>
</div>

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>