<?php

namespace Deck\Application\Router;

use Deck\Application\Exception\NoRouteException;
use Deck\Application\Http\Request;
use League\Container\Container;
use Deck\Tools\Server;

class RouteManager
{
    /**
     * @throws NoRouteException
     */
    public function dispatch (array $routing, Container $container, array $params = [])
    {
        $controller = null;
        $action = null;
        $url = $_SERVER['REQUEST_URI'];
        foreach ($routing as $urlFormat => $route) {
            if (preg_match('/' . $urlFormat . "$/", $url)) {
                $controller = $route['controller'];
                $action = $route['action'];
                $route['module'] = explode("\\", $controller, 2)[0];
                if (isset($route['params'])) {
                    $route['params'] = $this->storeParams($route['params'], $url);
                }
                $container->get(Request::class)->setProps($route);
            }
        }
        if ($controller && $action) {
            return $container->get($controller)->{$action . 'Action'}();
        }
        else {
            throw new NoRouteException($url . ' not found');
        }
    }

    protected function storeParams ($params, $url): array
    {
        $url = trim(preg_replace('/' . preg_quote(Server::getProtocol(), '/') . '/', '', $url, 1), '\/');
        $arr = explode('/', $url);
        $prevKey = 0;
        $arr2 = [];
        foreach ($arr as $key => $value) {
            if ($key % 2 && $key > 1) {
                if (in_array($arr[$prevKey], $params) !== false) {
                    $arr2[$arr[$prevKey]] = $value;
                }
            }
            else {
                $prevKey = $key;
            }
        }
        return $arr2;
    }
}