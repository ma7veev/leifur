<?php

namespace Leifur\Domain\Task;

use Leifur\Domain\Base\ServiceInterface;
use Leifur\Domain\Task\Subtask\Subtask;

abstract class TaskStage
{
    protected Task $task;

    public function __construct()
    {
    }

    public function setTask(Task $task)
    {
        $this->task = $task;
    }

    public function setTaskCurrentStage(TaskStage $stage)
    {
        $this->task->setCurrentStage($stage);
    }

    public function handle()
    {
        $service = $this->getService();
        $subtaskPool = $this->getSubtasks();
        foreach ($subtaskPool as $subtask) {
            /** @var Subtask $subtask */
            foreach ($service->work($subtask) as $subtaskOutput) {
                $this->saveSubtask($subtaskOutput);
            }
        }
        $this->send();
    }

    abstract protected function getService(): ServiceInterface;

    /**
     * @return Subtask[]
     */
    abstract protected function getSubtasks(): iterable;

    abstract protected function saveSubtask(Subtask $subtask): void;

    abstract protected function send(): void;
}