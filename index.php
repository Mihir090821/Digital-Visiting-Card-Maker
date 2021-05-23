<?php
include 'config.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online Visinting Card Maker </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="./Design/css/bootstrap.min.css">
    <script src="./Design/js/bootstrap.bundle.min.js.map"></script>

    <style>
    body {
        margin: 0;
        padding: 0;
    }

    .img {
        height: 100px;
        width: 100px;
    }
    </style>


</head>

<body>
    <!-- NAVBAR-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <img src="./Design/Images/Logo.png" alt="Logo" height="60px" width="100px" class=" mx-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link " aria-current="page" style="color:white;" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color" href="#carouselExampleControlsNoTouching" style="color:white;">About
                            us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color" href="#reviews" style="color:white;"> Reviews</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white;">
                            Categery
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php

$sql="SELECT * from `categary`";
$result=mysqli_query($cn,$sql);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

                            <li><a class="dropdown-item"
                                    href="indexcat.php? cat_id=<?php echo $row['cat_id'];?>"><?php echo $row['categary'];?>
                                </a>
                            </li>
                            <?php
}
}
                        ?>

                        </ul>
                    </li>

                </ul>
                <form class="d-flex">
                    <button type="button" class="btn btn-outline-dark" style="color: aliceblue;">
                        <a class="text-decoration-none text-white" href="indexcat.php"> Make Your Card</a>

                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Portfolio -->

    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img src="./Slide-Bar/Image-2.jpg" class="d-block w-100 img-fluid" alt="This Image Is Not Available"
                    style="height: 460px; ">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./Slide-Bar/Image.jpg" class="d-block w-100 img-fluid" alt="This Image Is Not Available"
                    style="height: 460px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Cards Section -->
    <div class="bg-info  ">
        <br>
        <div class="container  bg-info text-center " role="alert">

            <h3 class="">Some Visiting Card Designs</h3>
            <br>
        </div>

        <div class="container">
            <div class="row ">

                <?php

$sql1="SELECT * from `content` order by cid desc limit 6";
$result1=mysqli_query($cn,$sql1) or die("Query Failed");

if(mysqli_num_rows($result1)>0){
while($row1=mysqli_fetch_assoc($result1)){

?>
                <div class="col ">

                    <a href="Card-Maker.php?imgname=<?php echo$row1['img']; ?> & cat=<?php echo $row1['cat']; ?>">
                        <img src="<?php echo "Cards/".$row1['img'];?>" alt="" class="mb-3 " height="200px"
                            width="300px">
                    </a>

                </div>

                <?php
}
}
?>

            </div>


        </div>







        <!-- Button   container mt-4 d-flex-->


        <div class="text-end mt-3  container ">

            <div class="justify-content-flex-end mb-1 ">

                <button type="button " class="btn btn-primary btn-lg ">

                    <a href="indexcat.php" class="text-white text-decoration-none ">Show More Templets</a>

                </button>

            </div>

        </div>
        <br>

    </div>

    <!-- Reviews -->
    <!-- client reviews -->
    <div class="bg-success p-2  " id="reviews">
        <h2 class="text-center">Our Client Reviews</h2>

        <?php
$sql22="SELECT * FROM `review` order by id desc limit 3";
$res22=mysqli_query($cn,$sql22) or die("quiery failed");

if(mysqli_num_rows($res22)>0){
while($row=mysqli_fetch_assoc($res22)){

?>
        <div class="container">

            <div class="alert alert-secondary" role="alert">
                <?php echo $row['rev'];?>

            </div>
        </div>

        <?php

}


}else{

}

?>

    </div>


    <!-- Footer -->
    <div class="bg-dark">
        <br>
        <div class="p-3 mb-2 bg-dark text-white text-center">
            @copyright From 2021
        </div>






</body>

</html>