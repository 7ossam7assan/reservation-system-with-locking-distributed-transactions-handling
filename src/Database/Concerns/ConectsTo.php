<?php

namespace Check24\Database\Concerns;

use Check24\Database\Managers\Contracts\DatabaseManager;

trait ConectsTo
{
    public static function connect(DatabaseManager $manager)
    {
        return $manager->connect();
    }
}