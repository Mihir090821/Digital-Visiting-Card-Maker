<?php



include "header.php";

if(empty($_FILES['new-img']['name'])){

    $insertname=$_POST['old-img'];
    // echo $insertname;
}
else{
    
    if(isset($_FILES['new-img'])){
        // echo"<pre>";
        // print_r($_FILES['new-img']);
        // echo"</pre>";
    }
    $erros=array();

    $name=$_FILES['new-img']['name'];
    $tmp_name=$_FILES['new-img']['tmp_name'];
    $type=$_FILES['new-img']['type'];
    $size=$_FILES['new-img']['size'];

    $insertname=time().$name;

    $ext=end(explode(".",$name));
    $extensions=array("jpg","jpeg","png");
    
    // extension validation
    if(in_array($ext,$extensions)===false){
        $erros[]= '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> This File Is Not Allowed</strong><br>
        Image Must Be jpg,jpeg or png formate
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

    // if not get erorrs then

    if(empty($erros)==true){

        move_uploaded_file($tmp_name,"Cards/".$insertname);
        echo"uploded";
        
    }
    else{
        print_r($erros);
        die();
    }


}


$old_cat=$_POST['old-cat'];

$id=$_POST['id'];

$adminn= $_SESSION['Id'];
$pdate=date("d m,Y");

$cat= $_POST['cat'];


$sql2="UPDATE `categary` SET post = post- 1  WHERE `cat_id`= '$old_cat' ; ";
$result=mysqli_query($cn,$sql2);

if($result){

$sql="UPDATE `content` SET `cat`='$cat',`adminn`='$adminn',`Pdate`='$pdate',`img`='$insertname' WHERE `cid`='$id';";
$sql.="UPDATE `categary` SET post=post+ 1  WHERE `cat_id`='$cat' ";


$res=mysqli_multi_query($cn,$sql) ;

if($res){

echo"Save";


header("Location:content.php");

}else{

    echo"Query Failed <br>";
    echo $sql;
}



}else{
    echo"Post query Failed";
}




?>