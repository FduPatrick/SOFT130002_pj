<?php
include_once 'my_error.php';
//获取表单信息

$search=isset($_POST['search'])?$_POST['search']:'';
$q=isset($_POST['q'])?$_POST['q']:['artist','title','description'];

//在数据库中搜寻数据
if(is_array($q)&&!empty($search))
{
    switch(count($q))
    {
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
    $artworks=array();
    while($artwork=mysqli_fetch_assoc($res))
    {
        $artworks[]=$artwork;
    }

}
if(isset($_POST['sortprice']))
{
    $price=array_column($artworks,'price');
    array_multisort($price,SORT_ASC,$artworks);
}
if(isset($_POST['sortview']))
{
    $view=array_column($artworks,'view');
    array_multisort($view,SORT_ASC,$artworks);
}

include_once 'search.html';
?>



