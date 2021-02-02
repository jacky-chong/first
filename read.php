<?php
      include("conn.php");
      $id = intval($_GET['id']);
      $result = mysqli_query($con,"Select * from reading_material where RmID=$id");
      
      
      while ($row = $result->fetch_assoc()) {
      
      $stringT = $row['TypeId'];
      $stringI = $row['File_path'];
     
     }

     

    
    if ($stringT == 1){
    
      $file= $stringI;
      $filename= $stringI;
      header('content-type: application/pdf');
      header('content-Disposition: inline; filename="' . $filename . '"');
      header('content-Transfer-Encoding: binary');
      header('Accept_Ranges: bytes');
      @readfile($file);
     
       
    }
    else
    {
      header("location: $stringI");
    }
    ?>
    
