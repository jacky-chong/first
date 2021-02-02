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
      $sel_user = $_SESSION['select_username'];
  	  $role = $_SESSION['role'];

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
  <?php

  $sel_user = $_SESSION['select_username'];
  $role = $_SESSION['role'];
  ?>

  <body>


    <!-- END header -->

<style>

.center {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  margin: auto;
  width: 50%;
  padding: 10px;
  text-align: center;
}

input[type=text], input[type=password] {
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
    margin:10px
}

.update {
	background-color: MediumSeaGreen;
  color: white;
}

.update:hover{
	background-color: rgb(218, 122, 112);
}

.generate {
	background-color: PaleTurquoise;
	border-radius: 15px;
	color: black;
}

.generate:hover{
	background-color: rgb(218, 122, 112);
}

.back {
	background-color: DodgerBlue;
  color: white;
}

.back:hover{
	background-color: rgb(218, 122, 112);
}

.align{
	text-align:left;
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
             <form action="update.php" method="post">
               <?php
               include("conn.php");
               if ($role=='admin')
               {
                 $sql = "SELECT * from $role where Admin_Username ='$sel_user'";
               }
               elseif ($role=='librarian')
               {
                 $sql = "SELECT * from $role where Lib_Username ='$sel_user'";

               }
               else {
                 $sql = "SELECT * from $role where Username ='$sel_user'";
               }

               $result = mysqli_query($con,$sql);
               //echo $sel_user;
               //echo $role;

               $row = mysqli_fetch_array($result);
               if (!$row) {
                 printf("Error: %s\n", mysqli_error($con));
                 exit();
               }
               ?>

               <table style="width: 100%">
                 <tr>
                   <td class="title" style="text-align:center;background:#fff; font-size:4em;font-family: 'Pacifico', cursive;">Edit User</td>
                   </tr>
               </table>
         <table style="width: 125%">
					 <tr>
						 <td class="align" style="width: 200px">Username:&nbsp;</td>
						 <td><input type="text" readonly="readonly" name="Username" value="<?php if ($role=='admin'){echo $row['Admin_Username'];}elseif ($role=='librarian') {echo $row['Lib_Username'];}else {echo $row['Username'];}?>">&nbsp;</td>
					 </tr>
          		 	 <tr>
						 <td class="align" style="width: 200px">Password:&nbsp;</td>
						 <td><input type="password" name="Password" readonly="readonly" required="required" value="<?php echo $row['Password']; ?>">&nbsp;</td>
					 </tr>
           <td class="align" style="width: 200px">New Password:&nbsp;</td>
           <td><input type="text" name="new_Password" id="new_Password" readonly="readonly" required="required" value="">&nbsp;</td>
           <td><input type="button" value="Generate Password" onclick="newpass()" class="button generate"></td>
         </tr>
           <tr>
						 <td class="align" style="width: 200px">Role:&nbsp;</td>
						 <td><input type="text" readonly="readonly" Id="Role" name="Role" value="<?php echo $role; ?>">&nbsp;</td>
					 </tr>
           <td class="align" style="width: 200px">ID:&nbsp;</td>
           <td><input type="text" name="ID" readonly="readonly" value="<?php if ($role=='admin') {echo $row['AdminID'];}elseif ($role=='librarian') {echo $row['LibrarianID'];}else {echo $row['StudentID'];}?>">&nbsp;</td>
         </tr>
         </table>
         <table style="width: 100%">
           <tr>
           <td style="width:275px"></td>
						 <td><input id="submitbtn" type="submit" value="Update" class="button update" >&nbsp; <input type="button" value="Back" onclick="goBack()" class="button back" ></td>
						 <td style="width:225px"></td>
					 </tr>
				</table>

             </form>
</div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <script>
    function goBack()
    {
      var role = document.getElementById("Role").value;
     if (role=="admin")
     {
       window.location.href="admin_view-admin.php";
     }
     else if (role=="librarian")
     {
       window.location.href="admin_view-librarian.php";
     }
     else
     {
       window.location.href="admin_view-Student.php";
     }
    }
    function newpass()
    {
      var x = Math.floor(100000 + Math.random() * 900000);
      document.getElementById("new_Password").value = x;
    }
    </script>



     </body>
</html>
