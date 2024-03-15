<?php
 include_once"views/top.php";
 include_once"views/nav.php";
 include_once"views/header.php";
 include_once"sysgem/mySession.php";
 include_once"sysgem/postgenerator.php";
 
 if(checkSession("username")!="arkarphyokyaw")
 {
    header("location:index.php");
 }
if(isset($_POST['submit']))
{
  $posttitle=$_POST['posttitle'];
  $posttype=$_POST['posttype'];
  $postwriter=$_POST['postwriter'];
  $postcontent=$_POST['postcontent'];
  $subject=$_POST['subject'];
  $file=$_FILES["file"];
  $imglink=mt_rand(time(),time())."_".$_FILES["file"]["name"].mt_rand(time(),time());
  move_uploaded_file($_FILES["file"]["tmp_name"],"assets/uploads/".$imglink);
  $bol=insertPost($posttitle,$posttype,$postwriter,$postcontent,$imglink,$subject);
  if($bol){
   echo "
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
          PostSuccess 
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  }else{
   echo "
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
           Postinsert fail
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  }
}
?>

<div class='container'>
    <div class='row'>

      <aside class="col-md-3 ">
        <ul class="list-group">
           <li class="list-group-item"><a href="admin.php"class="nav-link text-center">post insert</a></li>
           <li class="list-group-item"><a href="showallpost.php"class="nav-link text-center">show all post</a></li>
        </ul>
      </aside>

      <section class='col-md-9 '>
        <form class="border p-5" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
            <h3 style="text-align: center;">post insert form</h3>

            <div class="form-group mb-4">
               <label for="posttitle" class="form-label english">Post title</label>
               <input type="text" class="form-control" id="posttitle" name="posttitle">
            </div>

            <div class="form-group mb-4 ">
               <label for="posttype" class="form-label english">Post type</label>
               <select  id="posttype" name="posttype" class="form-control mb-3">
                  <option value="1">free post</option>
                  <option value="2">pay post</option>
               </select>
            </div>

            <div class="form-group mb-4">
               <label for="subject" class="form-label english">Subject</label>
               <select id="subject" name="subject" class="form-control">
                   <?php
                       $subjects = getallsubject();
                       foreach ($subjects as $subject)
                       {
                        echo "<option value=" . $subject['id'] . ">" . $subject['name'] . "</option>";
                       }
                     ?>
               </select>
            </div>

            <div class="form-group mb-4">
               <label for="postwriter" class="form-label english">postwriter</label>
               <input type="text" class="form-control" id="postwriter" name="postwriter">
            </div>

            <div class="form-group mb-4">
               <label class="custom-file" for="file">
                 <input type="file" id="file" name="file" class="custom-file-input" multiple>
                 <span class="custom-file-contorl"></span>
               </label>
            </div>

            <div class="form-group mb-3">
               <label for="postcontent" class="form-label">Example textarea</label>
               <textarea class="form-control" id="postcontent" name="postcontent"rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
              <button class="btn btn-outline-primary">cancel</button>
              <button type="submit" name="submit" class="btn btn-outline-primary">post</button>
            </div>

        </form> 
      </section>
    </div>
</div>
<?php
include_once"views/footer.php";
include_once"views/base.php";
?>