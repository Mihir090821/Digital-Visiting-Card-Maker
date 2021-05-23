<?php
include'config.php';
session_start();
if(isset($_SESSION['Uname'])){

  header("Location:content.php");
}



if(isset($_POST['Submit'])){

  
  $Uname=$_POST['Uname'];
  $Pass=$_POST['Pass'];

$sql="SELECT `Uname`,`Rol`,`Id` from `admin1` where Uname='$Uname' And Pass='$Pass' ";


$result=mysqli_query($cn,$sql) or die("Quaery Failed");

if(mysqli_num_rows($result)>0){

  while($row=mysqli_fetch_assoc($result)){
    
  $_SESSION['role'] = $row['Rol'];
$_SESSION['Id']=$row['Id'];
$_SESSION['Uname']=$row['Uname'];

header("Location:content.php");

  } 
}

else{

echo" <script> alert('Username And Password Does Not Match') </script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

<link rel="stylesheet" href="./Design/css/bootstrap.min.css">
<link rel="stylesheet" href="./Design/css/Login.css">/

<script src="./Design/js/bootstrap.bundle.min.js.map"></script>


</head>
<body>


<div class="row">

<div class="col-sm-4"></div>
<div class="col-sm-4">

<div class="box1">
<div class="container">

<form  method="POST" >

<br>

<!-- for Logo -->
<div class="row">
<div class="col-sm">
<img src="./Design/Images/login.png" alt="LOGO" height="70px">
</div>
<div class="col-sm">
<h1 class="mt-2">Login</h1>

</div>
<div class="col-sm"></div>


</div>


<br>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label ">Username</label>
    <input type="Text" name="Uname" class="form-control ip" id="exampleInputPassword1" placeholder="Username">
  </div>
<div class="mb-4">
    <label for="exampleInputPassword1" class="form-label ">Password</label>
    <input type="password" name="Pass" class="form-control ip" id="exampleInputPassword1">
  </div>
  <div class="d-grid gap-2">
  <button class="btn btn-info" name="Submit" type="Submit">Login</button>
  
<button type="button"  class="btn btn-link  mb-4">Forget Password?</button>
</div>
  </form>
</div>
</div>
</div>
<div class="col-sm-4"></div>
</div>


</body>
</html>