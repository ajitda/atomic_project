<?php

require_once ("../../../vendor/autoload.php");
use App\ProfilePicture\ProfilePicture;
use App\Utility\Utility;

$obj = new ProfilePicture();

$selectedIDs =   $_POST["mark"];

$obj->deleteMultiple($selectedIDs);

$path = $_SERVER['HTTP_REFERER'];

Utility::redirect($path);

