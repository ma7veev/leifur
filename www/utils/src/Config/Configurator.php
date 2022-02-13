<?php

namespace Leifur\Utils\Config;

use Leifur\Domain\Base\ConfigInterface;

abstract class Configurator
{

    public function configure(array $params = []): ConfigInterface
    {
        $basicConfig = new Config();
        foreach ($this->parseSections($params) as $name => $config) {
            $basicConfig->add($name, $config);
        }

        return $basicConfig;
    }

    /**
     * @param $params
     * @return Configurable[]
     */
    private function parseSections($params): iterable
    {
        foreach ($params as $section => $configParams) {
            /** @var array $configParams */
            $className = $this->getSectionsNamespace() . "\\" . strtoupper($section) . "Config";
            if (class_exists($className) && is_subclass_of($className, Configurable::class)) {
                yield $section => new $className($configParams);
            }
        }
    }

    abstract protected function getSectionsNamespace(): string;
}