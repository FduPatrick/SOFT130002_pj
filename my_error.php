<?php
//用于获取和mysql数据库的连接以及结果集

function my_error($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn=mysqli_connect($servername,$username,$password);
    if(!$conn)
    {
        echo '连接错误';
        exit;
    }
    mysqli_query($conn,'use mydatabase;');
    $res=mysqli_query($conn,$sql);
    if(!$res)//连接错误
    {
        echo 'SQL执行错误，错误信息为：'.mysqli_error().'<br/>';
        exit;
    }
    return $res;//返回结果
}
//test
?>