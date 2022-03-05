<?php

namespace Check24\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DBEloquent
{
    protected Capsule $manager;
    public static array $dbConfig;

    public function __construct(array $dbConfig)
    {
        $this->manager = new Capsule();
        static::$dbConfig= $dbConfig;

    }
    public function init()
    {
        $this->manager->addConnection(static::$dbConfig);
        $this->manager->setAsGlobal();
        // Setup the Eloquent ORM.
        $this->manager->bootEloquent();
    }

}