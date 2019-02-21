<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 批量发送消息
 * Class BatchSendMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class BatchSendMessage extends Action
{
    protected $Action = 'BatchSendMessage';
    protected $queueName;
    protected $delaySeconds;
    protected $messages = array();

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
     * @return BatchSendMessage
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
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
     * @return BatchSendMessage
     */
    public function setDelaySeconds($delaySeconds)
    {
        $this->delaySeconds = $delaySeconds;
        return $this;
    }

    /**
     * MsgBodySetter
     * @param $msgBody
     * @return BatchSendMessage
     */
    public function addMessage($msgBody)
    {
        array_push($this->messages, $msgBody);
        return $this;
    }

    /**
     * MessagesGetter
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * MultiMsgBodySetter
     * @param array $allMsgBody
     * @return BatchSendMessage
     */
    public function setMessages(array $allMsgBody)
    {
        $this->messages = $allMsgBody;
        return $this;
    }

    /**
     * MultiToArray
     * @param array|null $columns
     * @param null $filter
     * @return array
     */
    public function toArray(array $columns = null, $filter = null): array
    {
        foreach ($this->messages as $index => $message) {
            $name = "msgBody.{$index}";
            $this->$name = $message;
        }
        unset($this->messages);
        return parent::toArray($columns, $filter);
    }
}