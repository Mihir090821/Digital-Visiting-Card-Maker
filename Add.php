<?php 
include"config.php";
include"header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Admin</title>

    
<link rel="stylesheet" href="./Design/css/bootstrap.min.css">
<script src="./Design/js/bootstrap.bundle.min.js.map"></script>

</head>
<body>


<?php

if(isset($_POST['Submit'])){
  // echo"Mihir <br>";
  
$rol=  mysqli_real_escape_string( $cn, $_POST['role']);
$Fname=mysqli_real_escape_string($cn,$_POST['Fname']);
$Sname=mysqli_real_escape_string( $cn, $_POST['Lname']);
$Uname= mysqli_real_escape_string( $cn,$_POST['Uname']);
$Pass=mysqli_real_escape_string( $cn,  $_POST['Pass']);
$Mo=mysqli_real_escape_string( $cn,$_POST['Mo']);
$Email=mysqli_real_escape_string( $cn,$_POST['Email']);

$ins="INSERT INTO `admin1` ( `Rol`, `Fname`, `Sname`, `Uname`, `Pass`, `Mo`, `Email`) VALUES ( '$rol', '$Fname', '$Sname', '$Uname', '$Pass', '$Mo', '$Email')";

$quary=mysqli_query($cn,$ins);

if($quary){

  echo" <script> alert('Data Saved Succesfully') </script>";

 
}
else{
  echo"<script> alert('This Username and Password Is already Exist') </script>";
}

}


?>

<form action="" method="POST" >
    
<div class="contarner mx-5 ">

<!-- <p class="justify-content-center">Add</p>   -->
        

       <div class="row"> 
       <div class="col-md-4 mt-2">

<label for="role">Select The Admin Role</label>

<select class="form-select mb-3  " name="role" aria-label="Default select example" style="margin-right:10px;" >

  <option selected disabled>--Select The Admin Role--</option>
  <option value="1">Primary</option>
  <option value="0">Secondary</option>
 
</select>

</div>

<div class=" mb-3 col-md-4">
  <label for="formGroupExampleInput" class="form-label">First Name</label>
  <input type="text"  class="form-control" id="formGroupExampleInput" name="Fname" placeholder="Enter The First Name">
</div>

<div class=" mb-3 col-md-4">
  <label for="formGroupExampleInput" class="form-label">Last Name</label>
  <input type="text"  class="form-control" id="formGroupExampleInput" name="Lname" placeholder="Enter The Last Name">
</div>

</div>


<div class="row">
<div class=" mb-3 col ">
  <label for="formGroupExampleInput" class="form-label">UserName</label>
  <input type="text"  class="form-control" id="formGroupExampleInput" name="Uname" placeholder="Create Your UserName">
</div>


<div class=" mb-3 col ">
  <label for="formGroupExampleInput" class="form-label">Password</label>
  <input type="text"  class="form-control" id="formGroupExampleInput" name="Pass" placeholder="Create The Passsword">
</div>


</div>

<div class="row">
<div class="mb-3 col ">
  <label for="formGroupExampleInput2" class="form-label">Mobile No</label>
  <input type="text" name="Mo" class="form-control" id="formGroupExampleInput2" placeholder="Mobile No:">
</div>
<div class=" mb-3 col">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" name="Email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>

</div>
<button type="submit "  class=" center mt-4 btn btn-primary" name="Submit">Submit</button>&nbsp;


</div>

</form>







</body>
</html>