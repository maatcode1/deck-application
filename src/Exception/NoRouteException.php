<?php

namespace Deck\Application\Exception;

class NoRouteException extends AbstractException implements ExceptionInterface
{
    public function __invoke()
    {
       var_dump(222);
    }

}