<?php

declare(strict_types=1);

namespace App\Core;

use League\Container\Container as LeagueContainer;

class Container
{
    protected static $instance;

    public static function getInstance(): LeagueContainer
    {
        if (static::$instance === null) {
            static::$instance = new LeagueContainer();
        }

        return static::$instance;
    }
}