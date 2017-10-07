<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Birthday\Birthday;
$obj = new Birthday();
$selectedIDs =  $_POST['mark'];
$obj->recoverMultiple($selectedIDs);
Utility::redirect("index.php");
