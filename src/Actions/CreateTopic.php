<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 创建主题
 * Class CreateTopic
 * @package evalor\coCloudMessageQueue\Actions
 */
class CreateTopic extends Action
{
    protected $Action = 'CreateTopic';
    protected $topicName;
    protected $maxMsgSize;
    protected $filterType;

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
     * @return CreateTopic
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
     * @return CreateTopic
     */
    public function setMaxMsgSize($maxMsgSize)
    {
        $this->maxMsgSize = $maxMsgSize;
        return $this;
    }

    /**
     * FilterTypeGetter
     * @return mixed
     */
    public function getFilterType()
    {
        return $this->filterType;
    }

    /**
     * FilterTypeSetter
     * @param mixed $filterType
     * @return CreateTopic
     */
    public function setFilterType($filterType)
    {
        $this->filterType = $filterType;
        return $this;
    }
}