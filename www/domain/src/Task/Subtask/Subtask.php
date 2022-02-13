<?php

namespace Leifur\Domain\Task\Subtask;

class Subtask
{
    private string $taskId;
    private array $data;

    public function __construct(string $taskId, array $data)
    {
        $this->taskId = $taskId;
        $this->data = $data;
    }

    public function getTaskId(): string
    {
        return $this->taskId;
    }

    public function getData(): array
    {
        return $this->data;
    }
}