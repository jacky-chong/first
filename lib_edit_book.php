 <?php session_start(); ?>
 <script type="text/javascript">
 window.onload = function() {
    if (document.getElementById('file_check').checked) {
        document.getElementById('up_file').style.display = 'table-row';
        document.getElementById('up_zipfile').style.display = 'none';
   } 
    else if(document.getElementById('zipfile_check').checked) {
        document.getElementById('up_zipfile').style.display = 'table-row';
        document.getElementById('up_file').style.display = 'none';
   }
    else {
    	document.getElementById('up_file').style.display = 'none';
    	document.getElementById('up_zipfile').style.display = 'none';
    }
}
function radioCheck() {
    if (document.getElementById('file_check').checked) {
        document.getElementById('up_file').style.display = 'table-row';
        document.getElementById('up_zipfile').style.display = 'none';
   } 
    else if(document.getElementById('zipfile_check').checked) {
        document.getElementById('up_zipfile').style.display = 'table-row';
        document.getElementById('up_file').style.display = 'none';
   }
}
</script>
<style>
.form{
	border:1px solid #aaa;
	border-radius: 10px;
	width: 1000px;
	height: 1000px;
	display: block;
	margin-top: 50px;
	margin-bottom: 50px;
	margin-left: auto;
	margin-right: auto;	
	padding: 20px 20px;
	background-color: #ffccb3;
}

h1 {
	background-color: #ffccb3;
	font-family: "Montserrat", sans-serif;
	text-align: center;
}

div, label, input[type=file]  {
	background-color: #ffccb3;
}

.bg-color {
	background-color:white;
}


.box {
  padding: 12px 20px;
  margin: 8px 0;
  padding-top: 0px;
  padding-left: 0px;
}

.content {
	display: inline-table;
}

.content-border {
  border-right: 4px solid #990000;
  padding: 12px 20px;
  margin: 8px 0;
  padding-left: 0px;

}

.content-box {
  padding: 12px 20px;
  margin: 8px 0;
}

label {
	font-family: "Montserrat", sans-serif;
}

input[type=checkbox], input[type=radio]{
  cursor: pointer;
  font-size: 22px;
  color:#990033;

}

input[type=checkbox]:checked, input[type=radio]:checked{
	background-color: #990033;
}

input[type=submit], input[type=reset], input[type=file]{
	border-radius: 15px;
	background-color: #ff9966;
	border: none;
	padding: 15px 32px;
	color: white;
	font-family: "Montserrat", sans-serif;
    font-weight: 500;
    box-shadow: 2px 2px 5px grey;
    cursor: pointer;
}

input[type=submit]:hover, input[type=reset]:hover, input[type=file]:hover{
	border-radius: 15px;
	background-color: #ff7733;
}


input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  outline: none;
}

input[type=text]:focus, textarea:focus {
	border: 2px solid aqua;
	border-radius: 10px;
	transition: 0.3s;
}

input[type=file]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  overflow:inherit;
}

textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  rows: 5;
  outline:none;
}

/*vvvvvvvvvvvvvvvvvvvvvvvv*/
/*checkbox styling*/

.container {
	border: 3px solid #aaa;
	width: 400px;
	height: 220px;
	overflow-y: auto;
	background-color:White;
	border-radius: 10px;
}

.container:hover {
	border: 3px solid aqua;
}

/*^^^^^^^^^^^^^^^^^^^^^^^^*/

/*vvvvvvvvvvvvvvvvvvvvvvvv*/
/*radio styling*/

input[type=radio] + label {
  display: inline-block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

input[type=radio] {
  display: none;
}

input[type=radio] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 50%;
  display: inline-block;
  width: 1em;
  height: 1em;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}

input[type=radio] + label:active:before {
  transform: scale(0);
}

input[type=radio]:checked + label:before {
  background-color: DodgerBlue;
  border-color: DodgerBlue;
  color: #fff;
}

/*^^^^^^^^^^^^^^^^^^^^^^^^*/

