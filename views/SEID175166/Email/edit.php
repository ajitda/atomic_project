<?php
   require_once ("../../../vendor/autoload.php");
   if(!isset($_SESSION)) session_start();
   use App\Message\Message;
    use App\Email\Email;
   use App\Utility\Utility;
   $obj = new Email();
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
    <link rel="stylesheet" href="../../../resources/style.css">
    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

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
<div class="container bg-success" style="margin-top: 100px">
    <h1 style="text-align: center"> Email Info Edit </h1>
    <div class="col-md-4">
        <h2> Left block</h2>
    </div>
    <div class="col-md-7" style="margin-top: 50px; margin-bottom: 50px">
        <form action="update.php" method="post">

            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="Name" value="<?php echo $oneData->name ?>">
            </div>
            <div class="form-group">
                <label for="AuthorName">Email ID</label>
                <input type="text" class="form-control" name="Email" value="<?php echo $oneData->email ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $oneData->id?>">
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-md-1" >
        <h2>Right block</h2>
    </div>
</div>
<!-- From Block End-->
<script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
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
<a href="index.php" class="button_animated_back"><span>Back</span></a>
</body>
</html>
