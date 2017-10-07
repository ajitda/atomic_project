<?php

require_once ("../../../vendor/autoload.php");
use App\Utility\Utility;


$obj  = new \App\Hobbies\Hobbies();

$strHobbies =  implode(", ", $_POST["Hobbies"]);

$_POST["Hobbies"] = $strHobbies;

$obj->setData($_POST);

$obj->store();

Utility::redirect("index.php");

