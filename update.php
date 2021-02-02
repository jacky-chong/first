<?php
include("conn.php");

$name = $_POST['Username'];
$pass = $_POST['new_Password'] ?? '';
$role = $_POST['Role'] ?? '';

//echo $name;
//echo $pass;
//echo $role;
if ($pass=="")
{
  echo "<script>alert('Please generate new password.');";
  echo "window.location.href='admin_edit-user.php';</script>";
}
elseif ($role=="admin")
{
  $sql="UPDATE `admin` SET `Password`='$pass',`status`='active' WHERE `Admin_Username`='$name'";
  $result = mysqli_query($con,$sql);
  echo "<script>alert('Successfully update a record.');";
  echo "window.location.href='admin_edit-user.php';</script>";

}
elseif ($role=="librarian")
{
  $sql="UPDATE `librarian` SET `Password`='$pass',`status`='active' WHERE `Lib_Username`='$name'";
  $result = mysqli_query($con,$sql);
  echo "<script>alert('Successfully update a record.');";
  echo "window.location.href='admin_edit-user.php';</script>";
}
elseif ($role=="student")
{
  $sql="UPDATE `student` SET `Password`='$pass',`status`='active' WHERE `Username`='$name'";
  $result = mysqli_query($con,$sql);
  echo "<script>alert('Successfully update a record.');";
  echo "window.location.href='admin_edit-user.php';</script>";
}


mysqli_close($con);
?>
