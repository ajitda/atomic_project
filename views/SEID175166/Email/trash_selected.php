<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Email\Email;
$obj = new Email();
$selectedIDs =  $_POST['mark'];
$obj->trashMultiple($selectedIDs);
Utility::redirect("index.php");
