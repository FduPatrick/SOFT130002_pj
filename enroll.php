<?php
include_once 'my_error.php';
$conn=my_error('select name from users');

$artworks=array();

while($artwork=mysqli_fetch_assoc($conn))//解析结果集，把数据存入$artworks中
{
    $artworks[]=$artwork;
}
$usernames=array_column($artworks,'name');

$username=$_POST['username'];
$password=$_POST['password'];

if(in_array($username,$usernames))
{
    echo "用户名已存在！";
    header("refresh:2;url=enroll.html");
}
else
{
    $sql="insert into users (name,password) values ('{$username}','{$password}')";//关键点
   
    
    my_error($sql);
    $res=my_error('select name from users');
    $infos=array();
    while($info=mysqli_fetch_assoc($res))
    {
        $infos[]=$info;
    }
    $users=array_column($infos,'name');
    $userkey=array_search($username,$users);


    echo "注册成功！";
    session_start();
    $_SESSION['log']=1;
    $_SESSION['userID']=$userkey+1;
    $_SESSION['username']=$username;

    header("refresh:2;url=title.php");
}
?>