<?php

include'config.php';

session_start();

if(!isset($_SESSION['Uname'])){

    header("location:admin.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
   
    <link rel="stylesheet" href="./Design/css/bootstrap.min.css">
<script src="./Design/js/bootstrap.bundle.min.js.map"></script>
<style>
.c1{
    color: white;
    font-weight: bold;
        }
.c2{
    width:100vw;
    background-color: green;
}

h4{
    display: inline-block;
}
img:hover{
    filter: invert(10%);
}
</style>


</head>
<body>
  <div class="c2">
        <div class="row bg-success c2">

    <div class="col-sm"> </div>
    
    <div class="col-sm">
       <h1 class="text-white mt-2 mb-3">Admin Panel</h1> 
        </div>
        
    <div class="col-sm  mt-2">
<?php

   echo " <h4 class='mx-5'>Welcome " ."". "{$_SESSION['Uname']} </h4> ";
?>


<a href="logout.php" class="text-decoration-none text-warning c1">

<h4>
    
<img src="./Design/Images/Logout.png" alt="Logout" height="70px" width="80px"> 

</h4>
</a>

    </div>
  </div>
  </div>
  
</body>
</html>
<?php





?>