<?php
	require "isLogin.php";
	require "main.inc.php";
  require "connect.inc.php";
      $mysqli = db_connect();
      if (!empty($_POST))
      {
        $sql = getSql();
        $result = $mysqli->query($sql);
        if (!$result)
        {
          echo '获取结果失败。';
          exit();
        }
      }

      function getSql()
      {
        if (!empty($_POST['sqlQuery']))
        {
          return $_POST['sqlQuery'];
        }
        else
        {
          return mulSql();
        }
      }

      function mulSql()
      {
        $mulSql = "";
        $addAnd = false;
        foreach($_POST as $key => $value)
        {
          if (!empty($value))
          {
            if ($addAnd == false)
            {
              $mulSql = "select * from student where {$key} like '%{$value}%'";
            }
            else
            {
              $mulSql .= " and {$key} like '%{$value}%'";
            }
            $addAnd = true;
          }
        }
        return $mulSql;
      }
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mycss/mystyle.css" rel="stylesheet">
    <title>北京石油化工学院</title>
<?php
	echoHeader();
?>

  </head>
  <body>
<div class="container">
    <form class="form-horizontal" role="form" method="POST">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-10">
          <input name="name" class="form-control" id="name" placeholder="支持模糊搜索（可选项）">
        </div>
      </div>

      <div class="form-group">
        <label for="sex" class="col-sm-2 control-label">性别</label>
        <div class="col-sm-10">
          <input name="sex" class="form-control" id="sex" placeholder="支持模糊搜索（可选项）">
        </div>
      </div>       

      <div class="form-group">
        <label for="stuid" class="col-sm-2 control-label">学号</label>
        <div class="col-sm-10">
          <input name="stuid" class="form-control" id="stuid" placeholder="支持模糊搜索（可选项）">
        </div>
      </div>

      <div class="form-group">
        <label for="class" class="col-sm-2 control-label">班级</label>
        <div class="col-sm-10">
          <input name="class" class="form-control" id="class" placeholder="支持模糊搜索（可选项）">
        </div>
      </div>      
     
      <div class="form-group">
        <label for="academy" class="col-sm-2 control-label">学院</label>
        <div class="col-sm-10">
          <input name="academy" class="form-control" id="academy" placeholder="支持模糊搜索（可选项）">
        </div>
      </div>      

      <div class="form-group">
        <label for="job" class="col-sm-2 control-label">职位</label>
        <div class="col-sm-10">
          <input name="job" class="form-control" id="job" placeholder="支持模糊搜索（可选项）">
        </div>
      </div>      

      <div class="form-group">
        <label for="politics" class="col-sm-2 control-label">政治面貌</label>
        <div class="col-sm-10">
          <input name="politics" class="form-control" id="politics" placeholder="支持模糊搜索（可选项）">
        </div>
      </div>      

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">提交查询</button>
        </div>
      </div>

    </form>
<?php
    echoTable($result);
?>
</div>
<div class="container">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
