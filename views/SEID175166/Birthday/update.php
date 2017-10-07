<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Birthday\Birthday;
$obj = new Birthday();
//Utility::vd_die($_POST);
$obj->setData($_POST);
$obj->update();
Utility::redirect('index.php');