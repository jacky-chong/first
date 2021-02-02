<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="menu.css">
</head>
<body>
  <header>
	<img class="logo" src="image/books.svg" alt="logo" width= "50" height="50">
	<nav>
		<ul class="nav_links">
			<li><a href="librarian_index.php">Home</a></li>
			<li><a href="insert_test2.php">Add Book</a></li>
			<li><a href="viewdata.php">Edit / Delete Book</a></li>
			<li><a href="record.php">Report</a></li>
		</ul>
	</nav>
	<?php
  
  session_start();
		   //if not logged in, display "Login" hyperlink
		   if(!isset($_SESSION['user']))
		   { ?>
			
		   
			<a class="cta" href="login.html"><button class="button1">Log In</button></a>
		   </li>
		   <?php }
		   //if logged in, display "Logout" hyperlink
		   else
		   { ?>
		   
			<a class="cta" href="logout.php"><button class="button1">Logout</button></a>
		   </li>

		   <?php } ?>
	  </header>
 <script type="text/javascript">
 window.onload = function() {
    if (document.getElementById('file_check').checked) {
        document.getElementById('up_file').style.display = 'table-row';
        document.getElementById('space').style.display = 'table-row'
        document.getElementById('up_zipfile').style.display = 'none';
   } 
    else if(document.getElementById('zipfile_check').checked) {
        document.getElementById('up_zipfile').style.display = 'table-row';
        document.getElementById('space').style.display = 'table-row'
        document.getElementById('up_file').style.display = 'none';
   }
    else {
    	document.getElementById('up_file').style.display = 'none';
    	document.getElementById('up_zipfile').style.display = 'none';
    	document.getElementById('space').style.display = 'none';
    }
}
function radioCheck() {
    if (document.getElementById('file_check').checked) {
        document.getElementById('up_file').style.display = 'table-row';
        document.getElementById('space').style.display = 'table-row';
        document.getElementById('up_zipfile').style.display = 'none';
   } 
    else if(document.getElementById('zipfile_check').checked) {
        document.getElementById('up_zipfile').style.display = 'table-row';
        document.getElementById('space').style.display = 'table-row';
        document.getElementById('up_file').style.display = 'none';
   }
}
</script>
<style>
.container {
	border: 1px solid #aaa;
	width: 400px;
	height: 100px;
	overflow-y: auto;	
}

.content {
	display: inline-table;
}
</style>
      <div>
        	<?php
        		include("conn.php");
        		$id = intval($_GET['id']); //Get the id from URL
        		$result = mysqli_query($con,"SELECT * FROM `reading_material` WHERE RmID = '$id'");
        		while($row = mysqli_fetch_array($result)){
        	?>
        	<form action="update.php" method="post" enctype="multipart/form-data">
        		<table>
        			<tr>
        				<td>ID</td>
        				<td>:</td>
        				<td><input type="text" name="id" required="required" readonly="readonly" value="<?php echo $id; ?>"></td>
        			</tr>
        			<tr>
        				<td>Book Name</td>
        				<td>:</td>
        				<td><input type="text" name="bookname" required="required" value="<?php echo $row['Rm_name']; ?>"></td>
        			</tr>
        			<tr>
        				<td>Author</td>
        				<td>:</td>
        				<td><input type="text" name="author" required="required" value="<?php echo $row['Author']; ?>"></td>
        			</tr>
        			<tr>
        				<td>Release Year</td>
        				<td>:</td>
        				<td><input type="text" name="year" required="required" maxlength="4" value="<?php echo $row['Release_date']; ?>"></td>
        			</tr>
        			<tr>
        				<td>Content</td>
        				<td>:</td>
        				<td><textarea cols="50" name="content" required="required" rows="5" value="<?php echo $row['Content']; ?>"><?php echo $row['Content']; ?></textarea></td>
        			</tr>
					<tr>
						<td style="width: 227px">Genre</td>
        				<td>:</td>
					  	<td>
					  		<div class="container">
					  		<?php
					  			$checked_arr = array();
					  			
					  			//fetch checked value
   								$sql3 = "select * from book_gen where RmID = '$id';";
					  			$fetchvalue = mysqli_query($con,$sql3);
					  			while($result3 = mysqli_fetch_array($fetchvalue))
					  			{
					  				$checked_arr[] = $result3['CategoryID'];
					  			}
					  			
					  			//create checkboxes
					  			$sql2 = "select * from category;";
					  			$fetchvalue2 = mysqli_query($con,$sql2);
					  			$value_arr = array();
					  			while($result2 = mysqli_fetch_array($fetchvalue2))
					  			{
					  				$value_arr[] = $result2;
					  			}
					  			
								foreach($value_arr as $arr){
								
					  				$checked = "";
					  				if(in_array($arr['CategoryID'],$checked_arr))
					  				{
					  					$checked = "checked";
					  				}
					  				echo '<div class="content"><input type="checkbox" name="genre[]" value="' . $arr['CategoryID'] . '" ' . $checked . '>' . $arr['Category_Name'] . '&nbsp;</div>';

					  			}
					  		?>
					  		</div>
					  	</td>
					</tr>
					<tr>
					  <td>Photo upload(change)</td>
        				<td>:</td>
        			  <td><input type="file" name="photo" ></td>
        			</tr>
        			<tr>
        				<td>Type</td>
        				<td>:</td>
        				<td><input type="radio" name="upload_type" value="1" required="required" onclick="javascript:radioCheck();" id="file_check" <?php if ($row['TypeId'] == "1"){ ?> checked="checked" <?php } ?> > pdf
        					<input type="radio" name="upload_type" value="2" required="required" onclick="javascript:radioCheck();" id="zipfile_check" <?php if ($row['TypeId'] == "2") { ?> checked="checked" <?php } ?> > zip
        				</td>
        			</tr>
        			<tr id="space"><td style="width: 227px">&nbsp;</td></tr>
        			<tr id="up_file">
        				<td>File Upload(change)</td>
        				<td>:</td>
        				<td><input type="file" name="file" id="file" ></td>
        			</tr>
        			<tr id="up_zipfile">
        				<td>Zip File Upload(change)</td>
        				<td>:</td>
        				<td><input type="file" name="zip_file" id="zip_file"></td>
        			</tr>
					<tr>
					  <td style="width: 227px">Book Information</td>
        				<td>:</td>
					  <td><textarea cols="50" name="info" required="required" rows="5" value="<?php echo $row['book_information']; ?>"><?php echo $row['book_information']; ?></textarea></td>
					</tr>
        			<tr><td></td><td></td>
        			<td><input type="submit" value="Update"><input type="reset" value="Reset"></td>
        			</tr>
        		</table>
        		
        	</form>
        	<?php
        	}
        	mysqli_close($con);
        	?>
	</div>
