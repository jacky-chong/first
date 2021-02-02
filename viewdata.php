 <?php session_start(); ?>

<style>

div {
	width: auto;
	height:auto;
	margin: 50px;
}

#table{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#table tr:nth-child(even){
	background-color: #f2f2f2;
}

#table tr:hover {
	background-color: #ddd;
}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f96353;
  color: white;
}

.button {
	padding: 0.5rem 20px;
}

.edit {
	background-color:DeepSkyBlue;
}

.delete {
	background:Crimson;
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
		<div>
          <table id="table">
			<tr>
			  <th>ID</th>
			  <th>Name</th>
			  <th>Picture</th>
			  <th>Author</th>
			  <th>Release Year</th>
			  <th>Content</th>
			  <th>Type</th>
			  <th>Edit</th>
			  <th>Delete</th>
			</tr>
			<?php
			  include("conn.php");
			  $result = mysqli_query($con,"SELECT * FROM reading_material join type on reading_material.TypeId = type.Type_ID order by RmID ASC");
			  //get the number of rows fetched
			  while($row = mysqli_fetch_array($result))
			  {
			    echo "<tr>";
			    echo "<td>";
			    echo $row['RmID'];
			    echo "</td>";
			    echo "<td>";
			    echo $row['Rm_name'];
			    echo "</td>";
			    echo "<td>";
			    echo "<img src='" . $row['Photo_path'] . "' width='200px' height='200px'>";
			    echo "</td>";
			    echo "<td>";
			    echo $row['Author'];
			    echo "</td>";
			    echo "<td>";
			    echo $row['Release_date'];
			    echo "</td>";
			    echo "<td>";
			    echo $row['Content'];
			    echo "</td>";
			    echo "<td>";
			    echo $row['Type_Name'];
			    echo "</td>";
			    echo "<td><a href=\"lib_edit_book.php?id=";
			    echo $row['RmID'];
			    echo "\"><button class='button edit'>Edit</button></a></td>";
			    echo "<td><a href=\"delete.php?id=";
			    echo $row['RmID'];
			    echo "\" onClick=\"return confirm('Delete ";
			    echo $row['Rm_name'];
			    echo " details?');\"><button class='button delete'>Delete</button></a></td></tr>";
			  }
			  mysqli_close($con); //to close the database connection
			?>
		  </table>
      </div>
