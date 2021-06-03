<?php
    include_once 'my_error.php';
    $conn=my_error('select * from artworks');
    //echo mysqli_num_rows($conn);
    $artworks=array();

    while($artwork=mysqli_fetch_assoc($conn))//解析结果集，把数据存入$artworks中
    {
        $artworks[]=$artwork;
    }


    //对发布时间排序
    $time=array_column($artworks,'timeReleased');
    array_multisort($time,SORT_DESC,$artworks);
    $sorttime=$artworks;


    $view=array_column($artworks,'view');//取列要取更新后的数组
    array_multisort($view,SORT_DESC,$artworks);
    $sortview=$artworks;
    //sorttime按降序存发布时间
    //sortview按降序存访问数量
    include_once 'title.html';
    ?>