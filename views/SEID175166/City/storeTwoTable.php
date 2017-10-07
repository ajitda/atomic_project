<?php

if(!isset($_SESSION)) session_start();
    require_once("../../../vendor/autoload.php");
    use App\Message\Message;
    use App\Utility\Utility;
    use App\City\City;

    $obj=new City();
    if($_POST["City"]=="Others"){
    $_SESSION["City"]="Others";
    //Utility::redirect("create.php");
        var_dump($_SESSION);
    die;
}
    $obj->setData($_POST);
    $test=$obj->storeTowTable();
    if($test=="redirect_create")
    Utility::redirect("create.php");
    else
    Utility::redirect("index.php");
