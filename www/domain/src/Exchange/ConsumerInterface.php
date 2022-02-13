<?php

namespace Leifur\Domain\Exchange;

interface ConsumerInterface
{
    public function receive(iterable $data);
}