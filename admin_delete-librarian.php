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
        <section class="site-hero overlay" data-stellar-background-ratio="";>
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">
    <style>
    .my { border:2px solid #ccc; width:300px; height: 150px; overflow-y: scroll; text-align: left; margin:0auto; background-color: white;}

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
    margin: 5px
}

.select {
	background-color: rgb(255,0,255);
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  color: white;
}

.select:hover {
	background-color: rgb(218, 122, 112);
}

.search {
	background-color: #ff9966;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  color: white;
}

.search:hover {
	background-color: rgb(218, 122, 112);
}

.delete {
	background-color: Red;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  color: white;
}

.delete:hover {
	background-color: rgb(218, 122, 112);
}

.back {
	background-color: DodgerBlue;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  color: white;
}

.back:hover {
	background-color: rgb(218, 122, 112);
}
input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
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

input[type=checkbox] + label:active:before {
  transform: scale(0);
}

input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}
.title{
    margin-left:30px;
    margin-top:15px;
    width:140px;
    font-size:25px;
    font-weight: 700;
}
</style>
<div class="center">
             <form action="" method="post">
               <table style="width: 100%">
                 <tr>
                   <td class="title" style="text-align:center;background:#fff; font-size:4em;font-family: 'Pacifico', cursive;">Select Librarian</td>
                   </tr>
               </table>
             	<table style="width: 100%">

             	<table style="width: 100%" align="left">
					<tr>
            <td></td>
						<td>
              <input type="text"  name="search_key" size="25" placeholder="Key in username to search...">&nbsp;
            <button type="submit" class="button search">Search</button>
            </td>
            <td></td>
					</tr>
        </form>
          <?php
			  			include("conn.php");
			  			$search = isset($_POST['search_key']) ? $_POST['search_key'] : '';

			  			if ($search == NULL)
			  			{
			  				$result = mysqli_query($con,"SELECT * from librarian");
			  			}
			  			else
			  			{
			  				$result = mysqli_query($con,"SELECT * FROM librarian WHERE Lib_Username LIKE '%" . $search . "%'");
			  			}
					?>

          <form action="Delete_user.php" method="post">
					<tr>
            <td></td>
						<td><input type="hidden"  name="role" value="librarian" ></td>
            <td></td>
          </tr>
            <tr>
              <td></td>
              <td align="left" class="center"><div class="my">
              <?php
              //get the number of rows fetched
              while($row = mysqli_fetch_array($result))
              {
                echo "<input type='checkbox' name='no[]' id='" . $row['LibrarianID'] . "' value='".$row['LibrarianID']."'>";
                echo "<label class='bg-color' for='" . $row['Lib_Username'] . "'>" . $row['Lib_Username'] . "</label></br>";

              }
              mysqli_close($con); //to close the database connection
              ?>
            </div>
							&nbsp;
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="button" onclick='selectAll()' class="button select" value="Select All"/>&nbsp;<input type="button" onclick='UnSelectAll()' class="button select" value="Unselect All"/></td>
            <td></td>
        </tr>
					<tr>
            <td></td>
						<td><input id="submitbtn" name="delete_records" type="submit" value="Delete selected" class="button delete" >&nbsp; <a class="button back" href="Admin_delete-user.php">Back</a></td>
            <td></td>
					</tr>
				 </table>

             </form>
</div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <script type="text/javascript">
    function selectAll() {
        var items = document.getElementsByName('no[]');
        for (var i = 0; i < items.length; i++) {
            if (items[i].type == 'checkbox')
                items[i].checked = true;
        }
    }

    function UnSelectAll() {
        var items = document.getElementsByName('no[]');
        for (var i = 0; i < items.length; i++) {
            if (items[i].type == 'checkbox')
                items[i].checked = false;
        }
    }
</script>




     </body>
</html>
