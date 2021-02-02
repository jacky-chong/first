 <?php session_start(); ?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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


<script type="text/javascript">
function btnStudentS() {
    	document.getElementById("container-S").style.display = 'block';
    	document.getElementById("BookoftheMonth").style.display = 'none';
    	document.getElementById("container-D").style.display = 'none';
}
function btnStudentD() {
    	document.getElementById("container-D").style.display = 'block';
    	document.getElementById("BookoftheMonth").style.display = 'none';
    	document.getElementById("container-S").style.display = 'none';
}

function btnBook() {
    	document.getElementById("container-S").style.display = 'none';
    	document.getElementById("BookoftheMonth").style.display = 'block';
    	document.getElementById("container-D").style.display = 'none';
}
function printDivSS() {
         window.frames["print_frame_s-s"].document.body.innerHTML = document.getElementById("Student_Stat-S").innerHTML;
         window.frames["print_frame_s-s"].window.focus();
         window.frames["print_frame_s-s"].window.print();
       }
function printDivSD() {
         window.frames["print_frame_s-d"].document.body.innerHTML = document.getElementById("Student_Stat-D").innerHTML;
         window.frames["print_frame_s-d"].window.focus();
         window.frames["print_frame_s-d"].window.print();
       }      
function printDivB() {
         window.frames["print_frame_b"].document.body.innerHTML = document.getElementById("BookoftheMonth").innerHTML;
         window.frames["print_frame_b"].window.focus();
         window.frames["print_frame_b"].window.print();
       }
</script>

<style>

.container{
	margin:20px 120px;
	width:auto;
}

.nav-container{
	margin:50px;
	width:auto;
}

.search{
	float:left;
	width:250px;
}

input[type=text] {
  width: 200px;
  padding: 12px 0px;
  box-sizing: border-box;
  outline: none;
  overflow:hidden;
  font-family: "Montserrat", sans-serif;
}

select {
  padding: 12px 0px;
  box-sizing: border-box;
  outline: none;
  background-color:LightCyan;
  font-family: "Montserrat", sans-serif;
}

input[type=text]:focus, select:focus {
	border: 2px solid aqua;
	border-radius: 10px;
	transition: 0.3s;
}

input[type=text]:focus{
	width:500px;
}

.submit{
	border-radius: 15px;
	background-color: #ff9966;
	border: none;
	padding: 12px 20px;
	color: white;
	font-family: "Montserrat", sans-serif;
    font-weight: 500;
    box-shadow: 2px 2px 5px grey;
    cursor: pointer;
    margin: 0px 10px;
}

.submit:hover{
	border-radius: 15px;
	background-color: #ff7733;
}

.search-container {
	display:inline-block;
	float:right;
	margin-bottom: 10px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

.nav-btn{
	border-radius: 0px;
	background-color:RoyalBlue;
}

table{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){
	background-color: #f2f2f2;
}

tr:hover {
	background-color: #ddd;
}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #f96353;
  color: white;
}

.print {
	background-color:DarkSlateBlue;
	margin-top: 10px;
}

</style>

<body>

