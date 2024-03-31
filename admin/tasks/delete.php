<?php 
require('../config/config.php');

if(isset($_GET['id'])){
   $id = $_GET['id'];
    $query= "SELECT * FROM tasks WHERE id ='$id'";
    $result= mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc( $result );
    //  print_r($data);
    unlink($data['image']);
    $query2 = "DELETE FROM tasks WHERE  id='$id'";
    
    $result2 =  mysqli_query($conn, $query2);
     if ($result2) {
        header('refresh:0; url=index.php');
    }else{
               header('refresh:0; url=index.php?msg=deletefail');

           }
}
    ?>