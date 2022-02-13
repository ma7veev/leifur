<?php

namespace Leifur\Domain\Exchange;

class DataCollector
{
    private QueuesManagerInterface $queuesManager;
    private ConsumerManagerInterface $consumerManager;

    public function __construct(QueuesManagerInterface $queuesManager, ConsumerManagerInterface $consumerManager)
    {
        $this->queuesManager = $queuesManager;
        $this->consumerManager = $consumerManager;
    }

    public function collect(string $group, string $priority)
    {
        $consumer = $this->consumerManager->getConsumerByGroup($group);
        $consumer->receive($this->queuesManager->getMessagesByQueue($priority));
    }
}