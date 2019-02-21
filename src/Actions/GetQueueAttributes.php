<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:26
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 获取队列属性
 * Class GetQueueAttributes
 * @package evalor\coCloudMessageQueue\Actions
 */
class GetQueueAttributes extends Action
{
    protected $Action = 'GetQueueAttributes';
    protected $queueName;

    /**
     * QueueNameGetter
     * @return mixed
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * QueueNameSetter
     * @param mixed $queueName
     */
    public function setQueueName($queueName): void
    {
        $this->queueName = $queueName;
    }
}