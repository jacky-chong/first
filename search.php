<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>E-Library</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style1.css">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
      </style>
    </head>
    <body>
        <header>
            <img class="logo" src="image/books.svg" alt="logo" width= "50" height="50">
            <nav>
                <ul class="nav_links">
                    <li><a href="student_index.php">Home</a></li>
                    <li><a href="table.php">Book List</a></li>
                    <li><a href="search.php">Search</a></li>
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
        <P style="text-align:center; background:#fff; font-size:4em;font-family: 'Pacifico', cursive;">Searching Book</P>
<style>
    .box{
        position:relative;
        left:200px;
        top:-37px;
        line-height: 40px;
        width: 532px;
        border-radius: 6px;
        padding: 0 15px;
        font-size: 16px;
        color: #555;
    }

    .box1{
        position:relative;
   
        top:60px;
        line-height: 40px;
        width: 1002px;
        border-radius: 6px;
        padding: 0 15px;
        font-size: 16px;
        color: #555;
    }

        .title{
            margin-left:30px;
            margin-top:15px;
            width:140px;
            font-size:25px;
            font-weight: 700;
        }
        .calender{
            position:absolute;
            left: 800px;
            top:238px;
            
        }
        .c1{
        position:absolute;
        left:950px;
        top:238px;
        border-radius: 6px;
        padding: 0 22px;
        font-size: 16px;
        color: #555;
        }
        .p1{
            text-align: center;
            background-color: #fff;

        }
        .button2{
            padding: 10px 24px;
            background-color: rgb(238, 159, 150);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
     
        }
        .button2:hover {
        background-color: rgb(218, 122, 112);
}

    
    </style>
<form id="c" action="search_table.php" method="post">
<h2 class="title">Book Name:</h2>
<input  class="box" type="text" name="book_name">

<h2 class="title">Author:</h2>
<input   class="box" type="text" name="author_name">
<h2 class="calender">Release Year:</h2>
<input  type="int" class="c1" name="year">


<P style="text-align:center;background:#Fff; font-size:2.5em;font-family: 'Pacifico', cursive;">Advance Search</P>
<div class="p1">
<input  placeholder="key in any keyword to search ......" class="box1" type="longtext" name="content"><br>
</div>

<button class="button2" style="position:absolute; left:670px; bottom:100px;"><input type="hidden" type="submit" name="submit">Search</button>

</form>
<button class="button2" style="position:absolute; left:790px; bottom:100px;"  
onclick="document.getElementById('c').reset()";>Reset</button>
</body>
</html>