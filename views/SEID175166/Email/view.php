<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
use App\BookTitle\BookTitle;
$obj = new BookTitle();
$obj->setData($_GET);
$oneData  =  $obj->viewSingleData();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php
         echo "
             <h1> Single Book Information </h1>
             <table class='table table-bordered table-striped'>
                    <tr>
                        <td>  <b>ID</b>  </td>
                        <td>  <b>$oneData->id</b>  </td>
                    </tr>
                     <tr>
                        <td>  <b>Name</b>  </td>
                        <td>  <b>$oneData->name</b>  </td>
                    </tr>
                     <tr>
                        <td>  <b>Email ID</b>  </td>
                        <td>  <b>$oneData->email</b>  </td>
                    </tr>
             </table>
         ";
?>
</div>
<div class="nav navbar-brand">
    <a href='index.php' class='btn btn-lg bg-danger'>All Data</a>
    <a href='create.php' class='btn btn-lg bg-success'>Create New</a>

</div>

</body>
</html