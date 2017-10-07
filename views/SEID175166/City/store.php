<?php

if(!isset($_SESSION)) session_start();
    require_once("../../../vendor/autoload.php");
    use App\Message\Message;
    use App\Utility\Utility;
    use App\City\City;

    $obj=new City();
    if($_POST["City"]=="Others"){
    Utility::redirect("create_others.php");
    die;
}
    $obj->setData($_POST);
    $test=$obj->store();
    if($test=="redirect_create")
    Utility::redirect("create.php");
    else
    Utility::redirect("index.php");
