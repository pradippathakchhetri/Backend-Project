
<?php 
require('layouts/header.php');
require('middleware/secure.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashbord.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contact Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="tasks/create.php">Send Message</a></li>
                            <li><a class="dropdown-item" href="tasks/index.php">Data</a></li>

                        </ul>
                    </li>
                </ul>

            </div>

            <div class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="auth/logout.php">Log Out</a></li>


                </ul>
            </div>

        </div>
    </nav>

<div class="container d-flex justify-content-center p-5 ">
    <div class="card" style="width:18rem;">
       <img src="https://dummyimage.com/200x200/dddddd/fff.png&text=200x200" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

        </div>
    </div>
</div>
<?php
require('./layouts/footer.php');
?>