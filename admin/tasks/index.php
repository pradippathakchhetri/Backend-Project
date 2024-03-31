<?php
require('../config/config.php');
require('../layouts/header.php');

session_start();

if(isset($_SESSION['username'])){

}
else{
    header("Refresh:0; url=../index.php");

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../dashbord.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contact Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="create.php">Send Message</a></li>
                            <li><a class="dropdown-item" href="index.php">Data</a></li>

                        </ul>
                    </li>
                </ul>

            </div>

            <div class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle  text-white " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../auth/logout.php">Log Out</a></li>


                </ul>
            </div>
        </div>    
    </nav>
<div class="container py-5">
    <?php
    if(isset($_GET['msg'])){
        $msg =$_GET['msg'];
        if($msg == "deletefail"){
            echo "<div class='alert alert-warning'>Unable to dekete message, Please try again! </div>";
            header('refresh:5;url=index.php');

        }
        if($msg == "sent"){
            echo "<div class='alert alert-primary'>Message Added Successfully!.</div>";
            header('refresh:10; url=index.php');
        }
    }
    ?>
    <div class="d-flex  justify-content-between ">
        <h1 class="text-align-center ps-5"> Messages</h1>
    <a type="button" class="btn btn-primary h-75 " href="create.php">Add Message</a>
</div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Image Name</th>
          <th scope="col">image</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM tasks ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        $i = 0;
        while ($data =mysqli_fetch_array($result)){
           ?>
          <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['message']?></td>
            <td><?php echo $data['fname'] ?></td>
            <td><img style="  width: 150px; height:150px;" alt="No Image" src="<?php echo $data['image']; ?>" alt=""></td>
           <td>
              <a href="show.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-success   text-center">View</a>
              <a href="edit.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-info   text-center">Edit</a>
              <a href="delete.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-danger   text-center">Delete</a>
          </td>
           
            </tr>
          <?php
        }
        ?>
       
      
      </tbody>
    </table>
</div>
<?php
require('../layouts/footer.php');
?>