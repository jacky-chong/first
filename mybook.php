<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>E-Library</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style1.css">
        
        <style>
            .dropbtn{
            background-color: rgb(177, 128, 166);
            border: none;
            font-size: 10px;
            padding: 10px 15px;
            border-radius: 0.1px;
            position: absolute;
            right: 0px;
            top: 78px;
        }

            .dropbtn:hover{
            background-color: rgba(114, 140, 146, 0.8);
        }
   

        </style>
    </head>
    <body>
        <header>
            <img class="logo" src="image/books.svg" alt="logo" width= "50" height="50">
            <nav>
                <ul class="nav_links">
                    <li><a href="student_index.php">Home</a></li>
                    <li><a href="table.php">Book List</a></li>
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
        
        
    </form>
    <script>
        function myFunction () {
            var x = document.getElementById("div");
            if (x.style.display == "none") {
                x.style.display = "block";
            }else{
                x.style.display = "none";
            }
        }
        </script>
    </body>
    </html>
<?php
$id = $_SESSION['id'];
$today = date("Y-m-d");
include("conn.php");
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'e-library';

$mysqli = new mysqli($host,$user,$pass,$db);


$result2 = $mysqli->query("select Borrow_ID from borrow where StudentID={$id}") or
die($mysqli->error);

$result3 = $result2->fetch_all();

$result3 = array_column($result3, 0);

for ($x = 0; $x < count($result3);$x++)
{
  $fresult = $mysqli->query("select End_date from borrow where Borrow_ID = '{$result3[$x]}'")->fetch_assoc();
  
  if ($today >= $fresult['End_date']){
      mysqli_query($con, "Delete from borrow where Borrow_ID='{$result3[$x]}'");
  }

}
?>


<?php
include("conn.php");
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'e-library';
$sid = $_SESSION['id'];



$mysqli = new mysqli($host,$user,$pass,$db);

