<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 获取主题属性
 * Class GetTopicAttributes
 * @package evalor\coCloudMessageQueue\Actions
 */
class GetTopicAttributes extends Action
{
    protected $Action = 'GetTopicAttributes';
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