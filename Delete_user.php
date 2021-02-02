<?php
include("conn.php");

$role = $_POST['role'] ?? '';
//echo $role;

if(isset($_POST['no']))
{

  if ($role=="admin")
  {
    for($i=0;$i<count($_POST['no']);$i++)
    {
      $row_no=$_POST['no'][$i];
      //echo $row_no;
      $result = mysqli_query($con,"DELETE from `admin` where `AdminID`='$row_no'");
    }
    echo "<script>alert('Successfully delete record.');";
    echo "window.location.href='admin_delete-admin.php';</script>";
  }
  elseif ($role=="librarian")
  {
    for($i=0;$i<count($_POST['no']);$i++)
    {
      $row_no=$_POST['no'][$i];
      //echo $row_no;
      $result = mysqli_query($con,"DELETE from `librarian` where `LibrarianID`='$row_no'");
    }
    echo "<script>alert('Successfully delete record.');";
    echo "window.location.href='admin_delete-librarian.php';</script>";
  }
  else
  {
    for($i=0;$i<count($_POST['no']);$i++)
    {
      $row_no=$_POST['no'][$i];
      //echo $row_no;
      $result = mysqli_query($con,"DELETE from `student` where `StudentID`='$row_no'");
    }
    echo "<script>alert('Successfully delete record.');";
    echo "window.location.href='admin_delete-student.php';</script>";
  }
}
else
{
  echo "<script>alert('No user selected.');";
  die ("window.history.go(-1);</script>");
}


mysqli_close($con);
?>
