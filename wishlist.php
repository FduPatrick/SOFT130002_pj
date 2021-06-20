<?php
    session_start();
    include_once 'my_error.php';
    $log=isset($_SESSION['log'])?$_SESSION['log']:0;
    $userID=$_SESSION['userID'];
    $conn1=my_error("select * from wishlist where userID={$userID}");//创建与wishlist的连接
    $conn2=my_error("select * from users where userID={$userID}");//创建与users的连接

    $wishlist=array();

    while($wish=mysqli_fetch_assoc($conn1))
    {
        $wishlist[]=$wish;
    }//解析结果集，将收藏夹的内容存入$wishlist中
    
    

    $user=mysqli_fetch_assoc($conn2);
    include_once 'wishlist.html';
