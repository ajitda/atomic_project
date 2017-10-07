<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
use App\BookTitle\BookTitle;
use App\Utility\Utility;
$obj = new BookTitle();
$allData  =  $obj->viewAllData();

################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) )$someData =  $obj->search($_REQUEST);
$availableKeywords=$obj->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block 1 of 5 end ##################

######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allData);
if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;
if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 6;
$_SESSION['ItemsPerPage']= $itemsPerPage;
$pages = ceil($recordCount/$itemsPerPage);
$someData = $obj->indexPaginator($page,$itemsPerPage);
$allData = $someData;
$serial = (  ($page-1) * $itemsPerPage ) +1;
if($serial<1) $serial=1;
####################### pagination code block#1 of 2 end #########################################

################## search  block 2 of 5 start ##################
if(isset($_REQUEST['search']) ) {
    $someData = $obj->search($_REQUEST);
    $allData = $someData;
    $serial = 1;
}
################## search  block 2 of 5 end ##################
################## search  block 2 of 5 start ##################
if(isset($_REQUEST['search']) ) {
    $someData = $obj->search($_REQUEST);
    $allData = $someData;
    $serial = 1;
}
################## search  block 2 of 5 end ##################

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <!-- required for search, block3 of 5 start -->

    <link rel="stylesheet" href="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.css">
    <script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <!-- required for search, block3 of 5 end -->

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
    <!-- required for search, block 4 of 5 start -->
    <div style="margin-left: 70%">
        <form id="searchForm" action="index2.php"  method="get" style="margin-top: 5px; margin-bottom: 10px ">
            <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
            <input type="checkbox"  name="byTitle"   checked  >By Title
            <input type="checkbox"  name="byAuthor"  checked >By Author
            <input hidden type="submit" class="btn-primary" value="search">
        </form>
    </div>
    <!-- required for search, block 4 of 5 end -->

    <form id="multiple"  method="post">
        <div class="nav navbar-default">
            <a href='create.php' class='btn btn-lg bg-success'>Create</a>
            <a href='trashList.php' class='btn btn-lg bg-danger'>Trashed List</a>
            <button id="TrashSelected" class='btn btn-lg bg-danger'>Trash Selected</button>
            <button id="DeleteSelected" class='btn btn-lg bg-danger'>Delete Selected</button>
        </div>
        <div class="bg-info text-center"><h1>Book Title - Active List</h1></div>
        <table border="1px" class="table table-bordered table-striped">
            <tr>
                <th>Select all  <input id='select_all' type='checkbox' value='select all'></th>
                <th> Serial </th>
                <th> ID </th>
                <th> Book Title </th>
                <th> Author Name </th>
                <th> Action Buttons </th>

            </tr>

            <?php

            foreach ($allData as $oneData){

                if($serial%2) $bgColor = "AQUA";
                else $bgColor = "#ffffff";

                echo "
                      <tr  style='background-color: $bgColor'>
                         <td style='padding-left: 4%'><input type='checkbox' class='checkbox' name='mark[]' value='$oneData->id'></td>
                         <td style='width: 10%; text-align: center'>$serial</td>
                         <td style='width: 10%; text-align: center'>$oneData->id</td>
                         <td style='width: 20%;'>$oneData->book_title</td>
                         <td>$oneData->author_name</td>
                         <td>
                           <a href='view.php?id=$oneData->id' class='btn btn-info'>View</a>
                           <a href='edit.php?id=$oneData->id' class='btn btn-primary'>Edit</a>
                           <a href='trash.php?id=$oneData->id' class='btn btn-warning'>Trash</a>
                           <a href='delete.php?id=$oneData->id' onclick='return doConfirm()' class='btn btn-danger'>Delete</a>
                           <a href='email.php?id=$oneData->id' class='btn btn-success'>Email</a>

                         </td>
                      </tr>
                              ";
                $serial++;

            }
            ?>
        </table>
    </form>

    <!--  ######################## pagination code block#2 of 2 start ###################################### -->
    <div align="left" class="container">
        <ul class="pagination">
            <?php
            $pageMinusOne  = $page-1;
            $pagePlusOne  = $page+1;
            if($page>$pages) Utility::redirect("index2.php?Page=$pages");
            if($page>1)  echo "<li><a href='index2.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";
            for($i=1;$i<=$pages;$i++)
            {
                if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

            }
            if($page<$pages) echo "<li><a href='index2.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";
            ?>
            <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                <?php
                if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                ?>
            </select>
        </ul>
    </div>
    <!--  ######################## pagination code block#2 of 2 end ###################################### -->

</div>

<script>
    $(document).ready(function () {
        $("#TrashSelected").click(function () {
            $("#multiple").attr('action', 'trash_selected.php');
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

</script>


<!-- required for search, block 5 of 5 start -->
<script>

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block5 of 5 end -->

</body>
</html>