<?php
    require_once("../../../vendor/autoload.php");
    use App\Message\Message;
    use App\Utility\Utility;
    use App\Gender\Gender;

    $obj=new Gender();
    $obj->setData($_POST);
    $test=$obj->store();
    if($test=="redirect_create")
    Utility::redirect("create.php");
    else
    Utility::redirect("index.php");
