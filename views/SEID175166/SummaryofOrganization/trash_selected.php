<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\SummaryofOrganization\Summary;
$obj = new Summary();
$selectedIDs =  $_POST['mark'];
$obj->trashMultiple($selectedIDs);
Utility::redirect("index.php");
