 <?php 
 session_start(); 
 include("conn.php");
 $id = $_SESSION['id'];
 $result = mysqli_query($con,"Select * From librarian where LibrarianID=$id and status = 'active'");

 
 ?>
<!DOCTYPE html>
    <style>
      body{
        background:;
      }
      .container{
        margin: 20px auto;
        max-width: 960px;
      }
      .table{
        width: 100%;
        max-width: 100%;
        margin-bottom: 2rem;
        background-color: #fff;
    
      }
     

      .table > thead > tr,
      .table > tbody > tr,
      .table > tfoot > tr {
        -webkit-transition: all 0.3s ease;
        -moz-transiton: all 0.3s ease;
        -o-transiton:all 0.3s ease;
        transition: all 0.3s ease;
      }
      .table >thead > tr > th,
      .table > tbody > tr > th,
      .table > tfoot > tr > th,
      .table >thead > tr > td,
      .table > tbody > tr > td,
      .table > tfoot > tr > td{
        text-align: left;
        padding: 1.6rem;
        vertical-align: top;
        border-top: 0;
        -webkit-transition: all 0.3s ease;
        -moz-transiton: all 0.3s ease;
        -o-transiton:all 0.3s ease;
        transition: all 0.3s ease;
      }
      .table >thead > tr > th{
        font-weight: 400;
        color: #757575;
        vertical-align: bottom;
        border-bottom: 1px solid rgba(0,0,0,0.12);
      }

  
    

      </style>

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
	
	  <h1 style="text-align:center; font-size:4em;font-family: 'Pacifico', cursive;">Profile</h1>

  <section class="py-5">
     <div class="container">
           <div class="table-responsive-vertical">
                <table class="table table-bordered table-striped table-hover table-mc-red">
                    <thead>
       <tr bgcolor="#00a123">
       <th class="text-white">Username</th>
       <th class="text-white">Password</th>
      
       
       </tr>
  <?php
 		$result = mysqli_query($con,"Select * From librarian where LibrarianID=$id");

       //get the number of rows fetched
       while($row = mysqli_fetch_array($result))
       {
        $status = $row['status'];
         $psd=$row['Password'];
       echo "<tr bgcolor=\"#ffffff\"><font color=\"#000000\">";
       echo "<td>";
       echo $row['Lib_Username'];
       echo "</td>";
       echo "<td>";
       echo "<input type='password' value='$psd' style='border:0;' readonly></input>";
       echo "</td>";       
       echo "<td><a href=\"lib_editpassword.php?id=";
       echo $row['LibrarianID'];
       echo "\"><button style='float:right'; class=button>Change Password</button></a></td>";
       
       }

       if ($status == "active"){
        echo '<script>alert("This is an auto generate password. For more security, Please Reset Your Password Immediately!")</script>';
        mysqli_query($con,"Update librarian SET status='' WHERE LibrarianID=$id");
      
      
        

      }
       mysqli_close($con); // close to the database connection
  ?>
       </thead>
    </table>
     </div>
    </div>
    </section>

	
  </body>