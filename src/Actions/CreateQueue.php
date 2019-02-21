<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:26
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 创建队列
 * Class CreateQueue
 * @package evalor\coCloudMessageQueue\Actions
 */
class CreateQueue extends Action
{
    protected $Action = 'CreateQueue';
    protected $queueName;
    protected $maxMsgHeapNum;
    protected $pollingWaitSeconds;
    protected $visibilityTimeout;
    protected $maxMsgSize;
    protected $msgRetentionSeconds;
    protected $rewindSeconds;

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
     * @return CreateQueue
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
        return $this;
    }

    /**
     * MaxMsgHeapNumGetter
     * @return mixed
     */
    public function getMaxMsgHeapNum()
    {
        return $this->maxMsgHeapNum;
    }

    /**
     * MaxMsgHeapNumSetter
     * @param mixed $maxMsgHeapNum
     * @return CreateQueue
     */
    public function setMaxMsgHeapNum($maxMsgHeapNum)
    {
        $this->maxMsgHeapNum = $maxMsgHeapNum;
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
     * @return CreateQueue
     */
    public function setPollingWaitSeconds($pollingWaitSeconds)
    {
        $this->pollingWaitSeconds = $pollingWaitSeconds;
        return $this;
    }

    /**
     * VisibilityTimeoutGetter
     * @return mixed
     */
    public function getVisibilityTimeout()
    {
        return $this->visibilityTimeout;
    }

    /**
     * VisibilityTimeoutSetter
     * @param mixed $visibilityTimeout
     * @return CreateQueue
     */
    public function setVisibilityTimeout($visibilityTimeout)
    {
        $this->visibilityTimeout = $visibilityTimeout;
        return $this;
    }

    /**
     * MaxMsgSizeGetter
     * @return mixed
     */
    public function getMaxMsgSize()
    {
        return $this->maxMsgSize;
    }

    /**
     * MaxMsgSizeSetter
     * @param mixed $maxMsgSize
     * @return CreateQueue
     */
    public function setMaxMsgSize($maxMsgSize)
    {
        $this->maxMsgSize = $maxMsgSize;
        return $this;
    }

    /**
     * MsgRetentionSecondsGetter
     * @return mixed
     */
    public function getMsgRetentionSeconds()
    {
        return $this->msgRetentionSeconds;
    }

    /**
     * MsgRetentionSecondsSetter
     * @param mixed $msgRetentionSeconds
     * @return CreateQueue
     */
    public function setMsgRetentionSeconds($msgRetentionSeconds)
    {
        $this->msgRetentionSeconds = $msgRetentionSeconds;
        return $this;
    }

    /**
     * RewindSecondsGetter
     * @return mixed
     */
    public function getRewindSeconds()
    {
        return $this->rewindSeconds;
    }

    /**
     * RewindSecondsSetter
     * @param mixed $rewindSeconds
     * @return CreateQueue
     */
    public function setRewindSeconds($rewindSeconds)
    {
        $this->rewindSeconds = $rewindSeconds;
        return $this;
    }
}