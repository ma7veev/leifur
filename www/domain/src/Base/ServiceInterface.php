<?php

namespace Leifur\Domain\Base;

use Leifur\Domain\Task\Subtask\Subtask;

interface ServiceInterface
{
    // public static function getInstance(): self;

    public function work(Subtask $subtask): iterable;
}