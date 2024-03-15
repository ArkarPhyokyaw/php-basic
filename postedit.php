<?php
 include_once"views/top.php";
 include_once"views/nav.php";
 include_once"views/header.php";
 include_once"sysgem/mySession.php";
 include_once"sysgem/postgenerator.php";
 if(isset($_GET["pid"]))
 {
    $pid=$_GET["pid"];
    $result=getsinglepost($pid);
    $posts=[];

    foreach($result as $item)
    {
        $posts["title"]=$item["title"];
        $posts["writer"]=$item["writer"];
        $posts["content"]=$item["content"];
        $posts["imglink"]=$item["imglink"];
    }
    $title= $posts["title"];
    $writer= $posts["writer"];
    $content=$posts["content"];
    $imglink= $posts["imglink"];
 }


 if(isset($_POST['submit']))
 {
      $file=$_FILES["file"];
      $imgname="";
      $img=$_POST['oldimg'];
      if($_FILES["file"]["name"]!=null)
       {
         $imgname=mt_rand(time(),time())."_".$_FILES["file"]["name"];
         move_uploaded_file($_FILES["file"]["tmp_name"],"assets/uploads/".$imgname);
         unlink("assets/uploads/".$img."");
      }else{
          $imgname=$_POST['oldimg'];
          }
      $title=$_POST["posttitle"];
      $writer=$_POST["postwriter"];
      $content=$_POST["postcontent"];
      $imglink=$imgname;
      $posttype=$_POST["posttype"];
      $subject=$_POST['subject'];
      $pid=$_GET["pid"];
       $pid;
    updatePost($title,$posttype,$subject,$writer,$content,$imglink,$pid);
}
?>

<div class='container my-3'>
    <div class='row'>

      <aside class="col-md-3">
        <ul class="list-group">
           <li class="list-group-item"><a href="admin.php"class="nav-link text-center">post insert</a></li>
           <li class="list-group-item"><a href="showallpost.php"class="nav-link text-center">show all post</a></li>
        </ul>
      </aside>

      <section class='col-md-7 '>
        <form class="border p-5 " method="post" action="postedit.php?pid=<?php echo $_GET["pid"];?>" enctype="multipart/form-data">
            <h3 style="text-align: center;">Post edit here</h3>
            <div class="mb-4">
               <label for="posttitle" class="form-label english">Post title</label>
               <input type="text" class="form-control" id="posttitle" name="posttitle" value="<?php echo $title?>">
            </div>

            <div class="mb-4 ">
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

            <div class="mb-4">
               <label for="postwriter" class="form-label english">postwriter</label>
               <input type="text" class="form-control" id="postwriter" name="postwriter" value="<?php echo $writer?>">
            </div>

            <div class="mb-4">
               <label class="custom-file" for="file">
                 <input type="file" id="file" name="file" class="custom-file-input" multiple>
                 <span class="custom-file-contorl"></span>
                 <input type="hidden" name="oldimg" value="<?php echo $imglink;?>">
               </label>
            </div>

            <div class="mb-3">
               <label for="postcontent" class="form-label">Example textarea</label>
               <textarea class="form-control" id="postcontent" name="postcontent"rows="3">
                   <?php echo $content ?>
               </textarea>
            </div>

            <div class="mb-3">
              <button class="btn btn-outline-primary">cancel</button>
              <button type="submit" name="submit" class="btn btn-outline-primary">post</button>
            </div>

            <div>
              <img src="assets/uploads/<?php echo $imglink;?>" alt="" class="img-fluid text-algin-center">
            </div>
        </form> 
      </section>
    </div>
</div>

<?php
include_once"views/footer.php";
include_once"views/base.php";
?>