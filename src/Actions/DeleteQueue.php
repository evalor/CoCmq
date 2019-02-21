<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:26
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 删除队列
 * Class DeleteQueue
 * @package evalor\coCloudMessageQueue\Actions
 */
class DeleteQueue extends Action
{
    protected $Action = 'DeleteQueue';
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