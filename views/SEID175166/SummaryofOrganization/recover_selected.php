<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\SummaryofOrganization\Summary;
$obj = new Summary();
$selectedIDs =  $_POST['mark'];
$obj->recoverMultiple($selectedIDs);
Utility::redirect("index.php");
