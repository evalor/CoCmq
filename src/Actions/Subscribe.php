<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 创建订阅
 * Class Subscribe
 * @package evalor\coCloudMessageQueue\Actions
 */
class Subscribe extends Action
{
    protected $Action = 'Subscribe';
    protected $topicName;
    protected $subscriptionName;
    protected $protocol;
    protected $endpoint;
    protected $notifyStrategy;
    protected $notifyContentFormat;
    protected $filterTags = array();
    protected $bindingKeys = array();

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
     * @return Subscribe
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
        return $this;
    }

    /**
     * SubscriptionNameGetter
     * @return mixed
     */
    public function getSubscriptionName()
    {
        return $this->subscriptionName;
    }

    /**
     * SubscriptionNameSetter
     * @param mixed $subscriptionName
     * @return Subscribe
     */
    public function setSubscriptionName($subscriptionName)
    {
        $this->subscriptionName = $subscriptionName;
        return $this;
    }

    /**
     * ProtocolGetter
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * ProtocolSetter
     * @param mixed $protocol
     * @return Subscribe
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * EndpointGetter
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * EndpointSetter
     * @param mixed $endpoint
     * @return Subscribe
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * NotifyStrategyGetter
     * @return mixed
     */
    public function getNotifyStrategy()
    {
        return $this->notifyStrategy;
    }

    /**
     * NotifyStrategySetter
     * @param mixed $notifyStrategy
     * @return Subscribe
     */
    public function setNotifyStrategy($notifyStrategy)
    {
        $this->notifyStrategy = $notifyStrategy;
        return $this;
    }

    /**
     * NotifyContentFormatGetter
     * @return mixed
     */
    public function getNotifyContentFormat()
    {
        return $this->notifyContentFormat;
    }

    /**
     * NotifyContentFormatSetter
     * @param mixed $notifyContentFormat
     * @return Subscribe
     */
    public function setNotifyContentFormat($notifyContentFormat)
    {
        $this->notifyContentFormat = $notifyContentFormat;
        return $this;
    }

    /**
     * FilterTagsSetter
     * @param $filterTags
     * @return Subscribe
     */
    public function addFilterTags($filterTags)
    {
        array_push($this->filterTags, $filterTags);
        return $this;
    }

    /**
     * FilterTagsGetter
     * @return array
     */
    public function getFilterTags()
    {
        return $this->filterTags;
    }

    /**
     * MultiFilterTagsSetter
     * @param array $filterTags
     * @return Subscribe
     */
    public function setFilterTags(array $filterTags)
    {
        $this->filterTags = array_values($filterTags);
        return $this;
    }

    /**
     * BindingKeySetter
     * @param $bindingKey
     * @return Subscribe
     */
    public function addBindingKey($bindingKey)
    {
        array_push($this->bindingKeys, $bindingKey);
        return $this;
    }

    /**
     * BindingKeysGetter
     * @return array
     */
    public function getBindingKeys()
    {
        return $this->bindingKeys;
    }

    /**
     * MultiBindingKeySetter
     * @param array $bindingKeys
     * @return Subscribe
     */
    public function setBindingKeys(array $bindingKeys)
    {
        $this->bindingKeys = array_values($bindingKeys);
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
        foreach ($this->filterTags as $index => $filterTag) {
            $name = "filterTag.{$index}";
            $this->$name = $filterTag;
        }
        foreach ($this->bindingKeys as $index => $bindingKey) {
            $name = "bindingKey.{$index}";
            $this->$name = $bindingKey;
        }
        unset($this->filterTags);
        unset($this->bindingKeys);
        return parent::toArray($columns, $filter);
    }
}