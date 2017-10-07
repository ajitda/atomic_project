<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Email\Email;
$obj = new Email();
//Utility::vd_die($_POST);
$obj->setData($_POST);
$obj->update();
Utility::redirect('index.php');