
<?php
    require "main.inc.php";
    if (isset($_POST['submit']))
    {
      require "connect.inc.php";
	  echo 'teststsefasdfasdfas';
      $mysqli = db_connect();
      $username = $_POST['username'];
      $password = substr(md5($_POST['password']), 0, 20);
      $sql = "select * from user where username='{$username}' and password='{$password}'";
      echo $sql;
      $result = $mysqli->query($sql);
      if (!$result)
      {
        exit('获取结果失败。。。');
      }
      if ($result->fetch_row())
      {
        $time = time()+3600*24;
        setcookie('username', $username, $time);
        setcookie('password', $password, $time);
        setcookie('isLogin', true, $time);
        header('Location:index.php');
      }
      else
      {
        loginError();
      }
    }

    function loginError(){
          echo "<div class='alert alert-warning fade in'>";
          echo "<button class='close' data-dismiss='alert'>";
          echo "<span>&times;</span>";
          echo "</button>";
          echo "<p>警告：用户名或密码错误</p>";
          echo "</div>"; 
    }

?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>北京石油化工学院</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mycss/signin.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="User Name" >
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" >
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="yes">Sign in</button>
      </form>
    </div>
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
  </body>
</html>
