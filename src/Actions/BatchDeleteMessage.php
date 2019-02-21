<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:27
 */

namespace evalor\coCloudMessageQueue\Actions;

/**
 * 批量删除消息
 * Class BatchDeleteMessage
 * @package evalor\coCloudMessageQueue\Actions
 */
class BatchDeleteMessage extends Action
{
    public $Action = 'BatchDeleteMessage';
    protected $queueName;
    protected $receiptHandles = array();

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
     * @return BatchDeleteMessage
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
        return $this;
    }

    /**
     * ReceiptHandleSetter
     * @param $receiptHandle
     * @return $this
     */
    public function addReceiptHandle($receiptHandle)
    {
        array_push($this->receiptHandles, $receiptHandle);
        return $this;
    }

    /**
     * MessagesGetter
     * @return array
     */
    public function getReceiptHandles()
    {
        return $this->receiptHandles;
    }

    /**
     * ReceiptHandlesSetter
     * @param array $receiptHandles
     * @return $this
     */
    public function setReceiptHandles(array $receiptHandles)
    {
        $this->receiptHandles = $receiptHandles;
        return $this;
    }

    /**
     * MultiToArray
     * @param array|null $columns
     * @param null $filter
     * @return array
     */
    public function toArray(array $columns = null, $filter = null): array
    {
        foreach ($this->receiptHandles as $index => $receiptHandle) {
            $name = "receiptHandle.{$index}";
            $this->$name = $receiptHandle;
        }
        unset($this->receiptHandles);
        return parent::toArray($columns, $filter);
    }
}