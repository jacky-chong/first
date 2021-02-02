<?php
include("conn.php");
$after30 = $_POST['after30'];
$student_id = $_POST['id'];
$book_id = $_POST['book_id'];
$borrow_date = $_POST['borrow_date'];
$sql1 = "insert into borrow(RmID, StudentID, Borrow_date, End_date) values
                ('$book_id', '$student_id', '$borrow_date', '$after30')";
            mysqli_query($con,$sql1);
                

$sql2 = "insert into record(RmID, StudentID, Borrow_date, End_date) values
                ('$book_id', '$student_id', '$borrow_date', '$after30')";
            mysqli_query($con,$sql2);
                


                
?>
<script type="text/javascript">

alert("You are availabe to read the book now !");
window.location.replace("table.php");
</script>;
