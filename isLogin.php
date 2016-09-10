<?php
    if (!$_COOKIE['isLogin'])
    {
        header('Location:login.php');
    }
?>