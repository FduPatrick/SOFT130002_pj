<?php
header('Content-type:text/html');
//接受要显示的艺术品ID
$id=isset($_GET['id'])?(integer)$_GET['id']:0;

if($id==0)
{
    header('refresh:3;url=title.php');
    echo '访问失败';
    exit;
}
include_once 'my_error.php';
$sql="select * from artworks where artworkID = {$id}";
$res = my_error($sql);
$artwork=mysqli_fetch_assoc($res);//获取艺术品信息
$heat=$artwork['view']+1;
my_error("update artworks set view = {$heat} where artworkID={$id}");

include_once 'information.html';//导入html

?>