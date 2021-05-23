<?php

include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categary</title>

    <link rel="stylesheet" href="./Design/css/bootstrap.min.css">
    <script src="./Design/js/bootstrap.bundle.min.js.map"></script>

</head>

<body>


    <!-- Cards Section -->
    <div class="card text-center">
        <div class="card-header bg-info ">
            <h3> Categeries</h3>

            <ul class="nav nav-tabs card-header-tabs  justify-content-center ">

                <?php

$max="SELECT max(cat_id) as `mxid` from `categary` ";
$qr = mysqli_query($cn,$max);
$res=mysqli_fetch_assoc($qr);

$max_id=$res['mxid'];

if(isset($_GET['cat_id'])){

    $catid= $_GET['cat_id'];

}else{

    $catid= $max_id;
}



$sql="SELECT * from  `categary`   order by cat_id desc";
$result=mysqli_query($cn,$sql);

if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_assoc($result)){


        if($catid==$row['cat_id']){

            $active="active";

        }else{
           
            $active="";
        }

?>


                <li class="nav-item">
                    <a class="nav-link  text-decoration-none text-dark <?php echo$active;?>" aria-current="true"
                        href="indexcat.php?cat_id=<?php echo $row['cat_id'];?>"><?php echo $row['categary'];?></a>
                </li>

                <?php

}
}
 

?>
            </ul>
        </div>
        <div class="card-body">




            <div class="container">

                <div class="row">
                    <?php
    
    $sql="SELECT * from  `content` 
    where cat=$catid  order by cid desc " ;
    $result=mysqli_query($cn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
    
    
    ?>

                    <div class="col-sm">
                        <a href="Card-Maker.php?imgname=<?php echo $row['img']; ?>  & cat=<?php echo $row['cat']; ?>" >
                            <img src="<?php echo"Cards/".$row['img'];?>" alt="Image Is Not Load" height="200"
                                width="300" class="mx-2 my-2">
                        </a>
                    </div>

                    <?php
}
}else{
echo'<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>  No Categery Available in This catagery </strong><br>
    Please Check Another Ctegary
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
                </div>
            </div>

        </div>
    </div>



</body>

</html>