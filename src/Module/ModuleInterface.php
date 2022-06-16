<?php

namespace Deck\Application\Module;

use League\Container\Container;

interface ModuleInterface
{
    public function onBootstrap(Container $container);

    public function getConfig();

    public function initView();

    public function getRouting();

    public function initServices();

}