<div class="container">
	<div class="nav-container">
	<ul>
        <li><button class="nav-btn" onclick="javascript:btnStudentS()">Student Borrow Book Statistic(Borrow Date)</button ></li>
        <li><button class="nav-btn" onclick="javascript:btnStudentD()">Student Borrow Book Statistic(Total Borrow)</button ></li>
        <li><button class="nav-btn" onclick="javascript:btnBook()">Most Viewed Book of the Month</button></li>
    </ul>
    </div>
	<div  id="container-S">
		<form action="record.php" method="post">
        	<div class="search-container" >
        		<select name="category" class="search" style="width:100px">
        			<option value="Bookname">Book Name</option>
        			<option value="Username">Username</option>
        		</select>
				<input type="text" class="search" name="search_key" placeholder="Key in book name to search...">
				<span>
        			<button type="submit" class="submit">Search</button>
				</span>
			</div>
		</form>
		<?php
			include("conn.php");
						
			$search = isset($_POST['search_key']) ? $_POST['search_key'] : '';
			$category = isset($_POST['category']) ? $_POST['category'] : '';
			
			
			if ($category == 'Bookname')
			{	
				if ($search == NULL)
				{
		  			$result = mysqli_query($con,"SELECT * FROM record join reading_material on record.RmID = reading_material.RmID join student on record.StudentId = student.StudentID order by record.RmID ASC");
		  		}
		  		else
		  		{
		  			$result = mysqli_query($con,"SELECT * FROM record join reading_material on record.RmID = reading_material.RmID join student on record.StudentId = student.StudentID WHERE Rm_Name LIKE '%" . $search . "%'");
		  		}
		  	}
		  	elseif ($category == 'Username')
		  	{
				if ($search == NULL)
				{
		  			$result = mysqli_query($con,"SELECT * FROM record join reading_material on record.RmID = reading_material.RmID join student on record.StudentId = student.StudentID order by record.StudentID ASC");
		  		}
		  		else
		  		{
		  			$result = mysqli_query($con,"SELECT * FROM record join reading_material on record.RmID = reading_material.RmID join student on record.StudentId = student.StudentID WHERE student.Username LIKE '%" . $search . "%'");
		  		}
		  	}
		  	else
		  	{
		  		$result = mysqli_query($con,"SELECT * FROM record join reading_material on record.RmID = reading_material.RmID join student on record.StudentId = student.StudentID order by record.RmID ASC");
		  	}
		?>
		<div id="Student_Stat-S">
        	<table border="1" style="text-align:center">
				<tr bgcolor="#CC99FF">
					<th>StudentID</th>
					<th>Username</th>
					<th>Book ID</th>
				  	<th>Book Name</th>
				  	<th>Borrow Date</th>
				  	<th>End Date</th>
				</tr>
				<?php
					//get the number of rows fetched
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr bgcolor=\"#99FF66\">";
				    	echo "<td>";
				    	echo $row['StudentID'];
				    	echo "</td>";
				    	echo "<td>";
				    	echo $row['Username'];
				    	echo "</td>";
					   	echo "<td>";
			    		echo $row['RmID'];
				    	echo "</td>";
				    	echo "<td>";
				    	echo $row['Rm_name'];
				    	echo "</td>";
				    	echo "<td>";
				    	echo $row['Borrow_date'];
				    	echo "</td>";
				    	echo "<td>";
				    	echo $row['End_date'];
						echo "</td>";
					}
				?>
			</table>
		</div>
      	<iframe name="print_frame_s-s" width="0" height="0" frameborder="0" src="about:blank"></iframe>
      	<button onclick="printDivSS()" class="print">Print this page</button>
	</div>
	
	<div  id="container-D" style="display:none">
		<?php
	  		$result = mysqli_query($con,"SELECT record.RmID, reading_material.Rm_name, COUNT(record.RmID) FROM record join reading_material on record.RmID = reading_material.RmID join student on record.StudentId = student.StudentID group by record.RmID order by record.RmID ASC");
		?>
		<div id="Student_Stat-D">
        	<table border="1" style="text-align:center">
				<tr bgcolor="#CC99FF">
					<th>Book ID</th>
				  	<th>Book Name</th>
				  	<th>Total Borrow</th>
				</tr>
				<?php
					//get the number of rows fetched
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr bgcolor=\"#99FF66\">";
					   	echo "<td>";
			    		echo $row['RmID'];
				    	echo "</td>";
				    	echo "<td>";
				    	echo $row['Rm_name'];
				    	echo "</td>";
				    	echo "<td>";
				    	echo $row['COUNT(record.RmID)'];
				    	echo "</td>";
					}
				?>
			</table>
		</div>
      	<iframe name="print_frame_s-d" width="0" height="0" frameborder="0" src="about:blank"></iframe>
      	<button onclick="printDivSD()" class="print">Print this page</button>
	</div>
    <div id="BookoftheMonth" style="display:none">
    	<table border="1" style="text-align:center">
			<tr bgcolor="#CC99FF">
			  <th>Top</th>
			  <th>Book ID</th>
			  <th>Book Name</th>
			  <th>Total Borrowed</th>
			</tr>
			<?php
			  $month = date('m');
			  $sql = "SELECT Record.RmID, Rm_Name, COUNT(record.RmID) FROM record join reading_material on record.RmID = reading_material.RmID where EXTRACT(MONTH from Borrow_date) = '" . $month . "' GROUP BY Rm_Name;";
			  $result = mysqli_query($con,$sql);
			  //get the number of rows fetched
			  $i = 1;
			  while($row = mysqli_fetch_array($result))
			  {
			    echo "<tr bgcolor=\"#99FF66\">";
			    echo "<td>";
			    echo $i;
			    echo "</td>";
			    echo "<td>";
			    echo $row['RmID'];
			    echo "</td>";
			    echo "<td>";
			    echo $row['Rm_Name'];
			    echo "</td>";
			    echo "<td>";
			    echo $row['COUNT(record.RmID)'];
			    echo "</td>";
			    $i = $i + 1;
			  }
			  mysqli_close($con); //to close the database connection
			?>
		</table>
		<iframe name="print_frame_b" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		<button onclick="printDivB()"  class="print">Print this page</button>
	</div>
</div>
</body>