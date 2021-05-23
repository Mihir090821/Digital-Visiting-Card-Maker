<?php
include 'header.php';

$id=$_GET['id'];
$sql="SELECT * FROM  `categary` where cat_id = '$id' ";
$result=mysqli_query($cn,$sql);



if(isset($_POST['Update'])){

    $name=$_POST['Txtcat'];

$upd="UPDATE  `categary` set  categary='$name'  where  cat_id=$id ";
$quaery=mysqli_query($cn , $upd);

if($quaery){

    header("Location:Catagery.php");
}
else{
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>This categery Does Not Updated </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    
</head>
<body>
<br>
<form action="" method="POST">
<div class="container">
<div class="mb-3">
<?php

if(mysqli_num_rows($result)){

    while($row=mysqli_fetch_assoc($result)){

?>
    <label for="exampleInputPassword1" class="form-label ">Username</label>
    <input type="Text" name="Txtcat" class="form-control ip" id="exampleInputPassword1" value="<?php echo $row['categary'];?>" >
 

<?php
    }
}
?>
 </div>


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="Submit" name="Update" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#Addcategery">
        Update Catagery
    </button>
</div>

</div>
</form>



</body>
</html>