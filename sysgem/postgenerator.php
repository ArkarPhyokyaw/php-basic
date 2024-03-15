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


function getTimeNow()
{
    return date("Y-m-d H:m:s",time());
}


function insertPost($title,$type,$writer,$content,$imglink,$subject)
{
    $created_at=getTimeNow();
    $db=dbConnect();
    $qry="INSERT INTO post (title,type,subject,writer,content,imglink,created_at)
          VALUES
        ('$title',$type,$subject,'$writer','$content','$imglink','$created_at')
        ";
    $result=mysqli_query($db,$qry);
    return $result;
}


function getPost($type,$start)
{
    $db = dbConnect();
    $qry = ""; //this style compose
    if($type == 1){
        $qry = "SELECT * FROM post WHERE type = $type LIMIT $start,10";
    } else {
        $qry = "SELECT * FROM post LIMIT $start,10";
    }
    $result = mysqli_query($db, $qry);
    return $result;
}


function getallpost($type)//no use function for edit get all post all one page
{
    $db = dbConnect();
    $qry = ""; //this style compose
    if($type == 1){
        $qry = "SELECT * FROM post WHERE type = $type";
    } else {
        $qry = "SELECT * FROM post";
    }
    $result = mysqli_query($db, $qry);
    return $result;
}


function getsinglepost($pid)
{
    $db=dbConnect();
    $qry="SELECT * FROM post WHERE id=$pid";
    $result=mysqli_query($db,$qry);
    return $result;
}


function updatePost($title,$type,$subject,$writer,$content,$imglink,$id)
{
    $db=dbConnect();
    $qry="UPDATE post SET title='$title',type=$type,subject=$subject,writer='$writer',content='$content',imglink='$imglink' 
          WHERE id='$id'";

    $result=mysqli_query($db,$qry);
    if($result)
    {
        header("location:showallpost.php");
    }else
    {
        echo "<script>alert('post update fail')</script>";
    }
}


function getfilterPost($subject,$type)
{
    $db=dbConnect();
    $qry="SELECT * FROM post WHERE subject=$subject AND type=$type";
    $result=mysqli_query($db,$qry);
    return $result;
}


function getallsubject()
{
    $db=dbConnect();
    $qry="SELECT * FROM s";
    $result=mysqli_query($db,$qry);
    return $result;
}


function getpostcount()
{
    $db=dbConnect();
    $qry="SELECT *  FROM post";
    $result=mysqli_query($db,$qry);
    return mysqli_num_rows($result);
}

function deletePost($some)
{
    $db=dbConnect();
    $qry="DELETE  FROM post WHERE id=$some";
    $result=mysqli_query($db,$qry);
    return $result;
}
?>