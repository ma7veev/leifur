<?php

namespace Leifur\Utils\Logger;

use Psr\Log\LoggerInterface;

class LoggerFacade
{
    private static ?LoggerInterface $logger = null;

    private static function getLogger(): LoggerInterface
    {
        if (!(self::$logger instanceof LoggerInterface)) {
            self::$logger = new Logger();
        }

        return self::$logger;
    }

    public static function debug(string $message)
    {
        self::getLogger()->debug($message);
    }

    public static function info(string $message)
    {
        self::getLogger()->info($message);
    }

    public static function warning(string $message)
    {
        self::getLogger()->warning($message);
    }

    public static function error(string $message)
    {
        self::getLogger()->error($message);
    }
}