.display{
	display:inline;
}

table, tr, td {
	background-color:#ffccb3;
}
</style>

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
  
		   //if not logged in, display "Login" hyperlink
		   if(!isset($_SESSION['user']))
		   { ?>
			
		   
			<a class="cta" href="login.html"><button class="button1">Log In</button></a>
		   <?php }
		   //if logged in, display "Logout" hyperlink
		   else
		   { ?>
		   
			<a class="cta" href="logout.php"><button class="button1">Logout</button></a>

		   <?php } ?>
	  </header>
</body>
      <div class="form">
        	<?php
        		include("conn.php");
        		$id = intval($_GET['id']); //Get the id from URL
        		$result = mysqli_query($con,"SELECT * FROM `reading_material` WHERE RmID = '$id'");
        		while($row = mysqli_fetch_array($result)){
        	?>
        	<h1>Edit Book</h1>
        	<form action="lib_update_book.php" method="post" enctype="multipart/form-data">
        		<div>
        			<div>
        				<label>ID:</label>
        				<input type="text" name="id" required="required" readonly="readonly" value="<?php echo $id; ?>">
        			</div>
        			<div>
        				<label>Book Name:</label>
        				<input type="text" name="bookname" required="required" value="<?php echo $row['Rm_name']; ?>">
        			</div>
        			<div>
        				<label>Author:</label>
        				<input type="text" name="author" required="required" value="<?php echo $row['Author']; ?>">
        			</div>
        			<div>
        				<label>Release Year:</label>
        				<input type="text" name="year" required="required" maxlength="4" value="<?php echo $row['Release_date']; ?>">
        			</div>
        			<div>
        				<label>Content:</label>
        				<textarea cols="50" name="content" required="required" rows="5" value="<?php echo $row['Content']; ?>"><?php echo $row['Content']; ?></textarea>
        			</div>
					<div>
						<table>
						<tr>
						<td>
		  				<div class="content content-border">
							<label>Genre:</label>
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
									echo '<div class="content bg-color"><input type="checkbox" name="genre[]" value="' . $arr['CategoryID'] . '" ' . $checked . '>' . $arr['Category_Name'] . '&nbsp;</div>';
					  			}
					  		?>
					  		</div>
					  	</div>
					  	</td>
					  	<td>
		  				<div class="content content-box">
		  					<div>
		  						<label>Photo(Change):</label>
          						<input type="file" name="photo" >
          					</div>
          					<div class="box">
        						<label>Type:</label>
        						<input type="radio" name="upload_type" value="1" required="required" onclick="javascript:radioCheck();" id="file_check" <?php if ($row['TypeId'] == "1"){ ?> checked="checked" <?php } ?> > 
        						<label for="file_check">PDF File</label>
        						<input type="radio" name="upload_type" value="2" required="required" onclick="javascript:radioCheck();" id="zipfile_check" <?php if ($row['TypeId'] == "2") { ?> checked="checked" <?php } ?> >
        						<label for="zipfile_check">Zipfile</label>
        					</div>
        					<div id="up_file">
        						<label>File Upload(Change):</label>
        						<input type="file" name="file" id="file" >
        					</div>
        					<div id="up_zipfile">
        						<label>Zip File Upload(Change)</label>
        						<input type="file" name="zip_file" id="zip_file">
        					</div>
        				</div>
        				</td>
        				</tr>
        				</table>
        			</div>
        			<div>
		  				<label>Book Information:</label>
						<textarea cols="50" name="info" required="required" rows="5" value="<?php echo $row['book_information']; ?>"><?php echo $row['book_information']; ?></textarea>
					</div>
		  			<div>
		  				<input name="upload" type="submit" value="Submit" class="mybutton" >&nbsp;&nbsp;&nbsp;<input name="Button2" type="reset" value="Reset" class="mybutton">
		  			</div>
        		</div>
        	</form>
        	<?php
        	}
        	mysqli_close($con);
        	?>
	</div>
</body>
