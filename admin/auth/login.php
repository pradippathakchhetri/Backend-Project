<?php
require("../config/config.php");

 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=$_POST["email"];
    $password=$_POST['password']; 
    
    if($email !="" && $password != ""){
$check = "SELECT * FROM users WHERE email = '$email' AND password ='$password'";
$result=mysqli_query($conn,$check);
 if ($result->num_rows>0){
    $row = mysqli_fetch_assoc($result); 
    session_start();
    $_SESSION["id"] = $row['id'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["email"] = $row['email'];
    header("refresh:0; url=../dashbord.php") ;
   } else{
    header("refresh:2 url=../index.php?msg=login_failed");
   }

    }else{
        header("refresh:0; url=../index.php?msg=emptyfield");
    }
 }
?>