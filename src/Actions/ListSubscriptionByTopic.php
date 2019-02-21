<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:28
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 获取订阅列表
 * Class ListSubscriptionByTopic
 * @package evalor\coCloudMessageQueue\Actions
 */
class ListSubscriptionByTopic extends Action
{
    protected $Action = 'ListSubscriptionByTopic';
    protected $topicName;
    protected $searchWord;
    protected $offset;
    protected $limit;

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
     * @return ListSubscriptionByTopic
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
        return $this;
    }

    /**
     * SearchWordGetter
     * @return mixed
     */
    public function getSearchWord()
    {
        return $this->searchWord;
    }

    /**
     * SearchWordSetter
     * @param mixed $searchWord
     * @return ListSubscriptionByTopic
     */
    public function setSearchWord($searchWord)
    {
        $this->searchWord = $searchWord;
        return $this;
    }

    /**
     * OffsetGetter
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * OffsetSetter
     * @param mixed $offset
     * @return ListSubscriptionByTopic
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * LimitGetter
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * LimitSetter
     * @param mixed $limit
     * @return ListSubscriptionByTopic
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }


}