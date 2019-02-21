<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-21
 * Time: 20:00
 */

namespace evalor\coCloudMessageQueue;

use EasySwoole\Spl\SplBean;
use evalor\coCloudMessageQueue\Exception\CMQNetworkException;
use evalor\coCloudMessageQueue\Exception\CMQResponseException;
use evalor\coRequests\CoRequests;

/**
 * CMQ基础请求消息
 * Class CMQRequest
 * @package evalor\coCloudMessageQueue
 */
class CMQRequest extends SplBean
{
    protected $Action;
    protected $Region;
    protected $Timestamp;
    protected $Nonce;
    protected $SecretId;
    protected $Signature;
    protected $SignatureMethod;
    protected $Token;
    private $account;

    /**
     * CMQRequest constructor.
     * @param string $action
     * @param CMQAccount $account
     */
    function __construct(string $action, CMQAccount $account)
    {
        $this->account = $account;
        $this->Action = $action;
        $this->Region = parse_url($account->getEndPoint(), PHP_URL_HOST);
        $this->Timestamp = time();
        $this->Nonce = $this->randomNonce();
        $this->SecretId = $account->getSecretId();
        $this->SignatureMethod = 'HmacSHA1';
    }

    /**
     * 生产随机数字
     * @return string
     */
    private function randomNonce(): string
    {
        mt_srand();
        return strval(rand(10000000, 99999999));
    }

    /**
     * 获取所有不为空的属性
     * @return array
     * @throws \ReflectionException
     */
    private function getNotNullArgs()
    {
        $refClass = new \ReflectionClass($this);
        $allArgs = array();
        foreach ($refClass->getProperties(\ReflectionProperty::IS_PROTECTED) as $property) {
            $propertyName = $property->getName();
            if ($this->$propertyName !== null) {
                $allArgs[$propertyName] = $this->$propertyName;
            }
        }
        return $allArgs;
    }

    /**
     * _buildParamStr 拼接参数
     * @param string $requestMethod 请求方法
     * @return string
     * @throws \ReflectionException
     */
    private function buildParamStr($requestMethod = 'POST')
    {
        $paramStr = '';
        $requestParams = $this->getNotNullArgs();
        ksort($requestParams);
        $i = 0;
        foreach ($requestParams as $key => $value) {
            if ($key == 'Signature' || $key == 'Region') {
                continue;
            }
            // 排除上传文件的参数
            if ($requestMethod == 'POST' && substr($value, 0, 1) == '@') {
                continue;
            }
            // 把 参数中的 _ 替换成 .
            if (strpos($key, '_')) {
                $key = str_replace('_', '.', $key);
            }
            if ($i !== 0) {
                $paramStr .= '&';
            }
            $paramStr .= $key . '=' . $value;
            ++$i;
        }
        return $paramStr;
    }

    /**
     * 对某签名原串进行签名
     * @param string $paramStr
     * @param string $requestMethod
     * @return string
     */
    function makeSignature(string $paramStr, $requestMethod = 'POST')
    {
        $paramStr = "{$requestMethod}{$this->Region}/v2/index.php?{$paramStr}";
        return urlencode(base64_encode(hash_hmac('sha1', $paramStr, $this->account->getSecretKey(), true)));
    }

    /**
     * 执行请求
     * @throws CMQNetworkException
     * @throws CMQResponseException
     * @throws \ReflectionException
     * @throws \evalor\coRequests\Exception\InvalidUrl
     */
    function exec()
    {
        $client = new CoRequests($this->account->getEndPoint() . '/v2/index.php');
        $postParam = $this->buildParamStr();
        $signature = $this->makeSignature($postParam);
        $postData = "{$postParam}&Signature={$signature}";
        $client->setPostData($postData);
        $response = $client->exec();
        if ($response->hasError()) {
            throw new CMQNetworkException($response->getError(), $response->getErrno());
        } else {
            $responseData = $response->parserJson();
            if ($responseData) {
                if (isset($responseData['code']) && $responseData['code'] != 0) {
                    throw new CMQResponseException($responseData['codeDesc'], $responseData['code']);
                }
                return $responseData;
            } else {
                throw new CMQResponseException(9999, 'response decode failed');
            }
        }
    }
}