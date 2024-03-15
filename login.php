<?php
include_once"views/top.php";
include_once"views/nav.php";
include_once"sysgem/membercheck.php";
if(isset($_POST["submit"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    $ret=loginUser($email,$password);
    $message="";
    switch($ret){
        case"login success":
            $message="login success";
            if(getSession("username")==="arkarp" && getSession("email")==="ak6113198@gmail.com"){
                header("location:admin.php");
              }else{
                header("location:index.php");
              }
            break;
        case"login fail":
            $message="login fail";
            break;
        case"auth Fail":
            $message="user name in password no in format";
            break;
    }
    echo "
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
       ". $message ."
       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    ";
}
?>
<div class="container my-3 ">
    <div class="col-md-8 offset-md-2">
        <h1 class="text-danger text-center" >Login to see special post</h1>
        <form action="login.php" class="form-control mb-5" method="post">

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="text" class="form-control mb-3" name="password" id="password">
            </div>
            <!-- <p></p> -->
            
             <button class="btn btn-info" type="submit" name="submit" value="submit">login</button>
        </form>
    </div>
</div>
<?php
include_once"views/footer.php";
include_once"views/base.php";
?>