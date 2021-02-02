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
       
       
  </header>
  
<style>
.center {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  margin: auto;
  width: 300px;
  padding: 10px;
  text-align:center;
}

input[type=text], input[type=password]{
	padding: 0.5rem 20px;
	border-radius: 5px;
	outline: none;
}

input[type=text]:focus, input[type=password]:focus{
	border-color:aqua;
}

input[type=submit] {
	background-color: MediumSeaGreen;
	padding: 0.5rem 20px;
	border-radius: 5px;
	outline: none;
	cursor: pointer;
	color: white;
  	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}

input[type=reset] {
	background-color: red;
	padding: 0.5rem 20px;
	border-radius: 5px;
	outline: none;
	cursor: pointer;
	color: white;
  	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}

</style>

<div class="center">
  <h2>Edit Account</h2>
      <?php
      include("conn.php");
      $id = intval($_GET['id']);
      $result = mysqli_query($con,"Select * from librarian where LibrarianID=$id");
      while($row = mysqli_fetch_array($result))
      {
      ?>
      
      <form action="update_lib.php" method="post">
      <table>
      <tr>
      <td>Username</td>
      <td>:</td>
      <td><input type="text" name="name" required="required" value="<?php echo $row['Lib_Username'] ?>" readonly ></td>
      </tr>
      <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="password" name="password" required="required"></td>
      </tr>
      
               
      <tr><td></td><td></td>
      <td><input type="Submit" value="Update">
      <input type="reset" value="Reset">
      </td></tr>
      </table>
      
      <input type="hidden" name="id" value="<?php echo $row['LibrarianID'] ?>">
      </form>
      <?php
      }
      mysqli_close($con);
      ?>
</div>
    </section>