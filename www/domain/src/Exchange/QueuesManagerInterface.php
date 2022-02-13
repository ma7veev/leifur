<?php

namespace Leifur\Domain\Exchange;

interface QueuesManagerInterface
{
    /**
     * @return string[]
     */
    public function getQueuesList(): array;

    public function createQueue(string $queue): bool;

    public function bindQueues(array $queuesList): void;

    public function getMessagesByQueue(string $queue): iterable;

    public function extractMessage(string $queue): array;

    public function sendMessage(string $queue, array $message): void;
}