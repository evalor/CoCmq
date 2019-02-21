<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 删除消息
 * Class DeleteMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class DeleteMessage extends Action
{
    protected $Action = 'DeleteMessage';
    protected $queueName;
    protected $receiptHandle;

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
     * @return DeleteMessage
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
        return $this;
    }

    /**
     * ReceiptHandleGetter
     * @return mixed
     */
    public function getReceiptHandle()
    {
        return $this->receiptHandle;
    }

    /**
     * ReceiptHandleSetter
     * @param mixed $receiptHandle
     * @return DeleteMessage
     */
    public function setReceiptHandle($receiptHandle)
    {
        $this->receiptHandle = $receiptHandle;
        return $this;
    }
}