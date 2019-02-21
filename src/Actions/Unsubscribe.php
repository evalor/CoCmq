<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 删除订阅
 * Class Unsubscribe
 * @package evalor\coCloudMessageQueue\Actions
 */
class Unsubscribe extends Action
{
    protected $Action = 'Unsubscribe';
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
     * @return Unsubscribe
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
     * @return Unsubscribe
     */
    public function setSubscriptionName($subscriptionName)
    {
        $this->subscriptionName = $subscriptionName;
        return $this;
    }

}