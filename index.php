<?php
require_once 'vendor/autoload.php';

use Models\Adver;

$db = new Adver();

$cars = $db->get();

//var_dump($cars);

$db  = new \Models\Make();

$make = $db->find(1);

var_dump($make);



