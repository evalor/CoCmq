<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 删除主题
 * Class DeleteTopic
 * @package evalor\coCloudMessageQueue\Actions
 */
class DeleteTopic extends Action
{
    protected $Action = 'DeleteTopic';
    protected $topicName;

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
     */
    public function setTopicName($topicName): void
    {
        $this->topicName = $topicName;
    }

}