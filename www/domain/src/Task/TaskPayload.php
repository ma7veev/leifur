<?php

namespace Leifur\Domain\Task;

use Throwable;
use Leifur\Domain\Task\Exceptions\TaskPayloadError;

class TaskPayload
{
    private string $taskId;
    private int $currentStage;

    public function __construct(array $data)
    {
        if (empty($data['taskId']) || empty($data['currentStage'])) {
            throw new TaskPayloadError("Error creating payload from message");
        }
        $this->taskId = strval($data['taskId']);
        $this->currentStage = intval($data['currentStage']);
    }

    public function getCurrentStage(): int
    {
        return $this->currentStage;
    }

    public function getTaskId(): string
    {
        return $this->taskId;
    }
}