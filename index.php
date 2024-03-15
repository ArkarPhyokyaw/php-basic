    <?php include_once"sysgem/mySession.php"?>
    <?php include_once"views/top.php"?>
    <?php include_once"views/nav.php"?>
    <?php include_once"views/header.php"?>
    <?php include_once"sysgem/postgenerator.php"?>
    <?php
    $start=0;
      $rows=getpostcount();
      if (isset($_GET['start'])){
        $start=$_GET['start'];
      }
    ?>
   
<div class="container">
  <div class="row">

      <aside class="col-md-3 ">
        <ul class="list-group">
           <li class="list-group-item"><a href="admin.php"class="nav-link text-center">post insert</a></li>
           <li class="list-group-item"><a href="showallpost.php"class="nav-link text-center">show all post</a></li>
        </ul>
      </aside>

      <div class="col-md-9 row">
      <?php
      $start=0;
      $rows=getpostcount();
      if (isset($_GET['start']))
      {
        $start=$_GET['start'];
      }
        $result="";
          if(checkSession("username")){
             $result=getPost(2,$start);
          }else{
             $result=getPost(1,$start);
          }
          foreach($result as $post){
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
<div class="container">
  <div class="col-md-4 offset-md-4">
    <nav aria-label="Page navigation example">
       <ul class="pagination">
        <?php
        $t=0;
        for ($i=0; $i<getpostcount();$i+=10){
          $t++;
          echo '<li class="page-item"><a class="page-link" href="index.php?start='.$i.'">'.$t.'</a></li>';        }
        ?>
  </ul>
</nav>
  </div>
</div>
    <?php include_once"views/footer.php"?>
    <?php include_once"views/base.php"?>