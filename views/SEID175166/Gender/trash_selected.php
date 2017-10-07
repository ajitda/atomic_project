<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Gender\Gender;
$obj = new Gender();
$selectedIDs =  $_POST['mark'];
$obj->trashMultiple($selectedIDs);
Utility::redirect("index.php");
