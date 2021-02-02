<?php
include("conn.php");


$role = $_POST['user_role'];

if ($role == 'blank')
{
	echo "<script>alert('Please select user role.');";
	echo "window.location.href='admin_add-user_html.php';</script>";
}
elseif ($role == 'Admin')
	{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username_admin= $username."@admin";
	$get_user="SELECT * from  `admin` where `Admin_Username` = '$username_admin';";

	$result = mysqli_query($con,$get_user);


	//get the number of rows fetched
	$row = mysqli_fetch_array($result);
	if ($row >=1)
		{
			echo "<script>alert('Admin username existed.');";
			echo "window.location.href='admin_add-user_html.php';</script>";
		}
		else
			{
			$sql="INSERT INTO `admin`(`Admin_Username`, `Password`) VALUES ('$username_admin','$password')";
			echo "<script>alert('Successfully added a admin record.');";
			echo "window.location.href='admin_add-user_html.php';</script>";
			}
	}
elseif ($role == 'Librarian')
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username_lib= $username."@lib";
	$get_user="SELECT * from  `librarian` where `Lib_Username` = '$username_lib';";

	$result = mysqli_query($con,$get_user);


	//get the number of rows fetched
	$row = mysqli_fetch_array($result);
	if ($row >=1)
		{
			echo "<script>alert('Librarian username existed.');";
			echo "window.location.href='admin_add-user_html.php';</script>";
		}
		else
			{
			$sql="INSERT INTO `librarian`(`Lib_Username`, `Password`) VALUES ('$username_lib','$password')";
			echo "<script>alert('Successfully added a librarian record.');";
			echo "window.location.href='admin_add-user_html.php';</script>";
			}

	}
elseif ($role == 'Student')
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username_stu= "TP".$username;
	$get_user="SELECT * from  `student` where `Username` = '$username_stu';";

	$result = mysqli_query($con,$get_user);


	//get the number of rows fetched
	$row = mysqli_fetch_array($result);
	if ($row >=1)
		{
			echo "<script>alert('Student username existed.');";
			echo "window.location.href='admin_add-user_html.php';</script>";
		}
		else
			{
			$sql="INSERT INTO `student`(`Username`, `Password`) VALUES ('$username_stu','$password')";
			echo "<script>alert('Successfully added a studnet record.');";
			echo "window.location.href='admin_add-user_html.php';</script>";
			}

	}

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}
mysqli_close($con);
