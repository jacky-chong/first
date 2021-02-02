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

.button {
	border-radius: 5px;
	outline: none;
	cursor: pointer;
	color: white;
  	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  	background-color: salmon;
  	margin: 10px;
  	width: 250px;
  	height: 50px;
}
.button:hover {
background-color: rgb(218, 122, 112);
}
</style>

<div class="center">
        <table style="width: 100%">
				  <tr>
					  <td style="padding: 20px;"><a style="font-size:20px;padding: 0.5rem 33px;" class="button" href="admin_view-admin.php">Admin</a>&nbsp;</td>
				  </tr>
				  <tr>
					  <td style="padding: 20px;"><a style="font-size:20px;padding: 0.5rem 20px;" class="button" href="admin_view-librarian.php">Librarian</a>&nbsp;</td>
				  </tr>
				  <tr>
					  <td style="padding: 20px;"><a style="font-size:20px;padding: 0.5rem 25px;" class="button" href="admin_view-student.php">Student</a>&nbsp;</td>
				  </tr>

			  </table>
</div>
             </body>
