<?php
	require "isLogin.php";
	require "connect.inc.php";
  require "main.inc.php";
	$mysqli = db_connect();
	if (isset($_POST['submit']) && (empty($_POST['updateCondition']) || empty($_POST['updateConditionValue'])))
	{
          echo "<div class='alert alert-warning fade in'>";
          echo "<button class='close' data-dismiss='alert'>";
          echo "<span>&times;</span>";
          echo "</button>";
          echo "<p>请填写更新信息</p>";
          echo "</div>"; 
	}
	$sql = "update student set {$_POST['updateCondition']}='{$_POST['updateConditionValue']}' where stuid='{$_GET['stuid']}'";
  if ($mysqli->query($sql))
  {
          echo "<div class='alert alert-success fade in'>";
          echo "<button class='close' data-dismiss='alert'>";
          echo "<span>&times;</span>";
          echo "</button>";
          echo "<p>更新成功</p>";
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
	<style>
	body { 
		padding-top: 70px
		}
	</style>	
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<?php
  echoHeader();
?>
  <div class="container">
      <form class="form-inline text-align" method="post">
        <select name="updateCondition" class="form-control">
            <option value="phone">手机</option>
            <option value="wechat">微信</option>
            <option value="politics">政治面貌</option>
            <option value="job">职务</option>
            <option value="qq">QQ</option>
        </select>
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="updateConditionValue" class="form-control"> 
            </div> 
          </div>
       <input type="submit" name="submit" class="btn btn-info" value="提交更新" >
     </form> 
<?php
    $stuSql = "select * from student where stuid='{$_GET['stuid']}'";
	$stuResult = $mysqli->query($stuSql);
	$field = $stuResult->fetch_fields();
	echo "<table class='table table-striped'>";
	echo "<tr>";
	foreach ($field as $value)
	{
		echo "<td>".$value->name."</td>";
	}
	echo "</tr>";
	$stuRow = $stuResult->fetch_assoc();
	echo "<tr>";
	foreach($stuRow as $value)
	{
		echo "<td>".$value."</td>";
	}
	echo "</tr>";
?>
</div>
<div class="container">
     <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>