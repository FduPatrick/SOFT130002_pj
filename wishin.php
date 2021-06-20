<?php
session_start();
//用于显示收藏成功和加入收藏夹
include_once 'my_error.php';
$id=isset($_GET['id'])?(integer)$_GET['id']:0;

if($id==0)
{
    header('refresh:3;url=title.php');
    echo '访问失败';
    exit;
}
echo '收藏成功！';

my_error("insert into wishlist(artworkID,userID) values({$id},{$_SESSION['userID']})");
header("refresh:2;url=information.php?id={$id}");
?>