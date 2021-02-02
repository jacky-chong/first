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
       
          <li><a href="student_index.php">Home</a></li>
              <li><a href="table">Book List</a></li>
              <li><a href="search.php">search</a></li>
              <li><a href="mybook.php">My Book</a></li>
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
       
       
        <h1 style="text-align:center; font-size:4em;font-family: 'Pacifico', cursive;">Edit Account</h1>
 
      <?php
      include("conn.php");
      $id = intval($_GET['id']);
      $result = mysqli_query($con,"Select * from student where StudentID=$id");
      while($row = mysqli_fetch_array($result))
      {
      ?>
      
      <form action="updatecustomer.php" method="post">

      <h5><label style="width: 140px; position:relative; left:550px;top:30px;font-size:Large;"  for="name"  >Username:</label>
      <input style="position:relative; left:550px;top:30px;font-size:Large;width: 300px;" name="user" type="text" value="<?php echo $row['Username'] ?>" readonly required="required"></h5>
                    
                  
      <h5><label style="width: 140px; position:relative; left:550px;top:45px;font-size:Large;" for="password">Password:</label>
      <input style="position:relative; left:554px;top:45px;font-size:Large;width: 300px;"name="password" type="password" value="<?php echo $row['Password'] ?>" required="required"></h5>
                   
       <button style="width: 200px;background-color: MediumSeaGreen; position:relative; left:550px;top:120px;font-size:Large;" class="button2" type="submit">Update</button></a>
       <button style="width: 200px; position:relative; left:560px;top:120px;font-size:Large;" class="button2" type="reset">Reset</button></a>
      
      
      <input type="hidden" name="id" value="<?php echo $row['StudentID'] ?>">
      </form>
      <?php
      }
      mysqli_close($con);
      ?>
      </div>
    </section>