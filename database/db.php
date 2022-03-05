<?php
include 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

//Capsule::
$capsule = new Capsule();
$capsule->addConnection([
    "driver" => app()->config->get('database.default'),
    "host" =>app()->config->get('database.default'),
    "database" => app()->config->get('database.default'),
    "username" => app()->config->get('database.default'),
    "password" => "pass123"
]);
$capsule->setAsGlobal();
// Setup the Eloquent ORM.
$capsule->bootEloquent();