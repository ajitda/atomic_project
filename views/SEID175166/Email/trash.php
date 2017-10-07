<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;

use App\Email\Email;
use App\Utility\Utility;
$obj = new Email();
$obj->setData($_GET);
$obj->trash();
Utility::redirect("index.php");
?>
