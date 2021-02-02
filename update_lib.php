<?php
include("conn.php");


 $sql = "UPDATE librarian SET Password='$_POST[password]', status='' where LibrarianID=$_POST[id];";

if (mysqli_query($con, $sql))
{
mysqli_close($con);

echo "<script>alert('Your password had been successfully change !'); window.location.href='librarian_index.php';</script>";

}

?>