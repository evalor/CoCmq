<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 修改主题属性
 * Class SetTopicAttributes
 * @package evalor\coCloudMessageQueue\Actions
 */
class SetTopicAttributes extends Action
{
    protected $Action = 'SetTopicAttributes';
    protected $topicName;
    protected $maxMsgSize;

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
     * @return SetTopicAttributes
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
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
     * @return SetTopicAttributes
     */
    public function setMaxMsgSize($maxMsgSize)
    {
        $this->maxMsgSize = $maxMsgSize;
        return $this;
    }
}