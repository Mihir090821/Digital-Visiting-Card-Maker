<?php
include'config.php';
$id=$_GET['id'];

$del=" DELETE From `categary` where cat_id ='$id' ";

$q1=mysqli_query($cn,$del);

if($q1){
 
    header("Location:Catagery.php");

}
else{
    echo"Delete Error";

}
?>