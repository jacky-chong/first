<!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="menu1.css">
  
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
      </style>
 
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
       include("conn.php");
       $id = $_SESSION['id'];
       $result = mysqli_query($con,"Select * From student where StudentID=$id");
      
       
      
       
       //get the number of rows fetched
       while($row = mysqli_fetch_array($result))
       {
         $psd=$row['Password'];
         $status = $row['status'];
        
       echo "<tr bgcolor=\"#ffffff\"><font color=\"#000000\">";
       echo "<td>";
       echo $row['Username'];
       echo "</td>";
       echo "<td>";
       echo "<input type='password' value='$psd' style='border:0;' readonly></input>";
       echo "</td>";       
       echo "<td><a href=\"editpassword.php?id=";
       echo $row['StudentID'];
       echo "\"><button style='float:right'; class=button>Change Password</button></a></td>";
       
       }

       if ($status == "active"){
        echo '<script>alert("This is an auto generate password. For more security, Please Reset Your Password Immediately!")</script>';
        mysqli_query($con,"Update student SET status='' WHERE StudentID=$id");
      
        

      }
       mysqli_close($con); // close to the database connection
       ?>
       </thead>
    </table>
     </div>
    </div>
    </section>
    <h1 style="text-align:center; font-size:2em;font-family: 'Pacifico', cursive;">Most Popular</h1>
    <?php
include("conn.php");
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'e-library';

$mysqli = new mysqli($host,$user,$pass,$db);

$result = $mysqli->query
("SELECT Count(record.StudentID), record.RmID, reading_material.Photo_path, reading_material.Rm_name FROM `record` 
join reading_material on record.RmID = reading_material.RmID group by RmID order by COUNT(StudentID) DESC limit 8")
or die($mysqli->error);


?> <div class='main-container1'><?php



while ($reading_material = $result->fetch_assoc()):?>

<style>

.block{
  padding:10px;
  cursor: pointer;
  
}
.content.red{
  position: absolute;
  bottom: 50px;
  margin-left:-105px;
  color: salmon;
  cursor: pointer;
}
.content.text{
 position: absolute;
 bottom:40px;
 margin-left:-140px;
 max-width:115px;
 max-height:10px;
 cursor: pointer;
}

</style>
<span style="display:inline;padding:20px;"></span>
<span class="block"><a style="background:white; color:black;"href="searchid.php?id=<?php echo $reading_material['RmID']?>">
<img width='<?php 68*2.8 ?>' height='<?= 98*1.8 ?>' src='<?= $reading_material['Photo_path'] ?>'></a></span>
<span class="content red"><a style="background:white; color:salmon;"href="searchid.php?id=<?php echo $reading_material['RmID']?>">
<?= $reading_material['Count(record.StudentID)'];?> Views</a></span>
<span class="content text"><a style="background:white; color:black;"href="searchid.php?id=<?php echo $reading_material['RmID']?>">
<?= $reading_material['Rm_name'];?></a></span>




<?php endwhile; ?>
