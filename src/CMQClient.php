<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-21
 * Time: 19:08
 */

namespace evalor\coCloudMessageQueue;

use evalor\coCloudMessageQueue\Actions\Action;
use evalor\coCloudMessageQueue\Exception\CMQInterfaceException;
use evalor\coCloudMessageQueue\Exception\CMQInvalidAction;
use evalor\coCloudMessageQueue\Exception\CMQNetworkException;
use evalor\coCloudMessageQueue\Exception\CMQNoMessageException;
use evalor\coCloudMessageQueue\Exception\CMQResponseException;
use evalor\coRequests\CoRequests;

class CMQClient
{
    protected $account;

    /**
     * CMQClient constructor.
     * @param $account
     */
    public function __construct(CMQAccount $account)
    {
        $this->account = $account;
    }

    /**
     * 执行一个Action
     * @param Action $action
     * @return array|null
     * @throws CMQInterfaceException
     * @throws CMQInvalidAction
     * @throws CMQNetworkException
     * @throws CMQNoMessageException
     * @throws CMQResponseException
     * @throws \evalor\coRequests\Exception\InvalidUrl
     */
    public function doAction($action)
    {
        if ($action instanceof Action) {
            $response = $this->sendRequest($action);
            $responseData = $response->parserJson();
            if ($responseData) {
                if (isset($responseData['code']) && $responseData['code'] != 0) {
                    if ($responseData['code'] == 7000) {
                        throw new CMQNoMessageException($responseData['message'], $responseData['code']);
                    } else {
                        throw new CMQInterfaceException($responseData['message'], $responseData['code']);
                    }
                }
                return $responseData;
            } else {
                throw new CMQResponseException('response is not JSON format');
            }
        } else {
            throw new CMQInvalidAction('action invalid');
        }
    }

    /**
     * 发起一次请求
     * @param Action $action
     * @return \evalor\coRequests\CoResponse
     * @throws CMQNetworkException
     * @throws \evalor\coRequests\Exception\InvalidUrl
     */
    public function sendRequest(Action $action)
    {
        // 获得签名后的请求串
        $CMQRequestData = $action->buildRequestData($this->account);
        // 获取并设置请求客户端
        $client = new CoRequests($this->account->getEndPoint() . '/v2/index.php');
        $client->setRequestTimeout(30);
        $client->setPostData($CMQRequestData);
        $response = $client->exec();

        // 获取响应并返回
        if ($response->hasError()) {
            throw new CMQNetworkException($response->getError(), $response->getErrno());
        }
        return $response;
    }
}