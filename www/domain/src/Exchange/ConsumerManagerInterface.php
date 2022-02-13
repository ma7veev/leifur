<?php

namespace Leifur\Domain\Exchange;

interface ConsumerManagerInterface
{
    public function getConsumerByGroup(string $group): ConsumerInterface;
}