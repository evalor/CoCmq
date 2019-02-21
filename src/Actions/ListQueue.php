<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:26
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 获取队列列表
 * Class ListQueue
 * @package evalor\coCloudMessageQueue\Actions
 */
class ListQueue extends Action
{
    protected $Action = 'ListQueue';
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
     * @return ListQueue
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
     * @return ListQueue
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
     * @return ListQueue
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
}