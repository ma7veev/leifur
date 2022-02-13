<?php

namespace Leifur\Utils\Config;

use Leifur\Domain\Base\ConfigInterface;
use Leifur\Utils\Config\Exceptions\ConfigAlreadySetException;
use Leifur\Utils\Config\Exceptions\NotFoundConfigException;

/**
 * @method \Leifur\Utils\Config\Sections\ParserConfig getParserConfig()
 * @param $sections Configurable[]
 */
class Config implements ConfigInterface
{
    private array $sections = [];

    /**
     * @param string       $name
     * @param Configurable $config
     * @return void
     * @throws ConfigAlreadySetException
     */
    public function add(string $name, Configurable $config): void
    {
        $name = "get". ucfirst($name) . "Config";
        if (!isset($this->sections[$name])) {
            $this->sections[$name] = $config;

            return;
        }

        throw new ConfigAlreadySetException();
    }

    public function __call(string $name, array $arguments): Configurable
    {
        if (isset($this->sections[$name])) {
            return $this->sections[$name];
        }

        throw new NotFoundConfigException();
    }
}