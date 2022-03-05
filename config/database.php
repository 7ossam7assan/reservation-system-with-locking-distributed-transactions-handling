<?php

return [
    'driver'=> env("DB_DRIVER" , 'mysql'),
    'host'=> env("DB_HOST" , 'localhost'),
    'username' => env('DB_USER','root'),
    'db' => env('DB_DATABASE',''),
    'password'=> env("DB_PASSWORD",'password')

];
