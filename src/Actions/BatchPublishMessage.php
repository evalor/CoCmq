<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 批量发布消息
 * Class BatchPublishMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class BatchPublishMessage extends Action
{
    protected $Action = 'BatchPublishMessage';
    protected $topicName;
    protected $routingKey;
    protected $msgTags = array();
    protected $messages = array();

    /**
     * TopicNameGetter
     * @return mixed
     */
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * TopicNameSetter
     * @param mixed $topicName
     * @return BatchPublishMessage
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
        return $this;
    }

    /**
     * RoutingKeyGetter
     * @return mixed
     */
    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    /**
     * RoutingKeySetter
     * @param mixed $routingKey
     * @return BatchPublishMessage
     */
    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
        return $this;
    }


    /**
     * MsgTagSetter
     * @param $msgTag
     * @return BatchPublishMessage
     */
    public function addMsgTag($msgTag)
    {
        array_push($this->msgTags, $msgTag);
        return $this;
    }

    /**
     * MsgTagGetter
     * @return array
     */
    public function getMsgTag()
    {
        return $this->msgTags;
    }

    /**
     * MultiMsgTagSetter
     * @param array $msgTags
     * @return BatchPublishMessage
     */
    public function setMsgTag(array $msgTags)
    {
        $this->msgTags = $msgTags;
        return $this;
    }

    /**
     * MsgBodySetter
     * @param $msgBody
     * @return BatchPublishMessage
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
     * @return BatchPublishMessage
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
        foreach ($this->msgTags as $index => $msgTag) {
            $name = "msgTag.{$index}";
            $this->$name = $msgTag;
        }
        unset($this->msgTags);
        unset($this->messages);
        return parent::toArray($columns, $filter);
    }
}