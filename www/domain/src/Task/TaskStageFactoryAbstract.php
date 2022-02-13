<?php

namespace Leifur\Domain\Task;

use Leifur\Domain\Task\Exceptions\StageDetectionError;
use Leifur\Utils\Logger\LoggerFacade;

abstract class TaskStageFactoryAbstract
{
    abstract protected function getStageMap(): array;

    abstract protected function createWithDependencies(string $name): TaskStage;

    public function create(TaskPayload $payload): TaskStage
    {
        $stageId = $payload->getCurrentStage();
        $taskStagesMap = $this->getStageMap();
        if (isset($taskStagesMap[$stageId])
            && class_exists($taskStagesMap[$stageId])
            && is_subclass_of($taskStagesMap[$stageId], TaskStage::class)
        ) {
            $name = $taskStagesMap[$stageId];
            LoggerFacade::debug("detect stage $name");

            return $this->createWithDependencies($name);
        }
        throw new StageDetectionError("Can't detect stage");
    }
}