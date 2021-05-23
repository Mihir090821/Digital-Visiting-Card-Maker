<?php

include "config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="./Design/css/bootstrap.min.css">
    <script src="./Design/js/bootstrap.bundle.min.js.map"></script>


</head>

<body>
    <!-- NAVBAR-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <img src="./Design/Images/Logo.png" alt="Logo" height="60px" width="100px" class=" mx-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link " style="color:white;" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color" href="#">About</a>
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


    <!-- reviews -->


    <div class="bg-success p-2  mb-3">
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


    <br>
    <br><br>
    <!-- footer -->
    <div class="bg-dark">
        <br>
        <div class="p-3 mb-2 bg-dark text-white text-center">
            @copyright From 2021
        </div>

</body>

</html>