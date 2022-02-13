<?php

namespace Leifur\Utils\Config;

use Leifur\Utils\Config\Exceptions\NotFoundConfigException;
use Leifur\Domain\Base\ConfigInterface;

abstract class Configurable implements ConfigInterface
{
    protected array $config = [];

    public function __construct(array $params = [])
    {
        foreach ($params as $key => $value) {
            $this->config["get" . ucfirst($key)] = $value;
        }
    }

    /**
     * @param string $name
     * @param array  $arguments
     * @return mixed
     * @throws NotFoundConfigException
     */
    public function __call(string $name, array $arguments)
    {
        if (isset($this->config[$name])) {
            return $this->config[$name];
        }

        throw new NotFoundConfigException();
    }
}