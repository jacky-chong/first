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
              <li><a href="insert_test.php">Add Book</a></li>
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
    	document.getElementById('space').style.display = 'none'
    }
}
function radioCheck() {
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
}

$(function() {
            $( "#date" ).datepicker({dateFormat: 'yyyy'});
         });

</script>

 
 <div class="container">

      		  
      <form action="extract_book.php" method="post" enctype="multipart/form-data">
      
      <table style="width: 100%">

        <tr>
	      <td style="width: 227px">Book Name:</td>
	      <td><input name="bookname" type="text" required="required"></td>
		</tr>
			<tr><td style="width: 227px">&nbsp;</td></tr>
	    <tr>
		  <td style="width: 227px">Author:</td>
		  <td><input name="author" type="text" required="required"></td>
		</tr>
			<tr><td style="width: 227px">&nbsp;</td></tr>
		<tr>
		  <td style="width: 227px">Content:</td>
		  <td><textarea cols="50" name="content" required="required" rows="5"></textarea></td>
		</tr>
			<tr><td style="width: 227px">&nbsp;</td></tr>
	    <tr>
		  <td style="width: 227px">Release Year:</td>
		  <td><input name="year" type="text" maxlength="4" id="date" required="required"></td>
		</tr>
			<tr><td style="width: 227px">&nbsp;</td></tr>
		<tr>
			<td style="width: 227px">Genre:</td>
		  	<td>
		  		<?php
		  			include("conn.php");
		  			
		  			$sql = "select * from category;";
		  			
		  			$result = mysqli_query($con,$sql);
		  			
		  			while($row = mysqli_fetch_array($result))
		  			{
 						echo '<input type="checkbox" name="genre[]" value="' . $row['CategoryID'] . '">' . $row['Category_Name'] . '&nbsp;';
   					}
 					mysqli_close($con);
		  		?>
		  	</td>
		</tr>
			<tr><td style="width: 227px">&nbsp;</td></tr>
		<tr>
		  <td>Photo upload:</td>
          <td><input type="file" name="photo" ></td>
        </tr>
        	<tr><td style="width: 227px">&nbsp;</td></tr>
        <tr>
        	<td>File Upload Type:</td>
        	<td><input type="radio" name="upload_type" value="pdf" onclick="javascript:radioCheck();" id="file_check">PDF File<input type="radio" name="upload_type" value="zipfile" onclick="javascript:radioCheck();" id="zipfile_check">Zipfile</td>
        </tr>
        	<tr id="space"><td style="width: 227px">&nbsp;</td></tr>
        <tr id="up_file">
        	<td>File Upload:</td>
        	<td><input type="file" name="file" id="file" ></td>
        </tr>
        <tr id="up_zipfile">
        	<td>Zip File Upload:</td>
        	<td><input type="file" name="zip_file" id="zip_file"></td>
        </tr>
        	<tr><td style="width: 227px">&nbsp;</td></tr>
		<tr>
		  <td style="width: 227px">Book Information:</td>
		  <td><textarea cols="50" name="info" required="required" rows="5"></textarea></td>
		</tr>
			<tr><td style="width: 227px">&nbsp;</td></tr>
        <tr>
		  <td style="width: 227px">&nbsp;</td>
		  <td><input name="upload" type="submit" value="submit" class="mybutton" >&nbsp;&nbsp;&nbsp;<input name="Button2" type="reset" value="Reset" class="mybutton"></td>
		</tr>
		  </table>
		  </form>
	 </div>
