<?php
    function db_connect()
    {
        $mysqli = new mysqli("localhost", "sun", "6865215441", "demo");
        if (mysqli_connect_errno()) 
        {
            echo "连接数据库出错";
            exit();
         }
	    $mysqli->set_charset("utf8");
        return $mysqli;
    }
?>