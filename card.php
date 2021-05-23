<?php

// header('content-type:image/jpeg');

include "config.php";

$sql="SELECT * from `users` order by `uid` desc limit 1";
$result=mysqli_query($cn,$sql);

if(mysqli_num_rows($result)>0){
$data=mysqli_fetch_assoc($result);

$font="bahnschrift.ttf";

$image=$data['tmp'];
$name=$data['cname'];
$fname=$data['fname'];
$mo1=$data['mo1'];
$sname=$data['sname'];
$mo2=$data['mo2'];
$email=$data['email'];

// logo
$logo=$data['logo'];


// color
$color=$data['color'];
list($r,$g,$b)=sscanf($color,"#%02x%02x%02x");

// fetching data on image
$path="Cards/".$image;
$card_image=imagecreatefromjpeg($path);
// $card_image=imagecreatefrompng($path);
$font_color=imagecolorallocate($card_image,$r, $g, $b);



imagettftext($card_image,15,0,130,50,$font_color,$font,$name);

imagefttext($card_image,10,0,12,19,$font_color,$font,$fname);
imagefttext($card_image,8,0,11,31,$font_color,$font,$mo1);
imagefttext($card_image,10,0,213,19,$font_color,$font,$sname);
imagefttext($card_image,8,0,213,31,$font_color,$font,$mo2);
imagettftext($card_image,9,0,12,160,$font_color,$font,$email);

// for logo


$logopath="User-Logo/".$logo;

// logo size

list($width,$height)=getimagesize($logopath);
$new_width=$width/3;
$new_height=$height/3;

$print_logo=imagecreatefrompng($logopath);

imagecopy($card_image,$print_logo,round($new_width/2),59,0,0,$new_width,$new_height);




imagejpeg($card_image,"User-cards/".$image.".jpg");
// imagejpeg($card_image);

imagedestroy($card_image);

header("location:final-card.php");

}


else{

    echo "Please Enter Your Data In Correct Manner";
}




?>


