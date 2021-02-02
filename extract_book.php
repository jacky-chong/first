<?php
 
include("conn.php");

error_reporting (E_ALL ^ E_NOTICE);

$bookname = $_POST['bookname'];
$book_description = $_POST['content'];
$author = $_POST['author'];
$date = $_POST['year'];
$up_type = $_POST['upload_type'];
$info = $_POST['info'];

//prevent same bookname
$check = mysqli_query($con,"select Rm_name from reading_material where Rm_name = '$bookname'");
$checkrows = mysqli_num_rows($check);
if($checkrows > 0)
{
echo "<script>alert('The book name is already existed!');</script>";
die("<script>window.history.go(-1);</script>");
}

//prevent no check checkbox
if(isset($_POST['genre']))
{}
else
{
	echo "<script>alert('Please select a genre!');</script>";
	die("<script>window.history.go(-1);</script>");
}

//check if it is photo photo
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$check = mysqli_query($con,"select Photo_path from reading_material where Photo_path = '$target_file'");
$checkrows = mysqli_num_rows($check);
if($checkrows > 0)
{
echo "<script>alert('The photo name is already existed!');</script>";
die("<script>window.history.go(-1);</script>");
}

$check = getimagesize($_FILES["photo"]["tmp_name"]);
if($check !== false)
{
	
	$up_type = $_POST['upload_type'];
	$file_location = $target_dir . basename($_FILES["file"]["name"]);
	$file_type = pathinfo($target_file,PATHINFO_EXTENSION);

	if($up_type == "pdf")
	{
	
	//check if the database have same file name
	$check = mysqli_query($con,"select File_path from reading_material where File_path = '$file_location'");
	$checkrows = mysqli_num_rows($check);
	if($checkrows > 0)
	{
	echo "<script>alert('The file name is already existed!');</script>";
	die("<script>window.history.go(-1);</script>");
	}

	if($_FILES['file']["type"] == "application/pdf")	//check if it is pdf file
	{
		//upload photo
		if (! move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file))
		{
			echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
			die("<script>window.history.go(-1);</script>");
		} 
		else 
		{
			echo "<script>alert('The file ". basename( $_FILES["photo"]["name"])." has been uploaded.');</script>";
		}
		//upload file
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_location)) 
		{
			echo "<script>alert('The file ". basename( $_FILES["file"]["name"])." has been uploaded.');</script>";
			$sql="insert into `reading_material`(`Rm_name`, `Author`, `Photo_path`, `Content`, `Release_date`, `File_path`, `TypeId`, `book_information`) VALUES ('$bookname', '$author', '$target_file', '$book_description', '$date', '$file_location', 1, '$info')";
	
		} 
		else 
		{
	   		echo "<script>alert('Unable to upload file.Thus, data will not be inserted to database. Please try again!');</script>";
			die("<script>window.history.go(-1);</script>");
		}
	}
	else
	{
		echo "<script>alert('Only pdf file is allowed!');</script>";
		die("<script>window.history.go(-1);</script>");
	}	
	} 
	
	//zipfile
	elseif($up_type == "zipfile")
	{
	if($_FILES['zip_file']["type"] == "application/x-zip-compressed") //check if it is zipfile
	{
		if(isset($_POST["upload"]))  
	 	{  
	      $output = '';  
	      if($_FILES['zip_file']['name'] != '')  
	      {  
	           $file_name = $_FILES['zip_file']['name'];  
	           $array = explode(".", $file_name);  
	           $name = $array[0];
	           $ext = $array[1];
	           $tar_location = 'uploads/' . $name . '/mobile/index.html';
	           
			   //check if the database have same file name
			   $check = mysqli_query($con,"select File_path from reading_material where File_path = '$tar_location'");
			   $checkrows = mysqli_num_rows($check);
			   if($checkrows > 0)
			   {
			   echo "<script>alert('The file name is already existed!');</script>";
			   die("<script>window.history.go(-1);</script>");
			   }
				
	           if($ext == 'zip')  
	           {  
	                $path = 'uploads/';  
	                $location = $path . $file_name;
	                
	                $zip = new ZipArchive;
	                
	                $source = $_FILES['zip_file']['tmp_name'];
	                //check the zip file name is same with path name
	                if($zip->open($source))
	                {
						$stat = $zip->statIndex(0);
    					//print_r( basename( $stat['name'] ) . PHP_EOL ); 
    					$zipname = basename( $stat['name'] ) . '.zip';
						if ($zipname != $file_name)
						{
							echo "<script>alert('The file name does not exist, please make sure the uploaded file name is same as the core folder name!');</script>";
							die("<script>window.history.go(-1);</script>");
						}
					}

	                //upload photo
                	if (! move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file))
					{
						echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
						die("<script>window.history.go(-1);</script>");
					} 
					else 
					{
						echo "<script>alert('The file ". basename( $_FILES["photo"]["name"])." has been uploaded.');</script>";
					}
					
					//upload zipfile
	                if(move_uploaded_file($_FILES['zip_file']['tmp_name'], $location))  
	                {  
	                     if($zip->open($location))  
	                     {
	                        $zip->extractTo($path);  
	                        $zip->close();  
	                     }
	                     
	                     if(is_dir($path . $name))
	                     {
	                     	$files = scandir($path . $name); 
	                     	//$name is extract folder from zip file
	                     }
	                       
	                     unlink($location);  
	                     //rmdir($path . $name); 
	                     
						 echo "<script>alert('The file ". basename( $_FILES["zip_file"]["name"])." has been uploaded.');</script>";
	                	 $sql="insert into `reading_material`(`Rm_name`, `Author`, `Photo_path`, `Content`, `Release_date`, `File_path`, `TypeId`, `book_information`) VALUES ('$bookname', '$author', '$target_file', '$book_description', '$date', '$tar_location', 2, '$info')";
	                }
	                else
	                {
	   					 echo "<script>alert('Unable to upload file.Thus, data will not be inserted to database. Please try again!');</script>";
						 die("<script>window.history.go(-1);</script>");
	                }

	           }  
	      }
	    }   
	}
	else
	{
		echo "<script>alert('Only zip file is allowed!');</script>";
		die("<script>window.history.go(-1);</script>");
	}
	}
	elseif ($up_type == "")
	{
		echo "<script>alert('Please select a file to upload!');</script>";
		die("<script>window.history.go(-1);</script>");
	}

}
else
{
echo "<script>alert('File is not an image.Please try again!');</script>";
die("<script>window.history.go(-1);</script>");
}


if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
}

//insert genre info seperately

$sql = "SELECT RmID from reading_material where `Rm_name` = '$bookname'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$rmid = $row[0];

$checked_arr = $_POST['genre'];

foreach ($checked_arr as $genre_arr)
{
	$sql = "insert into `book_gen`(`RmID`,`CategoryID`) values ('$rmid','$genre_arr')";
	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}

}

echo "<script>window.location.replace('insert_test2.php');</script>";

mysqli_close($con);

?>
 

 