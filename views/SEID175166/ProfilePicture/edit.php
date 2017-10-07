<?php

require_once ("../../../vendor/autoload.php");

use App\Message\Message;

use App\ProfilePicture\ProfilePicture;

$obj = new ProfilePicture();
$obj->setData($_GET);

$oneData = $obj->view();



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hobbie</title>
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>

<h1> Profile Picture - Edit Form </h1>

<div id="MessageShowDiv" style="height: 20px">
    <div id="message" class="btn-danger text-center" >
        <?php
        if(isset($_SESSION['message'])){
            echo Message::message();
        }
        ?>
    </div>
</div>



    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="update.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $oneData->id ?>" name="id" >
                    </div>



                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" value="<?php echo $oneData->name ?>" name="Name" required="">
                    </div>

                    <div class="form-group">
                        <label for="ProfilePicture">Student Image</label>
                        <input type="file" class="form-control"" name="File2Upload" >
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                    <br><br>

                    <img width='250px' height='250px' src='Uploads/<?php echo $oneData->profile_picture ?> '>
                </form>
            </div>
        </div>

      

    </div>



<script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script>


    $(function ($) {

        $("#message").fadeOut(500);
        $("#message").fadeIn(500);

        $("#message").fadeOut(500);
        $("#message").fadeIn(500);

        $("#message").fadeOut(500);
        $("#message").fadeIn(500);
        $("#message").fadeOut(500);

    });


</script>


</body>
</html>
