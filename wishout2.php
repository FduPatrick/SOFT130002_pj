<?php
//用于收藏夹删除收藏
include_once 'my_error.php';
$id=isset($_GET['id'])?(integer)$_GET['id']:0;

if($id==0)
{
    header('refresh:3;url=title.php');
    echo '访问失败';
    exit;
}
echo '取消收藏成功！';

my_error("delete from wishlist where artworkID={$id}");
header("refresh:2;url=wishlist.php");
?>