<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="./Design/css/bootstrap.min.css">
    <script src="./Design/js/bootstrap.bundle.min.js.map"></script>


</head>

<body></body>

</html>

<?php

include "config.php";

if (isset($_FILES['logo'])) {

    $errors = array();

    $file_name = $_FILES['logo']['name'];
    $tmp_name = $_FILES['logo']['tmp_name'];
    $type = $_FILES['logo']['type'];
    $size = $_FILES['logo']['size'];
    $extentions = array("png");

    $file_ext = end(explode(".", $file_name));

    $insertname = time() . "$file_name";
} else {
    $insertname = "";
}


// extension validation

if (in_array($file_ext, $extentions) === false) {

    $errors[] = '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> This File Is Not Allowed</strong><br>
        Image Must Be in png formate
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

// size validation
$limit = 500 * 1024;
if ($size > $limit) {

    $errors[] = '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong> This File Is Not Allowed</strong><br>
Image Must Less Than 500kb
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if (empty($errors) == true) {

    move_uploaded_file($tmp_name, "User-Logo/" . $insertname);
    // echo"file Uploded ";


} else {

    print_r($errors);
    die();
}

$cname = $_POST['cname'];
$fname = $_POST['name1'];
$mo1 = $_POST['mo1'];
$sname = $_POST['name2'];
$mo2 = $_POST['mo2'];

$email = $_POST['email'];

$color = $_POST['color'];
// $insertname
$cat = $_POST['cat'];
$template = $_POST['img'];


$sql = "INSERT INTO `users`( `cname`, `fname`, `mo1`, `sname`, `mo2`, `email`, `color`, `logo`, `cat`, `tmp`) VALUES ('$cname','$fname','$mo1','$sname','$mo2','$email','$color','$insertname','$cat','$template')";

$result = mysqli_query($cn, $sql);

if ($result) {

    header("location:card.php");
} else {
    echo "Query Failes";
}

?>