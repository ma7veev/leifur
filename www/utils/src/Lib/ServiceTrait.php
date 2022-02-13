<?php

namespace Leifur\Utils\Lib;

use Leifur\Domain\Base\ConfigInterface;
use Leifur\Domain\Base\ServiceInterface;
use Leifur\Utils\Config\Exceptions\ServiceInitException;
use Psr\Container\ContainerInterface;

trait ServiceTrait
{
    private static ?ContainerInterface $container = null;
    private static ?ConfigInterface $config = null;
    private static ?ServiceInterface $service = null;

    private function __construct()
    {
    }

    public static function getInstance(): ServiceInterface
    {
        if (self::$service instanceof ServiceInterface) {
            return self::$service;
        }

        return new self();
    }

    public static function preInit(ContainerInterface $container, ConfigInterface $config): void
    {
        self::setContainer($container);
        self::setConfig($config);
    }

    private static function setContainer(ContainerInterface $container): void
    {
        if (!(self::$container instanceof ContainerInterface)) {
            self::$container = $container;
        }
    }

    private static function setConfig(ConfigInterface $config): void
    {
        if (!(self::$config instanceof ConfigInterface)) {
            self::$config = $config;
        }
    }

    private function getContainer(): ContainerInterface
    {
        if (!(self::$container instanceof ContainerInterface)) {
            throw new ServiceInitException('No container injected');
        }

        return self::$container;
    }

    private function getConfig(): ConfigInterface
    {
        if (!(self::$config instanceof ConfigInterface)) {
            throw new ServiceInitException('No config injected');
        }

        return self::$config;
    }
}