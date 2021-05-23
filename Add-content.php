<?php
include 'header.php';


if(isset($_FILES['img'])){

$erros=array();

$name=$_FILES['img']['name'];
$size=$_FILES['img']['size'];
$tmp_name=$_FILES['img']['tmp_name'];
$file_type=end(explode('.',$name));
$extension=array("jpeg","jpg");

// This name is used for insert data in database
$insertname=time()."$name";


// type validation
if(in_array($file_type,$extension)===false){

$erros[]= '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong> This File Is Not Allowed</strong><br>
Image Must Be jpg or jpeg  formate
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}


// size validation

$limit=300*1024;
if($size>$limit){
  $erros[]= '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> This File Is Not Allowed</strong><br>
  Image Must Less Than 300kb
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}

// if error does'n occure then 
if(empty($erros)==true){

move_uploaded_file($tmp_name,"Cards/".$insertname);
echo"image uploaded Succesfully";

}
else{

 print_r($erros);

  die();
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Content </title>
</head>

<body>
    <div class="container ">


        <div class="mx-5 mt-3" style="background-color:whitesmoke;">

            <h1 class="display-6 text-center mb-3" style="background-color:turquoise;">Add New Content</h1>
            <div class="mx-5">

                <form action="" method="POST" enctype="multipart/form-data">
                <label for="" class=" mt-3">Select Categery</label>
                    <select class="form-select   mb-3" aria-label="Default select example" name="cat">
                        <option selected disabled> Select Categary</option>
                        <?php

$sql="SELECT * from `categary` ";
$result=mysqli_query($cn,$sql);

if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
?>

                        <option value="<?php echo" $row[cat_id]";?>" name="cat"><?php echo $row['categary'] ;?></option>

                        <?php           
}
}
                       ?>
                    </select>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Template</label>
                        <input class="form-control " type="file" id="formFile" name="img">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                        <button class="btn btn-lg btn-success me-md-2  mb-5" type="submit" name="save">Save</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--insert codes-->
    <?php

if(isset($_POST['save'])){

  $catagery=$_POST['cat'];
  $admin=$_SESSION['Id'];
  $date=date("d M, Y");

    $ins="INSERT into `content`(cat,adminn, Pdate,img) values($catagery,$admin,'$date','$insertname');";

    $ins.="UPDATE `categary` set post=post+1 where cat_id=$catagery";


  if(mysqli_multi_query($cn,$ins)){

 echo"Content Saved Succesfully";
 header("Location:content.php");

  }
  else{
    

    die('<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>  Content Saved</strong><br>
    Please Check Your entries
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');

  }
  
  
  }
  
  
  
  
?>


</body>

</html>