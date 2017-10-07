<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Gender\Gender;
$obj=new Gender();
//Utility::vd_die($_POST);
$obj->setData($_POST);
$obj->update();
Utility::redirect('index.php');