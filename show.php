<?php

include "header.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin records</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->

<link rel="stylesheet" href="./Design/css/bootstrap.min.css">
<script src="./Design/js/bootstrap.bundle.min.js.map"></script>

</head>

<body >


  <ul class="nav nav-tabs bg-primary " id="myTab" role="tablist" >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<li class="nav-item  " role="presentation">
<button class="nav-link  c1  " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
<a href="content.php " class="text-decoration-none text-dark">Content</a>
</button>
</li>

<?php


if($_SESSION['role']==1){

?>
<li class="nav-item" role="presentation">
<button class="nav-link c1 active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
 <a href="show.php" class="text-decoration-none text-dark"> Admin</a>
</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link c1" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
<a href="Catagery.php" class="text-decoration-none text-dark">Categary</a>
</button>
</li>

<?php
}
?>  
</ul>

<br>


<!-- Data Grod View -->

<div class="container">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button class="btn btn-primary " type="button">
<a href="Add.php" class="btn btn-primary">Add Admin</a>
</button>
</div>

<br>

<table class="table table-info table-striped">

<thead class="text-center" >
    <tr >
      <th scope="col">Sr.NO</th>
      <th scope="col">Role</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <!-- <th scope="col">Password</th> -->
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

  <?php
  
  $limit=4;
  

  if(isset($_GET['page'])){

    $page_no=$_GET['page'];

        
  }else{

    $page_no=1;
  }

  $offset=($page_no-1)*$limit;

  $sql="SELECT * FROM `admin1` order by Id desc limit $offset,$limit ";
  
  $result=mysqli_query($cn,$sql);
  




  if(mysqli_num_rows($result)>0){
  
$sr=$offset+1;

  while($i=mysqli_fetch_assoc($result)){
  ?>

  <tbody style="text-align: center;">
    <tr>
            <td><?php echo $sr;?></td>
            <td>
            <?php 
            
            $r= $i['Rol'];

            if($r==1){
              echo"Primary";

            }
            elseif ($r==0) {
              echo"Secondary";
            }
            ?>
                       
            </td>
            <td><?php echo $i['Fname']." ". $i['Sname']; ?></td>
            <td><?php echo $i['Uname'];?></td>
            <td><?php echo $i['Mo'];?></td>
            <td><?php echo $i['Email'];?></td>
            <td> <a href="Edit-user.php?ID=<?php echo $i['Id'];?>" ><img src="./Design/Images/update.ico" alt="Uapdate" height="30px"></a></td>
            <td> <a href="delete_admin.php?ID=<?php echo $i['Id'];?>"  onclick="msg()"> <img src="./Design/Images/Dlete.png" alt="Delete" height="30px"> </a></td>
    </tr>
  

<?php

$sr++;
  }
  }
?>

  </tbody>
</table>
<br>
<?php

$sql1="SELECT * FROM `admin1` ";

$res = mysqli_query($cn,$sql1) or die("Sql1 Query Failed");

if(mysqli_num_rows($res)>0){


$total_records=mysqli_num_rows($res);
$page=ceil($total_records/$limit);


echo'<nav aria-label="Page navigation example ">';
echo'<ul class="pagination justify-content-center">';

if($page_no>1){
  echo'<li class="page-item active "><a class="page-link  bg-dark" href="show.php?page='.($page_no-1).'">Prev</a></li>';
}

for($i=1;$i<=$page;$i++){

  if($i==$page_no){

    $active="active";
  }
  else{
    $active="";
  }

echo'<li class="page-item '.$active.'  "><a  class="page-link"  href = "show.php?page= '.$i.' "> '. $i.'</a> </li>';

}

if($page_no<$page){
echo'<li class="page-item  active  "><a class="page-link  bg-dark" href="show.php?page='.($page_no+1).'"  >Next</a></li>';
}
echo'</ul>';

}
?>
  
</nav>

</div>

</body>

</html>

<!-- Javascript -->
<script>

let msg=function(msg){
  return confirm('Are You Want to Delete User?');
}

</script>