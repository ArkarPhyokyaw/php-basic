<?php
 include_once"views/top.php";
 include_once"views/nav.php";
 include_once"views/header.php";
 include_once"sysgem/mySession.php";
 include_once"sysgem/postgenerator.php";
 if(checkSession("username")!="arkarp"){
    header("location:index.php");
 }

?>
<?php
if(isset($_POST('submit'))){
           deletePost($deletepost);
          }
?>