<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\City\City;
$obj = new City();
//Utility::vd_die($_POST);
$obj->setData($_POST);
$obj->update();
Utility::redirect('index.php');