<?php

include"config.php";

$id=$_GET['ID'];

$del=mysqli_query($cn,"DELETE From `admin1` where Id = $id");

if($del){
// echo"Data Deleted Succesfully";
    
    header('location:show.php');
}

?>