<?php
    setcookie('username','');
    setcookie('password','');
    setcookie('isLogin','');
    logout();
    function logout(){
          echo "<div class='alert alert-warning fade in'>";
          echo "<button class='close' data-dismiss='alert'>";
          echo "<span>&times;</span>";
          echo "</button>";
          echo "<p>成功退出</p>";
          echo "</div>"; 
    }    
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>