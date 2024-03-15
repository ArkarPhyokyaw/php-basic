<?php
//echo getpostcount();
include_once"sysgem/postgenerator.php";
$data=file_get_contents("assets/gemdata.json");
$posts=json_decode($data,true);
$types = [1, 2];
$i = 0;
$writers=["nothing","something","anything","nobody"];
$imglinks=["1708474094_desktop.png1708474094",
           "1708525007_photo-1517849845537-4d257902454a.jpg",
           "1708535211_Burger-Image.png","1708535211_Burger-Image.png"];

$subjects=[1,2,3];
foreach ($posts as $post)
{
    $title = $post["title"];
    $content = $post["content"];
   
    $type = $types[$i % 2];
 
    $writer=$writers[$i%4];
  
    $imglink=$imglinks[$i%4];
    $subject=$subjects[$i%3];
    $i++;

    insertPost($title,$type,$writer,$content,$imglink,$subject);

}
