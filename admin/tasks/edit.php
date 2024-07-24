<?php
require('../config/config.php');
require('../layouts/header.php');
require('../layouts/navbar.php');
?>
<div style="width:40%" class="container bg-dark p-5 shadow my-5">
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between p-3 mb-5 border-bottom">
            <h1 class="text-white">Add Messages</h1>
            <a href="index.php" type="button" class="btn  text-white btn-primary h-75 mt-2 text-center">Show Messages</a>
        </div>
        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $message = $_POST['message'];
            $file = $_FILES['file'];
            //  print_r( $_FILES);  // For testing purposes only!
            // $file = $_POST['file'];
            $tempname = $_FILES["file"]["tmp_name"];
            $filesize = $_FILES['file']['size'];
            $filename = $_FILES["file"]["name"];
            $explode_value = explode('.', $filename);
            $firstname = strtolower($explode_value[0]);
            $ext = strtolower(end($explode_value));
            $finalname = str_replace(' ', '', substr($firstname, 0, 9) . "-" . time() . '.' . $ext);

            $folder = "../assets/uploads/" . $finalname;
         
            if ($name != "" && $message != "") {
                if ($filesize < 20971520) {
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                        if (move_uploaded_file($tempname, $folder)) {
                            unlink($data1['image']);
                            $query = "UPDATE  tasks SET name='$name', email='$email', message='$message',image='$file',fname='$finalname'";                           
                             $result = mysqli_query($conn, $query);

                            if ($result) {

                                header("Refresh:0; url=index.php?msg=update");
                            } else {
                                echo ('<div>Error editing your message! Please try again later.</div>');
                                header("Refresh:2; url=index.php");
                            }
                        }
                    } else {
                        echo ('<div class="bg-warning text-white ">Please insert .jpg , .png , .jpeg format image.</div>');
                        header("Refresh:2;");
                    }
                } else {
                    echo ('<div class="bg-warnibg >Please insert image smaller then 2MB size.</div>');
                    header("Refresh:2; url=create.php");
                }
            } else {
                echo ('<div class="d-flex justify-content-center"><div class="bg-warning fs-5 text-center w-50 "> Please fill all data.</div></div>');
               header( "refresh:2;" );
            }
        }
       
   
    
     
        if (isset($_GET['id'])) {
            $id = $_GET["id"];
            $query1 = "SELECT * FROM tasks WHERE id ='$id'";
            $result1 = mysqli_query($conn, $query1);
            $data1 = mysqli_fetch_assoc( $result1);
            if ('$data1') {
        ?>
                <div class="mb-3 d-flex flex-column">
                    <label for="exampleFormControlInput1" class="form-label text-white">Name</label>
                    <input type="text" class="form-control mb-2" id="exampleFormControlInput1" value="<?= $data1['name']; ?>" name="name">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-white">Message</label>
                    <textarea class="form-control  mb-4" id="exampleFormControlTextarea1" name="message"  rows="3"><?= $data1['message']; ?></textarea>
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label for="exampleFormControlInput1" class="form-label text-white">Upload Images</label>
                    <input type="file" class="form-control mb-2" id="exampleFormControlInput1" value="<?= $data1['image']; ?>" name="file">
                    <!-- <input type="hidden" class="form-control mb-2" id="exampleFormControlInput1" value="<?= $data1['image']; ?>" name="name"> -->
                    <button type="submit"  class="btn btn-primary " value="upload file">
                        Send
                    </button>
                </form>
            <?php
            }
        }
            ?>

   
</div>
<?php require('../layouts/footer.php');
