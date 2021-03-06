<?php

require_once ("../../../vendor/autoload.php");

use App\Message\Message;


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
        <div class="col-md-12">

            <h1> Hobbies - Create Form </h1>

            <form action="store.php" method="POST">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="Name" required="">
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">Hobby</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="Hobbies[]" value="Eating"  >Eating
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="Hobbies[]" value="Riding"  >Riding
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="Hobbies[]" value="Photography"  >Photography
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

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
