<?php include_once"sysgem/mySession.php"?>
<?php include_once"views/top.php"?>
<?php include_once"views/nav.php"?>
<?php include_once"sysgem/postgenerator.php"?>

<div class="container-fluid mt-5">
  <div class="row">

      <aside class="col-md-3 ">
        <ul class="list-group">
          <li class="list-group-item"><a href="admin.php" class="nav-link text-center">post insert</a></li>          
          <li class="list-group-item"><a href="showallpost.php"class="nav-link text-center">show all post</a></li>
       </ul>
      </aside>

      <div class="col-md-9 row">
          <?php
                 $result="";
                 if(checkSession("username")){
                 $result=getfilterPost($_GET['sid'],2);
                 }else{
                       $result=getfilterPost($_GET['sid'],1);
                      }
                 foreach($result as $post)
                 {
                   $pid=$post["id"];
                   echo'
                   <div class="col-md-4 mb-4">
                     <div class="card">
                       <div class="card-block text-center p-4" >
                           <h3>'.substr($post["title"],0,30).'</h3>
                           <p>
                               '.substr($post["content"],0,100).'
                           </p>
                           <a href="detail.php?pid='.$pid.'" class="btn btn-info btn-sm " style="float:right;">detail</a>
                       </div>
                     </div>
                  </div>
                   ';
                  }
          ?>
       </div>
  </div>
</div>



    <?php include_once"views/footer.php"?>
    <?php include_once"views/base.php"?>