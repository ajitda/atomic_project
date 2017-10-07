<?php
    require_once("../../../vendor/autoload.php");
    use App\Message\Message;
    use App\Utility\Utility;
    use App\SummaryofOrganization\Summary;
    $obj=new Summary();
    $obj->setData($_POST);
    $test=$obj->store();
    if($test=="redirect_create")
    Utility::redirect("create.php");
    else
    Utility::redirect("index.php");
