<?php
include_once"views/top.php";
include_once"views/nav.php";
require_once"sysgem/membercheck.php";
// require_once"sysgem/dbHacker.php";
include_once"sysgem/mySession.php";
require_once"sysgem/mySession.php";
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $ret= registerUser($username,$email,$password);
    $message="";
    switch($ret){
        case "register success":
              $message="register success";
              setSession("username",$username);
              setSession("email",$email);
              setSession("password",$password);
              if($username==="arkarp" && $email==="ak6113198@gmail.com"){
                header("location:admin.php");
              }else{
                header("location:index.php");
              }
              break;
        case "email is already in use":$message="email is already in use";break;
        case "register fail":$message="register fail";break;
        case "Fail":$message="false you input ";break;
        default:
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
        <h1 class="text-danger text-center" >Rgister to be a member</h1>
        <form action="register.php" class="form-control" method="post">
            <div class="form-group">
                <label for="username">yourname</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <p></p>
            
             <button class="btn btn-info" type="submit"name="submit" value="submit">login</button>
        </form>
    </div>
</div>

<?php
include_once"views/footer.php";
include_once"views/base.php";
?>