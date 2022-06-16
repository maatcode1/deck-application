<?php

namespace Deck\Application\Factory;

use League\Container\Container;

interface FactoryInterface
{
    public static function create(Container $container);
}