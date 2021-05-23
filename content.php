<?php
include'config.php';
include'header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
</head>

<body>

    

    <ul class="nav nav-tabs bg-primary " id="myTab" role="tablist">

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <li class="nav-item  " role="presentation">
            <button class="nav-link  c1  active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">
                <a href="content.php " class="text-decoration-none text-dark">Content</a>
            </button>
        </li>

        <?php


if($_SESSION['role']==1){

?>
        <li class="nav-item" role="presentation">
            <button class="nav-link c1 " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">
                <a href="show.php" class="text-decoration-none text-dark "> Admin</a>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link c1" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                role="tab" aria-controls="contact" aria-selected="false">
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
            <button type="button" class="btn btn-primary ">

                <a href="Add-content.php" class="text-decoration-none " style="color:white;"> New Post </a>
            </button>
        </div>
    </div>

    </div>

    <br>


    <!-- Grid View -->
    <!-- Grid View -->
    <div class="container">

        <table class="table table-info table-striped">

            <thead class="text-center">
                <tr>
                    <th scope="col">Sr.NO</th>
                    <th scope="col">Categary</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Date</th>
                    <th scope="col">Templete </th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
<?php

$adm=$_SESSION['Id'];

$limit=4;

if(isset($_GET['Page'])){

    $page_no=$_GET['Page'];
}
else{
    $page_no=1;
}

$offset=($page_no-1)*$limit;


if($adm==1){
$sql="SELECT * from `content` 
left join `categary` on content.cat=categary.cat_id
left join `admin1` on content.adminn=admin1.Id
  order by cid desc
  limit $offset,$limit ";
}else{
    $sql="SELECT * from `content` 
    left join `categary` on content.cat=categary.cat_id
    left join `admin1` on content.adminn=admin1.Id
    where admin1.Id=$adm
      order by cid desc
      limit $offset,$limit";

}


$result=mysqli_query($cn,$sql);

if(mysqli_num_rows($result)>0){

    $sr_no=$offset+1;
    while($row=mysqli_fetch_assoc($result)){
?>

            <tbody class="text-center" >
                <tr>
                    <td ><?php echo $sr_no;?></td>
                    <td><?php echo $row['categary']; ?></td>
                    <td><?php echo $row['Fname']; ?></td>
                    <td><?php echo $row['Pdate'];?></td>
                    <td>
                    <img src="<?php echo"Cards/".$row['img'];?>" alt="Card" height="50px" width="100px" >
                    </td>
                   
                    <td> <a href="Edit-content.php?Cid=<?php echo $row['cid'];?> & cat=<?php echo $row['cat']?>"><img src="./Design/Images/update.ico"
                                alt="Uapdate" height="30px"></a></td>
                    <td> <a href="delete-content.php?Cid=<?php echo$row['cid'];?> & cat=<?php echo $row['cat'];?>" onclick="msg()"> <img
                                src="./Design/Images/Dlete.png" alt="Delete" height="30px"> </a></td>


                </tr>

            </tbody>
            

<?php
$sr_no++;
}
}

?>
        </table>
    </div>

<br>

<!--Pagination Codes  -->

<?php

$sql1="select*from `content`  ";

$result1=mysqli_query($cn,$sql1);

if(mysqli_num_rows($result1)>0){

    $total_record=mysqli_num_rows($result1);
    $total_pages = ceil($total_record/$limit);

echo'<nav aria-label="Page navigation example ">';
echo'<ul class="pagination justify-content-center">';

if($page_no>1){
echo'<li class="">
    <a class=" active page-link  bg-dark text-white" href="content.php?Page='.($page_no-1).'" tabindex="-1" aria-disabled="true" >Previous</a>
  </li>';
}

for($i=1;$i<=$total_pages;$i++){

if($i==$page_no){
    $active="active";

}
else{
    $active="";
}

echo'<li class="page-item '.$active.' "><a  class="page-link"  href = "content.php?Page='.$i.'"> '.$i.'</a> </li>';

}
if($page_no<$total_pages){
echo'<li class="">
    <a class=" active page-link  bg-dark text-white" href="content.php?Page='.($page_no+1).'" tabindex="-1" aria-disabled="true" >Next</a>
  </li>';
echo'</ul>';
}
}
?>

<script>

let msg=function(msg){
    return confirm("Do You Want To Delete Data?");
}

</script>


</body>

</html>