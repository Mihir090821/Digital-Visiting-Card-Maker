<?php

include "header.php";

$id=$_GET['Cid'];
$cat_id=$_GET['cat'];

// for delete Image From Folder

$sql1="SELECT * from  `content` where cid = $id ";
$result1=mysqli_query($cn,$sql1) or die("select query failed");

$row=mysqli_fetch_assoc($result1);  

unlink("Cards/".$row['img']);


// for delete data from 

$sql="DELETE from  `content` where cid= $id ;";
$sql.="UPDATE `categary` set post=post-1 where cat_id= $cat_id ";

$result=mysqli_multi_query($cn,$sql);

if($result){



header("location:content.php");

}else{
    
    die("Delet Eorror");

}

?>