<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Your Card</title>


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

    <?php

if(isset($_GET['imgname'])){
$cat=$_GET['cat'];
    $img=$_GET['imgname'];

}else{
    header("Location:index.php");
}


?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">

                <div style="padding: 25px; background-color:whitesmoke; box-shadow:4px 4px 12px black">

                    <div class="p-3 d-flex mb-2  text-dark justify-content-center ">

                        <h4>Selected Card</h4>

                    </div>
                    <div class="p-3 d-flex mb-2  text-dark justify-content-center ">
                        <img src="<?php echo"Cards/".$img ;?>" alt="This Card Is Not Available" height="192"
                            width="366px">

                    </div>



                </div>
            </div>
            <div class="col-md-8 p-5">
                <div style="padding-left:19px; margin-left:10px">
                    <form action="insertcode.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="img" value="<?php echo$img;?>">
                        <input type="hidden" name="cat" value="<?php echo$cat?>">

                        <div class="row">
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="#563d7c" title="Choose your color" name="color">
                            <div class="col-md-11 mb-3">
                                <label for="inputEmail4" class="form-label">Company Name</label>
                                <input type="text" class="form-control " placeholder="Company name" name="cname"
                                    aria-label="First name">
                            </div>



                            <div class="col-md-6 mt-4 mb-3">
                                <label for="inputEmail4" class="form-label">Name1</label>
                                <input type="text" class="form-control" placeholder="First name" name="name1"
                                    aria-label="First  name">
                            </div>
                            <div class="col-md-6 mt-4 mb-3">
                                <label for="inputEmail4" class="form-label">Mobile Number-1</label>
                                <input type="text" class="form-control" placeholder="Mobile Number1" name="mo1"
                                    aria-label="First  name">
                            </div>
                            <div class="col-md-6 mt-1 mb-3">
                                <label for="inputEmail4" class="form-label">Name2</label>
                                <input type="text" class="form-control" placeholder="Second name" name="name2"
                                    aria-label="First  name">
                            </div>
                            <div class="col-md-6 mt-1 mb-3">
                                <label for="inputEmail4" class="form-label">Mobile Number-2</label>
                                <input type="text" class="form-control" placeholder="Mobile Number1" name="mo2"
                                    aria-label="First  name">
                            </div>

                            <div class="col-md-6  mt-1">
                                <label for="formFile" class="form-label">Company Logo</label>
                                <input class="form-control" type="file" id="formFile" name="logo">
                            </div>

                            <div class="col-md-6 mt-1">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                                        placeholder="name@example.com">
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-success btn-lg me-md-2" type="submit">Submit</button>

                                </div>
                            </div>
                        </div>

                    </form>


                </div>


            </div>

        </div>
    </div>

</body>

</html>