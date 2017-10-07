<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
use App\Utility\Utility;
use App\Birthday\Birthday;
$obj = new Birthday();
$obj->setData($_GET);
$obj->delete();
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);

?>
