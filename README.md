Tencent Cloud Message Queue swoole coroutine client
============

还没有完整测试的CMQ消息队列协程客户端，基于Swoole协程客户端，需要PHP版本7.1+，以及Swoole拓展

## 安装方法
```bash
composer require evalor/co-cmq
```

## 使用方法

```php
<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-21
 * Time: 19:27
 */

namespace evalor\coCloudMessageQueue;

use evalor\coCloudMessageQueue\Actions\BatchDeleteMessage;
use evalor\coCloudMessageQueue\Actions\BatchReceiveMessage;
use evalor\coCloudMessageQueue\Actions\BatchSendMessage;
use evalor\coCloudMessageQueue\Actions\CreateQueue;
use evalor\coCloudMessageQueue\Actions\DeleteMessage;
use evalor\coCloudMessageQueue\Actions\DeleteQueue;
use evalor\coCloudMessageQueue\Actions\GetQueueAttributes;
use evalor\coCloudMessageQueue\Actions\ListQueue;
use evalor\coCloudMessageQueue\Actions\ReceiveMessage;
use evalor\coCloudMessageQueue\Actions\SendMessage;
use evalor\coCloudMessageQueue\Actions\SetQueueAttributes;
use evalor\coCloudMessageQueue\Exception\CMQException;
use evalor\coCloudMessageQueue\Exception\CMQNoMessageException;

require_once 'vendor/autoload.php';

go(function () {

    // 初始化请求客户端
    $secretId = 'AKID0wgFdqBngIm6FDFa0FIBsTs577yh6dqy';
    $secretKey = '5zESSSK1Xr6LVWM1V6Tls063xjLm8QYU';
    $account = new CMQAccount($secretId, $secretKey, CMQAccount::ENDPOINT_GZ_OUTER);
    $client = new CMQClient($account);

    // 获取队列列表 ListQueue
    $actionListQueue = new ListQueue;
    $queueList = $client->doAction($actionListQueue);
    echo "Api-ListQueue: " . json_encode($queueList['queueList']) . "\n";

    // 创建队列 CreateQueue
    $queueName = 'test' . time();
    $actionCreateQueue = new CreateQueue;
    $actionCreateQueue->setQueueName($queueName);
    $response = $client->doAction($actionCreateQueue);
    echo "Api-CreateQueue: " . json_encode($response) . "\n";

    // 修改队列属性
    $actionSetQueueAttributes = new SetQueueAttributes;
    $actionSetQueueAttributes->setQueueName($queueName);
    $actionSetQueueAttributes->setVisibilityTimeout(30);
    $response = $client->doAction($actionSetQueueAttributes);
    echo "Api-SetQueueAttributes: " . json_encode($response) . "\n";

    // 获取队列属性
    $actionGetQueueAttributes = new GetQueueAttributes;
    $actionGetQueueAttributes->setQueueName($queueName);
    $response = $client->doAction($actionGetQueueAttributes);
    echo "Api-GetQueueAttributes: " . json_encode($response) . "\n";

    // 删除队列 DeleteQueue
    $actionDeleteQueue = new DeleteQueue;
    $actionDeleteQueue->setQueueName($queueName);
    $response = $client->doAction($actionDeleteQueue);
    echo "Api-DeleteQueue: " . json_encode($response) . "\n";

    // 发送消息 test1550774601
    $actionSendMessage = new SendMessage;
    $actionSendMessage->setQueueName('test1550774601');
    $actionSendMessage->setMsgBody('test1550774601-test');
    $response = $client->doAction($actionSendMessage);
    echo "Api-SendMessage: " . json_encode($response) . "\n";

    // 批发消息
    $actionBatchSendMessage = new BatchSendMessage;
    $actionBatchSendMessage->setQueueName('test1550774601');
    $actionBatchSendMessage->addMessage('test1550774601-test1');
    $actionBatchSendMessage->addMessage('test1550774601-test2');
    $actionBatchSendMessage->setMessages(['test1550774601-test1', 'test1550774601-test2']);
    $response = $client->doAction($actionBatchSendMessage);
    echo "Api-BatchSendMessage: " . json_encode($response) . "\n";

    // 消费消息和删除 (捕获CMQNoMessageException可以得知无消息需要继续轮询)
    $actionReceiveMessage = new ReceiveMessage;
    $actionReceiveMessage->setQueueName('test1550774601');
    $actionReceiveMessage->setPollingWaitSeconds(1);
    try {
        $response = $client->doAction($actionReceiveMessage);

        // 处理完成后删除消息
        $receiptHandle = $response['receiptHandle'];
        $actionDeleteMessage = new DeleteMessage;
        $actionDeleteMessage->setQueueName('test1550774601');
        $actionDeleteMessage->setReceiptHandle($receiptHandle);
        $deleteResponse = $client->doAction($actionDeleteMessage);

        echo "Api-ReceiveMessage: " . json_encode($response) . "\n";
        echo "Api-DeleteMessage: " . json_encode($deleteResponse) . "\n";

    } catch (CMQException $exception) {
        if ($exception instanceof CMQNoMessageException) {
            echo "Api-ReceiveMessage: no message\n";
        } else {
            echo "Api-BatchReceiveMessage: " . $exception->getMessage() . "\n";
        }
    }

    // 批量消费消息和删除 (捕获CMQNoMessageException可以得知无消息需要继续轮询)
    $actionBatchReceiveMessage = new BatchReceiveMessage;
    $actionBatchReceiveMessage->setQueueName('test1550774601');
    $actionBatchReceiveMessage->setNumOfMsg(16);
    $actionBatchReceiveMessage->setPollingWaitSeconds(30);
    try {
        $response = $client->doAction($actionBatchReceiveMessage);
        $receiptHandles = array();
        foreach ($response['msgInfoList'] as $info) {
            array_push($receiptHandles, $info['receiptHandle']);
        }

        // 处理完成后删除消息
        $actionBatchDeleteMessage = new BatchDeleteMessage;
        $actionBatchDeleteMessage->setQueueName('test1550774601');
        $actionBatchDeleteMessage->setReceiptHandles($receiptHandles);
        $batchDeleteResponse = $client->doAction($actionBatchDeleteMessage);

        echo "Api-BatchReceiveMessage: " . json_encode($response) . "\n";
        echo "Api-BatchDeleteMessage: " . json_encode($batchDeleteResponse) . "\n";

    } catch (CMQException $exception) {
        if ($exception instanceof CMQNoMessageException) {
            echo "Api-BatchReceiveMessage: no message\n";
        } else {
            echo "Api-BatchReceiveMessage: " . $exception->getMessage() . "\n";
        }
    }

});
```

// TODO : Topic部分待测试