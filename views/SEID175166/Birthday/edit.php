<?php
require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
use App\Birthday\Birthday;

   $obj = new Birthday();
   // Utility::vd_die($_GET["id"]);
   $obj->setData($_GET);
   $oneData = $obj->viewSingleData();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<style>
   
</style>
</head>
    <body>
    <!-- Mesage Block Start-->
    <div id="MessageShowDiv" style="height: 20px">
        <div id="message" class="btn-danger text-center" >
            <?php
            if(isset($_SESSION['message'])){
                echo Message::message();
            }
            ?>
        </div>
    </div>
    <!-- Mesage Block End-->
    <!-- From Block Start-->
    <div class="container bg-success" style="background: url('../../');">
        <h1 style="text-align: center"> Book Title - Edit Form </h1>
        <div class="col-md-4">
            <h2> Left block</h2>
        </div>
        <div class="col-md-7" style="margin-top: 50px; margin-bottom: 50px">
            <form action="update.php" method="post">
                 <input type="hidden" name="id" value="<?php echo $oneData->id ?>">
           

                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" value="<?php echo $oneData->name ?>" required="">
                </div>

                 <div class="form-group">
                    <label class="control-label">Date</label>
                    <div class="date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="text" class="form-control" value="<?php echo $oneData->birthday ?>" name="Birthday" />
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
        <div class="col-md-1" >
            <h2>Right block</h2>
        </div>
    </div>
    <!-- From Block End-->
    <script>
        $(function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
        });
       
           
    </script>
    <script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
</body>
</html>
