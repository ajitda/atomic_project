<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;

use App\Utility\Utility;

use App\Gender\Gender;
$obj = new Gender();
$obj->setData($_GET);
$obj->recover();
Utility::redirect("trashList.php");
?>
