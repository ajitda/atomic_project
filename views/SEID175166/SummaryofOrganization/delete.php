<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;

use App\Utility\Utility;
use App\SummaryofOrganization\Summary;
$obj = new Summary();
$obj->setData($_GET);
$obj->delete();
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);

?>
