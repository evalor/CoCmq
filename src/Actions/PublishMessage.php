<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 发布消息
 * Class PublishMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class PublishMessage extends Action
{
    protected $Action = 'PublishMessage';
    protected $topicName;
    protected $msgBody;
    protected $routingKey;
    protected $msgTags = array();

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
     * @return PublishMessage
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
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
     * @return PublishMessage
     */
    public function setMsgBody($msgBody)
    {
        $this->msgBody = $msgBody;
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
     * @return PublishMessage
     */
    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
        return $this;
    }


    /**
     * MsgTagSetter
     * @param $msgTag
     * @return PublishMessage
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
     * @return PublishMessage
     */
    public function setMsgTag(array $msgTags)
    {
        $this->msgTags = $msgTags;
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
        foreach ($this->msgTags as $index => $msgTag) {
            $name = "msgTag.{$index}";
            $this->$name = $msgTag;
        }
        unset($this->msgTags);
        return parent::toArray($columns, $filter);
    }
}