<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 批量消费消息
 * Class BatchReceiveMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class BatchReceiveMessage extends Action
{
    protected $Action = 'BatchReceiveMessage';
    protected $queueName;
    protected $numOfMsg;
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
     * @return BatchReceiveMessage
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
        return $this;
    }

    /**
     * NumOfMsgGetter
     * @return mixed
     */
    public function getNumOfMsg()
    {
        return $this->numOfMsg;
    }

    /**
     * NumOfMsgSetter
     * @param mixed $numOfMsg
     * @return BatchReceiveMessage
     */
    public function setNumOfMsg($numOfMsg)
    {
        $this->numOfMsg = $numOfMsg;
        return $this;
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
     * @return BatchReceiveMessage
     */
    public function setPollingWaitSeconds($pollingWaitSeconds)
    {
        $this->pollingWaitSeconds = $pollingWaitSeconds;
        return $this;
    }
}