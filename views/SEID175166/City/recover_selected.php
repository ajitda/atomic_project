<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\City\City;
$obj = new City();
$selectedIDs =  $_POST['mark'];
$obj->recoverMultiple($selectedIDs);
Utility::redirect("index.php");
