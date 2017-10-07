<?php
require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
use App\Email\Email;
$obj = new Email();
$allData  =  $obj->ViewTrashData();

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

<div id="MessageShowDiv" style="height: 20px">
    <div id="message" class="btn-danger text-center" >
        <?php
        if(isset($_SESSION['message'])){
            echo Message::message();
        }
        ?>
    </div>
</div>
<div  class="container">
    <div class="nav navbar-default">
        <a href='create.php' class='btn btn-lg bg-success'>Create</a>
        <a href='index.php' class='btn btn-lg bg-danger'>Active List</a>
        <button id="RecoverSelected" class='btn btn-lg bg-primary'>Recover Selected</button>
        <button id="DeleteSelected" class='btn btn-lg bg-danger'>Delete Selected</button>
        <a href='pdf.php' class='btn btn-lg bg-danger'>Download As PDF</a>
        <a href='xl.php' class='btn btn-lg bg-danger'>Download As XL</a>
        <a href='email.php' class='btn btn-lg bg-danger'>Email This List</a>
    </div>

    <div class="bg-info text-center"><h1>Email Info - Trashed List</h1></div>
    <table border="1px" class="table table-bordered table-striped">
        <tr>
            <th>Select all  <input id='select_all' type='checkbox' value='select all'></th>
            <th> Serial </th>
            <th> ID </th>
            <th> Name </th>
            <th> Email </th>
            <th> Action Buttons </th>
        </tr>

<form id="multiple" method="post">
        <?php
         $serial=1;
         foreach ($allData as $oneData){
             if($serial%2) $bgColor = "AQUA";
             else $bgColor = "#ffffff";

             echo "

                      <tr  style='background-color: $bgColor'>

                         <td style='padding-left: 4%'><input type='checkbox' class='checkbox' name='mark[]' value='$oneData->id'></td>

                         <td style='width: 10%; text-align: center'>$serial</td>
                         <td style='width: 10%; text-align: center'>$oneData->id</td>
                         <td style='width: 20%;'>$oneData->name</td>
                         <td>$oneData->email</td>

                         <td>
                           <a href='view.php?id=$oneData->id' class='btn btn-info'>View</a>
                           <a href='edit.php?id=$oneData->id' class='btn btn-primary'>Edit</a>
                           <a href='recover.php?id=$oneData->id' class='btn btn-success'>Recover</a>
                           <a href='delete.php?id=$oneData->id'  onclick='return doConfirm()' class='btn btn-danger'>Delete</a>
                           <a href='email.php?id=$oneData->id' class='btn btn-success'>Email</a>

                         </td>
                      </tr>
                  ";
             $serial++;
         }
       ?>
</form>
    </table>
</div>
<script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script>
    //select all checkboxes
    $("#select_all").change(function(){  //"select all" change
        var status = this.checked; // "select all" checked status
        $('.checkbox').each(function(){ //iterate all listed checkbox items
            this.checked = status; //change ".checkbox" checked status
        });
    });

    $('.checkbox').change(function(){ //".checkbox" change
//uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){ //if this item is unchecked
            $("#select_all")[0].checked = false; //change "select all" checked status to false
        }

//check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length ){
            $("#select_all")[0].checked = true; //change "select all" checked status to true
        }
    });


    $(document).ready(function () {
        $("#RecoverSelected").click(function () {
            $("#multiple").attr('action', 'recover_selected.php');
            $("#multiple").submit();
        });
        $("#DeleteSelected").click(function () {
            $("#multiple").attr('action', 'delete_selected.php');
            $("#multiple").submit();
        });
    });
    function doConfirm() {
        var result = confirm("Are you sure you want to delete?");
        return result;
    }
    $(function($) {
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
    });




</script>
</body>
</html>