<?php
include_once 'my_error.php';
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;//获取前页数
$num=2;//每一页的数量

$q=array();
$search=isset($_REQUEST['text'])?$_REQUEST['text']:'';
//根据复选框的结果对q数组进行赋值
if($_REQUEST['artist']==1)
{
    $q[]="artist";
}
if($_REQUEST['name']==1)
{
    $q[]="title";
}
if($_REQUEST['desc']==1)
{
    $q[]="description";
}

//在数据库中搜寻数据
if(is_array($q))
{
    switch(count($q))
    {
        case 0:
            $sql="select * from artworks where artist like '%{$search}%' 
            OR title like '%{$search}%'
            OR description like '%{$search}%'";
            break;
        case 1:
            $sql="select * from artworks where {$q[0]} like '%{$search}%' ";
            break;
        case 2:
            $sql="select * from artworks where {$q[0]} like '%{$search}%' OR {$q[1]} like '%{$search}%'";
            break;
        case 3:
            
            $sql="select * from artworks where {$q[0]} like '%{$search}%' 
            OR {$q[1]} like '%{$search}%'
            OR {$q[2]} like '%{$search}%'";
            break;
    }
    
    $res=my_error($sql);
    $resnum=mysqli_num_rows($res);//获取全部的行数
    $pagenum=($resnum%$num==0)?intdiv($resnum,$num):intdiv($resnum,$num)+1;//得到页数
    //根据当前页数在数据库中查找对应的数据
    $a=$num*($page-1);
    $sql=$sql."limit {$num} offset {$a}";
    $res=my_error($sql);

    $artworks=array();
    while($artwork=mysqli_fetch_assoc($res))
    {
        $artworks[]=$artwork;
    }

}
if(!isset($_REQUEST['post'])){
    foreach($artworks as $artwork):
        echo "
        <div class='item'>
                            <div class='image'>
                                <img src='img/{$artwork['imageFileName']}'>
                            </div>
                            <div class='text'>
                                <p>作品名称：{$artwork['title']}</p>
                                <p>作者: {$artwork['artist']}</p>
                                <p>作品流派: {$artwork['genre']}</p>
                            </div>
                        </div>";
    endforeach;
}
else//提供分页的页数
{
    echo $pagenum;
}
?>