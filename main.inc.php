<?php
  //输出表格
    function echoTable(mysqli_result $pageResult)
    {
        //echo "<div id='info'>";
        echo "<table class='table table-striped'>";
        echo "<tr>";
        $field = $pageResult->fetch_fields();
        foreach ($field as $value)
        {
            echo "<td>".$value->name."</td>";
        }
        echo "<td>操作</td></tr>";
        while($row = $pageResult->fetch_assoc())
        {
            echo "<tr>";
            $valueId = 0; // 设置rowId,以便找到uid
            $stuid = NULL;
            foreach($row as $value)
            {
                $valueId++;
                if ($valueId == 4)
                {
                    $stuid = $value;
                }
                echo "<td>".$value."</td>";
            }
            echo "<td><a href='change.php?stuid=".$stuid."' type='button'><button class='btn btn-default'>更新</button></a></td>";
            echo "</tr>";
        }
        echo "</table><p><b>";
        echo "</div>";
    }
  ?>
<?php
    function echoHeader()
    {
?>
  <div class="container-fluid">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://www.bipt.edu.cn">BIPT</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">首页<span class="sr-only">(current)</span></a></li>
            <li><a href="search.php">多条件搜索</a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blank<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Blank</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>-->
          </ul>
          <form class="navbar-form navbar-left" role="search" method="POST">
            <div class="form-group">
              <input name="sqlQuery" type="text" class="form-control" placeholder="请输入SQL">
            </div>
            <button type="submit" class="btn btn-default">SQL查询</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">退出</a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>-->
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
<?php
    }
?>