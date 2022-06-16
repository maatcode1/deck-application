<?php

namespace Deck\Tools;

class Server
{
    public static function getHostName(): string
    {
        $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
        $hostname = $_SERVER['HTTP_HOST'];
        return $protocol . '://' . $hostname;
    }

    public static function getProtocol (): string
    {
        return stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
    }
}