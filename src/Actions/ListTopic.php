<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 获取主题列表
 * Class ListTopic
 * @package evalor\coCloudMessageQueue\Actions
 */
class ListTopic extends Action
{
    protected $Action = 'ListTopic';
    protected $searchWord;
    protected $offset;
    protected $limit;

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
     * @return ListTopic
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
     * @return ListTopic
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
     * @return ListTopic
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

}