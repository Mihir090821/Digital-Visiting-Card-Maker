<?php

include 'header.php';

$cat=$_GET['cat'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
</head>

<body>
    <?php
if($_GET['Cid']){

$id=$_GET['Cid'];


}else{
    header("location:content.php");
}

$sql="SELECT * from `content` 
  where cid=$id ";

$result=mysqli_query($cn,$sql);

if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_assoc($result)){

?>
    <div class="container ">


        <div class="mx-5 mt-3" style="background-color:whitesmoke;">

            <h1 class="display-6 text-center mb-3" style="background-color:turquoise;">Update Content</h1>
            <div class="mx-5">

                <form action="Edit-contect-code.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?php echo$row['cid'];?>">

                <input type="hidden" name="old-cat" value="<?php echo $cat;?>">
                
                    <label for="" class=" mt-3">Update Categery</label>
                    <select class="form-select   mb-3" aria-label="Default select example" name="cat">
                        <option disabled> Select Categary</option>

                        <?php

$sql2="SELECT * from `categary` ";
$result2=mysqli_query($cn,$sql2);

if(mysqli_num_rows($result2)>0){
    while($c=mysqli_fetch_assoc($result2)){

if($row['cat']==$c['cat_id']){

$selected="selected";
$old_id=$c['cat_id'];


}else{
$selected="";
}


?>


                        <option value="<?php echo $c['cat_id'];?>"   <?php echo $selected;  ?> ><?php echo $c['categary'];?> </option>
                      
                        <?php

                            }
}
?>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Template</label>

                            <input class="form-control " type="file" id="formFile" name="new-img">

                            <img src="<?php echo"Cards/".$row['img'];?>" alt="Image Is Not Available"
                                class="mt-2 mb-2  image-fluid">
                            <input type="hidden" name="old-img" value="<?php echo$row['img'];?>">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                            <button class="btn btn-lg btn-success me-md-2  mb-5" type="submit"
                                name="save">Update</button>

                        </div>
                </form>
            </div>
        </div>

    </div>
    <?php
}
}
?>



</body>

</html>