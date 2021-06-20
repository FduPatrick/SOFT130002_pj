<?php
include_once 'my_error.php';
$res=my_error('select name,password from users');
$infos=array();
while($info=mysqli_fetch_assoc($res))
{
    $infos[]=$info;
}
$users=array_column($infos,'name');
$passwords=array_column($infos,'password');

$user=$_POST['username'];
$password=$_POST['password'];
if(in_array($user,$users)&&in_array($password,$passwords))
{
    $userkey=array_search($user,$users);
    $passwordkey=array_search($password,$passwords);
    if($userkey==$passwordkey)
    {
        echo "登陆成功！";
        session_start();
        $_SESSION['log']=1;
        $_SESSION['userID']=$userkey+1;
        $_SESSION['username']=$user;
        header("refresh:2;url=title.php");
    }
    else
    {
        echo "用户名或密码错误！";
        header("refresh:2;url=log.html");
    }
}
else
{
    echo "用户名或密码错误！";
    header("refresh:2;url=log.html");

}
?>