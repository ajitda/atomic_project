<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;

use App\Utility\Utility;

use App\BookTitle\BookTitle;
$obj = new BookTitle();
$obj->setData($_GET);
$obj->trash();
Utility::redirect("index.php");
?>
