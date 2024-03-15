<?php
Define("DB_HOST","localhost");
Define("DB_USER","root");
Define("DB_NAME","phpproject");
Define("DB_PASS","");
function dbConnect()
{
    $db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(mysqli_connect_errno()>0){
           return "database connection fail";
    }else{
        return $db;
    }
}

function insertUser($name,$email,$password)
{
    $password=encodePass($password);
    $curTime=getTimeNow();
    $db=dbConnect();
    $qry="SELECT * FROM member WHERE email='$email'";
    $result=mysqli_query($db,$qry);
    if(mysqli_num_rows($result)>0){
        return "email is already in use";
    }else{
        $qry="INSERT INTO member(name,email,password,created_at,update_at)
        VALUES
         ('$name','$email','$password','$curTime','$curTime')";
       $result=mysqli_query($db,$qry);
       if($result==1){
        return "register success";
       }else{
        return "register fail";
       }
    }
}

function userLogin($email,$password)
{
    $password=encodePass($password);
    $db=dbConnect();
    $qry="SELECT name FROM member WHERE email='$email' AND password='$password'";
    $result=mysqli_query($db,$qry);
    if($result){
        $username="";
        foreach($result as $str){
            $username=$str["name"];
        }
        setSession("username",$username);
        setSession("email",$email);
        return "login success";
    }else{
        return "login fail";
    }
}

//  echo insertUser("Waiferkolar","waiferko@gmail.com","123123");
function encodePass($pass)
{
    $pass=md5($pass);
    $pass=sha1($pass);
    $pass=crypt($pass,$pass);
    return $pass;
}

function getTimeNow()
{
    return date("Y-m-d H:m:s",time());
}
?>