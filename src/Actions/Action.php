<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-22
 * Time: 00:29
 */

namespace evalor\coCloudMessageQueue\Actions;

use EasySwoole\Spl\SplBean;
use evalor\coCloudMessageQueue\CMQAccount;
use evalor\coCloudMessageQueue\CMQSignature;
use evalor\coRequests\CoRequests;

/**
 * 抽象操作
 * Class Action
 * @package evalor\coCloudMessageQueue\Actions
 */
abstract class Action extends SplBean
{
    const SIGNATURE_HMAC_SHA1 = 'HmacSHA1';
    const SIGNATURE_HMAC_SHA256 = 'HmacSHA256';

    protected $Action;
    protected $Region;
    protected $Timestamp;
    protected $Nonce;
    protected $SecretId;
    protected $Signature;
    protected $SignatureMethod;
    protected $Token;

    /**
     * ActionGetter
     * @return mixed
     */
    public function getAction()
    {
        return $this->Action;
    }

    /**
     * ActionSetter
     * @param mixed $Action
     * @return Action
     */
    public function setAction($Action)
    {
        $this->Action = $Action;
        return $this;
    }

    /**
     * RegionGetter
     * @return mixed
     */
    public function getRegion()
    {
        return $this->Region;
    }

    /**
     * RegionSetter
     * @param mixed $Region
     * @return Action
     */
    public function setRegion($Region)
    {
        $this->Region = $Region;
        return $this;
    }

    /**
     * TimestampGetter
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->Timestamp;
    }

    /**
     * TimestampSetter
     * @param mixed $Timestamp
     * @return Action
     */
    public function setTimestamp($Timestamp)
    {
        $this->Timestamp = $Timestamp;
        return $this;
    }

    /**
     * NonceGetter
     * @return mixed
     */
    public function getNonce()
    {
        return $this->Nonce;
    }

    /**
     * NonceSetter
     * @param mixed $Nonce
     * @return Action
     */
    public function setNonce($Nonce)
    {
        $this->Nonce = $Nonce;
        return $this;
    }

    /**
     * SecretIdGetter
     * @return mixed
     */
    public function getSecretId()
    {
        return $this->SecretId;
    }

    /**
     * SecretIdSetter
     * @param mixed $SecretId
     * @return Action
     */
    public function setSecretId($SecretId)
    {
        $this->SecretId = $SecretId;
        return $this;
    }

    /**
     * SignatureGetter
     * @return mixed
     */
    public function getSignature()
    {
        return $this->Signature;
    }

    /**
     * SignatureSetter
     * @param mixed $Signature
     * @return Action
     */
    public function setSignature($Signature)
    {
        $this->Signature = $Signature;
        return $this;
    }

    /**
     * SignatureMethodGetter
     * @return mixed
     */
    public function getSignatureMethod()
    {
        return $this->SignatureMethod;
    }

    /**
     * SignatureMethodSetter
     * @param mixed $SignatureMethod
     * @return Action
     */
    public function setSignatureMethod($SignatureMethod)
    {
        $this->SignatureMethod = $SignatureMethod;
        return $this;
    }

    /**
     * TokenGetter
     * @return mixed
     */
    public function getToken()
    {
        return $this->Token;
    }

    /**
     * TokenSetter
     * @param mixed $Token
     * @return Action
     */
    public function setToken($Token)
    {
        $this->Token = $Token;
        return $this;
    }

    /**
     * 创建请求需要的参数对象
     * @param CMQAccount $account
     * @return string
     */
    public function buildRequestData(CMQAccount $account)
    {
        // 设置自身的基础信息
        $this->setTimestamp(time());
        $this->setNonce(rand(10000000, 99999999));
        $this->setSecretId($account->getSecretId());
        $this->setSignatureMethod(Action::SIGNATURE_HMAC_SHA1);

        // 构造已签名的请求串
        $secretKey = $account->getSecretKey();
        $requestHost = parse_url($account->getEndPoint(), PHP_URL_HOST);
        $srcStr = CMQSignature::buildParamStr($this->toArray(null, $this::FILTER_NOT_EMPTY));
        return CMQSignature::makeSignature($srcStr, $secretKey, 'POST', $requestHost);
    }
}