<?php
require_once 'vendor/autoload.php';

use Models\Adver;

$db = new Adver();

$cars = $db->get();

$db  = new \Models\Make();

$make = $db->find(1);

var_dump($make);



