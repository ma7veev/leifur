<?php

namespace Leifur\Domain\Task;

class Task
{
    private string $taskId;
    private TaskStage $stage;

    public function __construct(TaskPayload $payload, TaskStage $stage)
    {
        $this->taskId = $payload->getTaskId();
        $this->setCurrentStage($stage);
    }

    public function getTaskId(): string
    {
        return $this->taskId;
    }

    public function handle()
    {
        $this->stage->handle();
        $this->save();
    }

    public function setCurrentStage(TaskStage $stage)
    {
        $this->stage = $stage;
        $this->stage->setTask($this);
    }

    private function save()
    {
    }
}