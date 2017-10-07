<?php

require_once ("../../../vendor/autoload.php");

use App\Message\Message;
use App\Utility\Utility;

use App\ProfilePicture\ProfilePicture;

$obj = new ProfilePicture();
$obj->setData($_GET);

$oneData = $obj->trash();

Utility::redirect("index.php");