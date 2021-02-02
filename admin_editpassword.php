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


  </header>

<style>
.title{
    margin-left:30px;
    margin-top:15px;
    width:140px;
    font-size:25px;
    font-weight: 700;
}
.center {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  margin: auto;
  width: 400px;
  padding: 10px;
  text-align:center;
}

input[type=text], input[type=password]{
	padding: 0.5rem 20px;
	border-radius: 5px;
	outline: none;
}

input[type=submit] {
	background-color: MediumSeaGreen;
	padding: 0.5rem 20px;
	border-radius: 5px;
	outline: none;
	cursor: pointer;
	color: white;
  	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  	margin: 5px;
}

input[type=reset] {
	background-color: red;
	padding: 0.5rem 20px;
	border-radius: 5px;
	outline: none;
	cursor: pointer;
	color: white;
  	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  	margin: 5px;
}

h2 {
	margin: 5px;
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
.button:hover {
background-color: rgb(218, 122, 112);
}
.add {
	background-color: MediumSeaGreen;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  color: white;
  padding: 12px 24px;
}

.reset {
	background-color: Red;
}

</style>

<div class="center">
  <h2 class="title" style="text-align:center;background:#fff; font-size:40px;font-family: 'Pacifico', cursive;">Edit Account</h2>
      <?php
      include("conn.php");
      $id = intval($_GET['id']);
      $result = mysqli_query($con,"Select * from admin where AdminID=$id");
      while($row = mysqli_fetch_array($result))
      {
      ?>

      <form action="update_admin.php" method="post">
      <table>
      <tr>
      <td class="title">Username</td>
      <td class="title">:</td>
      <td><input type="text" name="name" required="required" value="<?php echo $row['Admin_Username'] ?>" readonly ></td>
      </tr>
      <tr>
      <td class="title">New Password</td>
      <td class="title">:</td>
      <td><input type="password" name="password" required="required"></td>
      </tr>


      <tr><td></td><td></td>
      <td><input type="Submit" class="button add" value="Update">
      <input type="reset" class="button reset" value="Reset">
      </td></tr>
      </table>

      <input type="hidden" name="id" value="<?php echo $row['AdminID'] ?>">
      </form>
      <?php
      }
      mysqli_close($con);
      ?>
      </div>
    </section>
