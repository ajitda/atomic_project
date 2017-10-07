<?php
require_once ("../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Hobbies\Hobbies;

$obj  = new Hobbies();

$obj->setData($_GET);

$obj->recover();

Utility::redirect("trashed.php");



