<?php include_once"sysgem/mySession.php"?>
<?php include_once"views/top.php"?>
<?php include_once"views/nav.php"?>
<?php include_once"views/header.php"?>
<?php include_once"sysgem/postgenerator.php"?>
<?php
if(isset($_GET['pid'])){
    $pid=$_GET["pid"];
}
?>
<div class="container my3">
  <div class="card col-md-8 offset-md-2">
      <div class="card-header">
         <?php
          $result =getsinglepost($pid);
          foreach($result as $data){
            echo' <div class="card-header d-flex justify-content-between border-0"><h2>'
                        .$data["title"].'</h2><span class="card-header ml-4 border-0">'
                        .$data["created_at"].'</span></div>';
            echo'<div class="text-center"><img src="assets/uploads/'.$data["imglink"].'" alt="" class="img-fluid p-2"></div> ';
            echo' <div class="card-block text-center">'.$data["content"]. ' </div>';
            echo '<div class="card-footer justify-content-rig">pageWriter"=>"'.$data["writer"].'</div>';
          }
         ?>
  </div>
</div>

    <?php include_once"views/footer.php"?>
    <?php include_once"views/base.php"?>