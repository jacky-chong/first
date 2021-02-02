<?php
include("conn.php");

$x = $_POST['user'];
$admin = "@admin";
$libra = "@lib";
$student = "TP";

if(strpos($x, $admin) !== false){
  session_start();


$username=mysqli_real_escape_string($con,$_POST['user']);
$password=mysqli_real_escape_string($con,$_POST['pass']);

$sql="SELECT * FROM admin WHERE Admin_Username='$username' and Password='$password'";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)<=0)
{ 
  echo "<script>alert('Wrong username or password.');";
  die("window.history.go(-1);</script>");
}
if($row=mysqli_fetch_array($result))
{
  $_SESSION['user']=$row['Admin_Username'];
  $_SESSION['id']=$row['AdminID'];
   echo "<script>alert('Welcome back ".$_SESSION['user']."');window.location.href='admin_index.php';</script>";   
      
}

}


elseif(strpos($x, $libra) !==false){

    session_start();
    
    $username=mysqli_real_escape_string($con,$_POST['user']);
    $password=mysqli_real_escape_string($con,$_POST['pass']);
    
    $sql="SELECT * FROM librarian WHERE Lib_Username='$username' and Password='$password'";
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)<=0)
    { 
      echo "<script>alert('Wrong username or password.');";
      die("window.history.go(-1);</script>");
    }
    if($row=mysqli_fetch_array($result))
    {
      $_SESSION['user']=$row['Lib_Username'];
      $_SESSION['id']=$row['LibrarianID'];

      echo "<script>alert('Welcome back ".$_SESSION['user']."');window.location.href='librarian_index.php';</script>";  
          
    }
    }


    elseif(strpos($x, $student) !== False){
    
    session_start();
    
    $username=mysqli_real_escape_string($con,$_POST['user']);
    $password=mysqli_real_escape_string($con,$_POST['pass']);
    
    $sql="SELECT * FROM student WHERE Username='$username' and Password='$password'";
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)<=0)
    { 
      echo "<script>alert('Wrong username or password.');";
      die("window.history.go(-1);</script>");
    }
    if($row=mysqli_fetch_array($result))
    {
      $_SESSION['user']=$row['Username'];
      $_SESSION['id']=$row['StudentID'];
    
       echo "<script>alert('Welcome back ".$_SESSION['user']."');window.location.href='student_index.php';</script>";  
          
    }
    }

    else{
        echo "<script>alert('Wrong Username Format.');";
      die("window.history.go(-1);</script>");
    }




?>


