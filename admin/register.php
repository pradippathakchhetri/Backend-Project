<?php
require('./config/config.php')
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
                        <a class="nav-link  disabled" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contact Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../admin/tasks/create.php">Send Message</a></li>
                            <li><a class="dropdown-item" href="#">Data</a></li>

                        </ul>
                    </li>
                </ul>

            </div>

            <div class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php">login</a></li>
                    <li><a class="dropdown-item" href="register.php">Signup</a></li>
                    <li><a class="dropdown-item disabled" href="auth/logout.php">Log Out</a></li>


                </ul>
            </div>

        </div>
    </nav>
    
    <div  class="container w-25 px-5 py-3  shadow mt-5 bg-dark  rounded">
    <?php
    if(isset($_GET['msg'])){
        $msg= $_GET["msg"];
        if ($msg =="error"){
            echo "<div class='alert alert-danger' role='alert'>
       Account is not added, please try again..</div>";
        header("refresh:2; url=register.php");
        }
        if ($msg =="emptyfield"){
            echo "<div class='alert alert-danger' role='alert'>Please fill  all fields..</div>";
            header("refresh:2; url=register.php");
        }
        if ($msg =="registerfail"){
            echo "<div class='alert alert-danger' role='alert'>Username or email  already exists! Please try another one.</div>";
            header("refresh:2; url=register.php");
        }
    }
    ?>
<form action="auth/register.php" class="" method="POST" enctype="multipart/form-data">
        <div>
            <h2 class=" text-center py-3 border-bottom text-white">Register Now</h2>
        </div>
            <div class="py-3">
                <label for="exampleInputText1" class="text-white form-label">User Name</label>
                <input type="text"  name="username" class="form-control text-dark" id="exampleInputText1" aria-describedby="textHelp">
            </div>
        <div class="py-3 ">
            <label for="exampleFormControlInput1" class="text-white form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="py-3">
            <label for="exampleInputPassword1" class="text-white form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" aria-describedby="passwordHelp">
        </div>
        <div class="d-flex justify-content-center btn-sm py-4 ">
            <button type="submit" class="text-white btn btn-danger ">Register</button>
        </div>
        <div class="text-white border-top text-center">
            <p> Already have account?Please<a class="text-decoration-none" href="./index.php"> Log in</a>. </p>
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>