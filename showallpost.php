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
<div class='container '>
    <div class='row'>

      <aside class="col-md-3  ">
        <ul class="list-group">
           <li class="list-group-item"><a href="admin.php" class="nav-link text-center">Insert</a></li>
           <li class="list-group-item"><a href="showallpost.php" class="nav-link text-center">Show all post</a></li>
        </ul>
      </aside>

      <section class='col-md-9 float-right'>
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
               if(isset($_GET["pid"])){
                  $deleted=$_GET["pid"];
                  deletePost($deleted);
                  header("Location: {$_SERVER['PHP_SELF']}");
                  reset();
               }
               
              
            foreach($result as $post)
               {
                echo'<div class="card p-3 mb-5">
                        <div class="card-block">
                           <h5>'.$post["title"].'</h5>
                           <p > '. substr($post["content"],0,100).'</p>
                           <a href="postedit.php?pid='.$post["id"].'" class="btn btn-danger btn-info ">edit</a>
                           <a href="' . $_SERVER['PHP_SELF'] . '?pid=' . $post["id"] . '" class="btn btn-danger btn-info">deleted</a>
                        </div>
                     </div>';
              }
           ?>
           
      </section>

    </div>
</div>

<div class="container">
  <div class="col-md-4 offset-md-4">
    <nav aria-label="Page navigation example">
       <ul class="pagination">
          <?php
            $t=0;
             for ($i=0; $i<$rows=getpostcount();$i+=10)
             {
              $t++;
              echo '<li class="page-item"><a class="page-link" href="showallpost.php?start='.$i.'">'.$t.'</a></li>';
             }
          ?>
       </ul>
    </nav>
  </div>
</div>

<?php
include_once"views/footer.php";
include_once"views/base.php";
?>