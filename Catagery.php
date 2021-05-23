<?php
include'header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catagery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>

<body>


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
<button class="nav-link c1 " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
 <a href="show.php" class="text-decoration-none text-dark"> Admin</a>
</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link c1 active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
<a href="Catagery.php" class="text-decoration-none text-dark">Categary</a>
</button>
</li>

<?php
}
?>  
</ul>

<br>






    <div class="container">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary  " data-bs-toggle="modal" data-bs-target="#Addcategery">
                Add Catagery
            </button>
        </div>
    </div>

    <!-- Modal  For Insert -->
    <div class="modal fade" data-bs-backdrop="static" id="Addcategery" tabindex="-1" aria-labelledby="AddcategeryLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddcategeryLabel">Add New Catagery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="POST">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Categery Name</label>
                            <input type="text" name="cname" class="form-control" id="formGroupExampleInput"
                                placeholder="Categery Name">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="Submit" name="Save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Insert PHP Codes -->
    <?php

if(isset($_POST['Save'])){
    
$cname = $_POST['cname'];

$sql="INSERT into `categary`(`categary`) values('$cname')";
$quary=mysqli_query($cn,$sql);

if($quary){
    echo'<br><div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>categery Added Succesfully </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else{
    echo'<br><div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>This categery Does Not Added </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

}
?>


    <!-- Grid view -->


    <div class="container mt-4">

        <table class="table table-info table-striped">

            <thead class="text-center">
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Categery Name</th>
                    <th scope="col">Number Of Posts</th>
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

$sql1="SELECT * from `categary` order by cat_id desc Limit $offset,$limit ";
$result=mysqli_query($cn,$sql1);


if(mysqli_num_rows($result)>0){

    $sr=$offset+1;
    while($row=mysqli_fetch_assoc($result)){

        

?>
            <tbody class="text-center">
                <tr>
                    <td><?php echo $sr ;?></td>
                    <td><?php echo $row['categary'];?></td>
                    <td><?php echo $row['post']; ?></td>
                    <td> <a href="categary_code.php?id=<?php echo $row['cat_id'];?>" class=" text-decoration-none"><img
                                src="./Design/Images/update.ico" alt="Uapdate" height="30px"></a> </td>
                    <td> <a href="delete_cat.php?id=<?php echo $row['cat_id'];?>" class="text-decoration-none"
                            onclick="msg()"> <img src="./Design/Images/Dlete.png" alt="Delete" height="30px"></a></td>
                </tr>
            </tbody>

            <?php
            $sr++;
    }
}
?>

        </table>

    </div>


    <!-- Pafination -->



    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">


            <?php
// this codes For Pagination
// this codes For Pagination

$sql2="SELECT * From `categary`";
$res=mysqli_query($cn,$sql2);


if(mysqli_num_rows($res)>0){

$Total_records=mysqli_num_rows($res);
$page=ceil($Total_records/$limit);

if($page_no>1){
    echo'<li class="">
    <a class=" active page-link  bg-dark text-white" href="Catagery.php?page='.($page_no-1).'" tabindex="-1" aria-disabled="true" >Previous</a>
  </li>';
}
for($p=1;$p<=$page;$p++){
    if($p==$page_no){

      $active="active";

    }else
    {
        $active="";
    }

echo'<li class=" '.$active.' page-item"><a class="page-link " href="Catagery.php?page='.$p.' ">'.$p.'</a></li>';

}

if($page_no<$page){
    echo'<li class="">
    <a class=" active page-link  bg-dark text-white " href="Catagery.php?page='.($page_no+1).'" tabindex="-1" aria-disabled="true">Next</a>
  </li>';
}

}
?>



        </ul>
    </nav>






    <!-- pagination -->





</body>


<script>
let msg = function() {

    return confirm("Do you Want To Delete Categary?");

}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
</script>

</html>