$result = $mysqli->query
("select * from reading_material join book_gen on reading_material.RmID = book_gen.RmID join borrow on reading_material.RmID = borrow.RmID
where borrow.StudentID = $sid group by reading_material.RmID")
or die($mysqli->error);

?> <div class='main-container1'><?php

while ($reading_material = $result->fetch_assoc()):?>

 

 <div class='movie-container'>
         <div class='header1'>
         <h1><?= $reading_material['Rm_name'] ?></h1>
         <span class='year'> ( <?= $reading_material['Release_date'] ?> )</span>
         </div>
       <div class='content1'>
        
         <div class='left-column'>        
         <img width='<?php 68*2.8 ?>' height='<?= 98*3 ?>' src='<?= $reading_material['Photo_path'] ?>'>
         </div>
         
         <div class='right-column'>
         
         <span class='content blue'>
         <?= $reading_material['Rm_name']; ?>
         </span>

         
        
         
         <div>
         <span style= "Display:block; height: 10px; background-color:#edf0f1"></span>
         </div>
         
         
        
         <div>
           
         	 <span class='content yellow'>Author:</span>
              <span class="content text"> <?= $reading_material['Author'];?></span>

              <span class="content yellow" style='margin-left:10.75rem'>Rating:</span>
            
            <?php
            $star = $mysqli->query("select AVG(Score) from rating where RmID = '{$reading_material['RmID']}' group by RmID")->fetch_assoc();
           
            if ($star['AVG(Score)'] < 1.5 && $star['AVG(Score)'] > 0.9){
                echo "<img src='image/star6.png' width='100' height='20' style='position:relative;top:6px;'>";
            }else if($star['AVG(Score)'] > 1.4 && $star['AVG(Score)'] < 2.5){
                echo "<img src='image/star7.png' width='100' height='20' style='position:relative;top:6px;'>";
            }else if($star['AVG(Score)'] > 2.4 && $star['AVG(Score)'] < 3.5){
                echo "<img src='image/star8.png' width='100' height='20' style='position:relative;top:6px;' >";
            }else if($star['AVG(Score)'] > 3.4 && $star['AVG(Score)'] < 4.5){
                echo "<img src='image/star9.png' width='100' height='20'style='position:relative;top:6px;'>";
            }else if($star['AVG(Score)'] > 4.4){
                echo "<img src='image/starx.png' width='100' height='20' style='position:relative;top:6px;'>";
            }else{
                echo "No rate, let be the first to Rate!";
            }
            
            ?>

              <span style= "Display:block; height: 10px; background-color:#edf0f1"></span>
            <span class='content yellow'>Genre:</span>
         	 <?php
             $result2 = $mysqli->query("select CategoryID from book_gen where RmID={$reading_material['RmID']}") or
             die($mysqli->error);

             $genres = $result2->fetch_all();

             $genres = array_column($genres, 0);

             for ($x = 0; $x < count($genres);$x++)
             {
               $genre = $mysqli->query("select Category_Name from category where CategoryID = '{$genres[$x]}'")->fetch_assoc();
               
               echo "<span class='content text'>".$genre['Category_Name']."</span>";
               echo $genres[$x] != end($genres) ? ', ' : '';//if not at end of genres, print ,

             }

            ?>
        	
			 <span class="content text"></span> 
		</div>
		<span style= "Display:block; height: 10px; background-color:#edf0f1"></span>
	    <div>
			 <span class="content yellow">Release:</span>
			 <span class="content text"><?= $reading_material['Release_date'] ?></span>
		 

        <?php
        $today = date("Y-m-d");
        $year = date("Y");
        $release_year = $reading_material['Release_date'];
        $calculation = $year-$release_year;
        

        if ($calculation == 0){
            $av = 3;
            $x = date('Y-m-d', strtotime($today. '3 days'));
        } 
        elseif ($calculation > 0 && $calculation < 5){
            $av = 7;
            $x = date('Y-m-d', strtotime($today. '7 days'));
        }
        elseif ($calculation > 4 ){
            $av = 14;
            $x = date('Y-m-d', strtotime($today. '14 days'));
        }

        ?>
        <span class="content yellow" style='margin-left:2.15rem'>Available Borrow Days:</span>
        <span class="content text"><?= $av ?> days</span>
        </div>

  



        
        <?php
         $after30 = date('Y-m-d', strtotime($today. ' + 30 days'));
         $id = $_SESSION['id'];
         $book_id = $reading_material['RmID'];

         
         $result4 = $mysqli->query("select * from borrow where RmID='{$book_id}' and StudentID='{$id}'")
        or die($mysqli->error);
         $result5 = $result4->fetch_assoc();

         $result6 = $result5['End_date'];
         if ($result6 == ''){
             $bt = "enabled";
            
         }else{
             $bt = "disabled";
         
         }

         $result7 = $result5['Borrow_date'];
         if ($result7 == ''){
             $bt1 = "disabled";
         }
         elseif($result7 > $today){
             $bt1 = "enabled";
         }else{
             $bt1 = "disabled";
         }

         $result8 = $result5['Borrow_date'];
         if ($result8 == ''){
             $xx1 = "Available";
             $xx2 = "-";
             $xx3 = "-";
         }
         elseif($result7 > $today){
             $xx1 = "Borrowing";
             $xx2 = $result7;
             $xx3 = $result6;
         }else{
             $xx1 = "Pending Refresh";
             $xx2 = $result7;
             $xx3 = $result6;
         }
         ?>
               <span style= "Display:block; height: 10px; background-color:#edf0f1"></span>
         
         <div>
 
            <span class="content yellow" >Status:</span>
            <span class="content purple"><?php echo $xx1?></span>

            <span class="content yellow " style='margin-left:0.5rem'>Expired Date:</span>
            <span class="content green"><?php echo $xx2 ?></span>

            <span class="content yellow" style='margin-left:0.5rem'>Refresh Date:</span>
            <span class="content green"><?php echo $xx3 ?></span>
            </div>

            <span style= "Display:block; height: 15px; background-color:#edf0f1"></span>
          <div>
               <span class="content yellow">Book Description:</span>
           <span class="content text"><?= $reading_material['Content'] ?></span>
             </div>
            <span style= "Display:block; height: 15px; background-color:#edf0f1"></span>
             


 

        <?php
         


         echo "<td><a href=\"read.php?id=";
         echo $reading_material['RmID'];
         echo "\"><button $bt1 style='float:right'; class=button button1>Read</button></a></td>";
        
         ?> 
         <div>
      
         <form action="insert_borrow.php" method="post">
         <input type="hidden" name="after30" value="<?php echo $after30 ?>">
         <input type="hidden" name="id" value="<?php echo $id ?>">
         <input type="hidden" name="book_id" value="<?php echo $book_id?>">
         <input type="hidden" name="borrow_date" value="<?php echo $x ?>">
         <button id="1" style="position: absolute; right:115px; class=button button1"<?php echo $bt ?> >
         <input type="hidden" type="submit" value="borrow" disabled>Borrow</button>
        
         </form>
        </div>

        <span class="content text"><a style="background:#edf0f1; color:purple;text-decoration: underline;font-size:15px;"href="ratebookid.php?id=<?php echo $reading_material['RmID']?>">
        Rate this book</a></span>

         
         </div>
          
         </div>
         
         </div>
        </div>
    
 <?php endwhile; ?>

         
         

         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         

