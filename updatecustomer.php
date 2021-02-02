<?php
include("conn.php");


 $sql = "UPDATE student SET Password='$_POST[password]' where StudentID=$_POST[id];";

if (mysqli_query($con, $sql))
{
mysqli_close($con);

echo "<script>alert('Your password had been successfully change !'); window.location.href='student_index.php';</script>";

}

?>