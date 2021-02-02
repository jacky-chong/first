<?php
include("conn.php");


 $sql = "UPDATE admin SET Password='$_POST[password]',`status`='' where AdminID=$_POST[id];";

if (mysqli_query($con, $sql))
{
mysqli_close($con);

echo "<script>alert('Your password had been successfully change !'); window.location.href='admin_index.php';</script>";

}

?>
