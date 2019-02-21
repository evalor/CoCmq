<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:26
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 修改队列属性
 * Class SetQueueAttributes
 * @package evalor\coCloudMessageQueue\Actions
 */
class SetQueueAttributes extends Action
{
    protected $Action = 'SetQueueAttributes';
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
     * @return SetQueueAttributes
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
     * @return SetQueueAttributes
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
     * @return SetQueueAttributes
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
     * @return SetQueueAttributes
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
     * @return SetQueueAttributes
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
     * @return SetQueueAttributes
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
     * @return SetQueueAttributes
     */
    public function setRewindSeconds($rewindSeconds)
    {
        $this->rewindSeconds = $rewindSeconds;
        return $this;
    }
}