<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 发送消息
 * Class SendMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class SendMessage extends Action
{
    protected $Action = 'SendMessage';
    protected $queueName;
    protected $msgBody;
    protected $delaySeconds;

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
     * @return SendMessage
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
        return $this;
    }

    /**
     * MsgBodyGetter
     * @return mixed
     */
    public function getMsgBody()
    {
        return $this->msgBody;
    }

    /**
     * MsgBodySetter
     * @param mixed $msgBody
     * @return SendMessage
     */
    public function setMsgBody($msgBody)
    {
        $this->msgBody = $msgBody;
        return $this;
    }

    /**
     * DelaySecondsGetter
     * @return mixed
     */
    public function getDelaySeconds()
    {
        return $this->delaySeconds;
    }

    /**
     * DelaySecondsSetter
     * @param mixed $delaySeconds
     * @return SendMessage
     */
    public function setDelaySeconds($delaySeconds)
    {
        $this->delaySeconds = $delaySeconds;
        return $this;
    }
}