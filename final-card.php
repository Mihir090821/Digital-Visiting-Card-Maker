<?php

include "config.php";

$sql="SELECT * from `users` order by `uid` desc limit 1";
$result=mysqli_query($cn,$sql);

if(mysqli_num_rows($result)>0){

$data=mysqli_fetch_assoc($result);
$image=$data['tmp'];

$imgname=$image.".jpg";
$path="User-cards/".$imgname; 

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Card</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="./Design/css/bootstrap.min.css">
    <script src="./Design/js/bootstrap.bundle.min.js.map"></script>

</head>

<body>
    <div class="p-3 d-flex mb-2 bg-info text-dark justify-content-center ">

        <h3>Digital Visiting Card</h3>

    </div>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-8 ">

                <div style="padding: 25px; background-color:whitesmoke; box-shadow:4px 4px 12px black">

                    <div class="p-3 d-flex mb-2  text-dark justify-content-center ">

                        <h3 class="text-danger">Congratulations</h3>

                    </div>
                    <div class="p-3 d-flex mb-2  text-dark justify-content-center ">

                        <img src="<?php echo $path; ?>" alt="Card Is Not Maked" height="212" width="366px">

                    </div>



                </div>
            </div>

            <div class="col-md-4">
                <div style="margin-left: 10px;">
                    <div class="d-flex justify-content-center">
                        <h1 class="text-danger mt-5"> Your Card Is Ready</h1><br>
                    </div>
                    <div class="d-flex justify-content-center">

                        <button class="btn btn-success btn-lg mt-3">
                            <a href="<?php echo $path;?>" download class="text-white text-decoration-none">Download</a>
                        </button>



                    </div>
                    <br>

                    <form action="" method="POST">
                        <div class="textarea">
                            <label for="">
                                <h3>Your Review</h3>
                            </label><br>
                            <textarea name="txt"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea><br>
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="save" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                </div>
            </div>


        </div>

     
        <?php

if(isset($_POST['save'])){
    
    $txt=mysqli_real_escape_string($cn,$_POST['txt']);

$ins="INSERT INTO `review`( `rev`) VALUES ('$txt')" or die("query failed");
if(mysqli_query($cn,$ins)){
echo"
<script> alert('Thank You For Your Response') </script>
";
}else{
    echo"
<script> alert('Sorry,We Are not Getting Your Response') </script>
";
}

}
?>






</body>

</html>