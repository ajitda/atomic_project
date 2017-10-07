<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
$obj = new \App\BookTitle\BookTitle();
//Utility::vd_die($_POST);
$obj->setData($_POST);
$obj->update();
Utility::redirect('index.php');