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
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
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
    <div style="width:25%;" class="container px-5 py-3 rounded-3 shadow mt-5 bg-dark text-white ">
        <?php


        if (isset($_GET['msg'])) {
            $msg = $_GET["msg"];
            if ($msg = "success") {
                echo "<div class='alert alert-primary' role='alert'>
       Account is added sucessfully</div>";
                header("refresh:2; url=index.php");
            }
            if ($msg == "emptyfield") {
                echo "<div class='alert alert-danger' role='alert'>Please fill  all fields..</div>";
                header("refresh:2; url=index.php");
            }
            if ($msg == "login_failed") {
                echo "<div class='alert alert-danger' role='alert'>Username or email not found. </div>";
                header("refresh:2; url=index.php");
            }
        }

        ?>
        <div>
            <h2 class=" text-center py-4 border-bottom">User Login</h2>
        </div>
        <form action="auth/login.php" method="POST" enctype="multipart/form-data">
            <div class="py-3 ">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control " name="email" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="py-3 ">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control " name="password" id="exampleInputPassword1" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">We'll never share your password with anyone else.</div>
            </div>
            <div class="py-3 ps-2 mb-4 ">
                <button type="submit" class="btn btn-primary  py-1  ">Login</button>
            </div>
        </form>
        <div class="border-top text-center mt-3">
            <p>Don't have account? Please <a class="text-decoration-none" href="register.php"> Register</a>. </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>