<?php
session_start();
session_destroy();
echo "退出登录成功！";
header("refresh:2;url=title.php");
?>