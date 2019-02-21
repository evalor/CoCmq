<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 消费消息
 * Class ReceiveMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class ReceiveMessage extends Action
{
    protected $Action = 'ReceiveMessage';
    protected $queueName;
    protected $pollingWaitSeconds;

    /**
     * QueueNameGetter
     * @return mixed
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * QueueNameSetter
     * @param mixed $queueName
     */
    public function setQueueName($queueName): void
    {
        $this->queueName = $queueName;
    }

    /**
     * PollingWaitSecondsGetter
     * @return mixed
     */
    public function getPollingWaitSeconds()
    {
        return $this->pollingWaitSeconds;
    }

    /**
     * PollingWaitSecondsSetter
     * @param mixed $pollingWaitSeconds
     */
    public function setPollingWaitSeconds($pollingWaitSeconds): void
    {
        $this->pollingWaitSeconds = $pollingWaitSeconds;
    }
}