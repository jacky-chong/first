<?php
include("conn.php");

//intval - Get the integer value of a variable
$id = intval($_GET['id']);

//check if there are someone borrow or not
$check = mysqli_query($con,"select * from borrow where RmID = $id");
$checkrows = mysqli_num_rows($check);
if($checkrows > 0)
{
	echo "<script>alert('There is a user borrowing the book, delete is unable, please try again later!');</script>";
	die("<script>window.history.go(-1);</script>");
}
else if($checkrows == 0)
{
	$result1 = mysqli_query($con,"DELETE FROM book_gen WHERE RmID=$id");
	$result2 = mysqli_query($con,"DELETE FROM rating WHERE RmID=$id");
	$result3 = mysqli_query($con,"DELETE FROM record WHERE RmID=$id");
	$result4 = mysqli_query($con,"DELETE FROM reading_material WHERE RmID=$id");
}
//close database connection
mysqli_close($con);
header('Location: viewdata.php');
?>