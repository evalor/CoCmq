<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 获取订阅属性
 * Class GetSubscriptionAttributes
 * @package evalor\coCloudMessageQueue\Actions
 */
class GetSubscriptionAttributes extends Action
{
    protected $Action = 'GetSubscriptionAttributes';
    protected $topicName;
    protected $subscriptionName;

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
     * @return GetSubscriptionAttributes
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
     * @return GetSubscriptionAttributes
     */
    public function setSubscriptionName($subscriptionName)
    {
        $this->subscriptionName = $subscriptionName;
        return $this;
    }

}