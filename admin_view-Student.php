<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,700" rel="stylesheet">


    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="menu.css">

    <!-- Theme Style -->

 	</head>

  <body>

    <header>
      <img class="logo" src="image/books.svg" alt="logo" width= "50" height="50">
      <nav>
          <ul class="nav_links">
          <li><a href="admin_index.php">Home</a></li>
              <li><a href="Admin_add-user_html.php">Add Account</a></li>
              <li><a href="Admin_view-user.php">Edit Account</a></li>
              <li><a href="Admin_delete-user.php">Delete Account</a></li>
              <li><a href="Admin_record.php">Record</a></li>
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

<style>

.center {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  margin: auto;
  width: 50%;
  padding: 10px;
  text-align: center;
}

input[type=text]{
	padding: 0.5rem 20px;
	border-radius: 5px;
	outline: none;
}

.button{
    padding: 10px 24px;
    background-color: rgb(238, 159, 150);
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}

.select {
	background-color: MediumSeaGreen;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  color: white;
}

.select:hover {
	background-color: rgb(218, 122, 112);
}


.search {
	background-color: #ff9966;
}

.search:hover {
	background-color: rgb(218, 122, 112);
}


.back {
	background-color: DodgerBlue;
}

.back:hover {
	background-color: rgb(218, 122, 112);
}
.title{
    margin-left:30px;
    margin-top:15px;
    width:140px;
    font-size:25px;
    font-weight: 700;
}
</style>

        <section class="site-hero overlay" data-stellar-background-ratio="";>
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">
<div class="center">
             <form action="" method="post">
               <table style="width: 100%">
                 <tr>
                   <td class="title" style="text-align:center;background:#fff; font-size:4em;font-family: 'Pacifico', cursive;">Select User</td>
                   </tr>
               </table>
             	<table style="width: 100%">
					<tr>
						<td>
              <input type="text"  name="search_key" size="25" placeholder="Key in username to search...">&nbsp;
            <button type="submit" class="button search">Search</button>
            </td>
					</tr>
        </form>
          <?php
			  			include("conn.php");
			  			$search = isset($_POST['search_key']) ? $_POST['search_key'] : '';

			  			if ($search == NULL)
			  			{
			  				$result = mysqli_query($con,"SELECT * from student");
			  			}
			  			else
			  			{
			  				$result = mysqli_query($con,"SELECT * FROM student WHERE Username LIKE '%" . $search . "%'");
			  			}
					?>

					<tr>
						<td>
						</td>
					</tr>
          <form action="select_username.php" method="post">
					<tr>
						<td><input type="hidden"  name="role" value="student" >
              <select name="select_username" required="required" size="5" style="width:200px;margin:20px">
		<?php

  		//get the number of rows fetched
 		while($row = mysqli_fetch_array($result))
 		{
 		echo "<option>" . $row['Username'] . "</option>";
   		}
 		mysqli_close($con); //to close the database connection

		?>
							</select>&nbsp;</td>
					</tr>
					<tr>
						<td><input id="submitbtn" type="submit" value="Select" class="button select" >&nbsp; <a class="button back" href="admin_view-user.php">Back</a></td>
					</tr>
				 </table>

             </form>
</div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->




     </body>
</html>
