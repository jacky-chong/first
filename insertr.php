<?php
if (isset($_POST['star'])){
    include("conn.php");
    $star = $_POST['star'];
    $comment = $_POST['content'];
    $studentid = $_POST['sid'];
    $bookid = $_POST['id'];
    
    
    $sql="insert into rating(Score, Comment, StudentID, RmID) 
    VALUES ('$star','$comment', '$studentid', '$bookid')";
    
    echo"<script>alert('Successfully update your rate.');</script>";
    echo "<script>window.history.go(-1);</script>";
    
    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
    
    
}else{
    echo"<script>alert('You need to rate at least one star!');</script>";
    echo "<script>window.history.go(-1);</script>";
}

?>


