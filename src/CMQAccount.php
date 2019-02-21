<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-21
 * Time: 19:08
 */

namespace evalor\coCloudMessageQueue;

/**
 * 腾讯云CMQ账号
 * Class CMQAccount
 * @package evalor\coCloudMessageQueue
 */
class CMQAccount
{
    protected $secretId;
    protected $secretKey;
    protected $endPoint;

    // 北京
    const ENDPOINT_BJ_OUTER = 'https://cmq-queue-bj.api.qcloud.com';
    const ENDPOINT_BJ_INNER = 'http://cmq-queue-bj.api.tencentyun.com';

    // 上海
    const ENDPOINT_SH_OUTER = 'https://cmq-queue-sh.api.qcloud.com';
    const ENDPOINT_SH_INNER = 'http://cmq-queue-sh.api.tencentyun.com';

    // 广州
    const ENDPOINT_GZ_OUTER = 'https://cmq-queue-gz.api.qcloud.com';
    const ENDPOINT_GZ_INNER = 'http://cmq-queue-gz.api.tencentyun.com';

    // 上海金融
    const ENDPOINT_SHJR_OUTER = 'https://cmq-queue-shjr.api.qcloud.com';
    const ENDPOINT_SHJR_INNER = 'http://cmq-queue-shjr.api.tencentyun.com';

    // 深圳金融
    const ENDPOINT_SZJR_OUTER = 'https://cmq-queue-szjr.api.qcloud.com';
    const ENDPOINT_SZJR_INNER = 'http://cmq-queue-szjr.api.tencentyun.com';

    // 香港
    const ENDPOINT_HK_OUTER = 'https://cmq-queue-hk.api.qcloud.com';
    const ENDPOINT_HK_INNER = 'http://cmq-queue-hk.api.tencentyun.com';

    // 成都
    const ENDPOINT_CD_OUTER = 'https://cmq-queue-cd.api.qcloud.com';
    const ENDPOINT_CD_INNER = 'http://cmq-queue-cd.api.tencentyun.com';

    // 北美
    const ENDPOINT_CA_OUTER = 'https://cmq-queue-ca.api.qcloud.com';
    const ENDPOINT_CA_INNER = 'http://cmq-queue-ca.api.tencentyun.com';

    // 美西
    const ENDPOINT_USW_OUTER = 'https://cmq-queue-usw.api.qcloud.com';
    const ENDPOINT_USW_INNER = 'http://cmq-queue-usw.api.tencentyun.com';

    // 美东
    const ENDPOINT_USE_OUTER = 'https://cmq-queue-use.api.qcloud.com';
    const ENDPOINT_USE_INNER = 'http://cmq-queue-use.api.tencentyun.com';

    // 泰国
    const ENDPOINT_TH_OUTER = 'https://cmq-queue-th.api.qcloud.com';
    const ENDPOINT_TH_INNER = 'http://cmq-queue-th.api.tencentyun.com';

    // 印度
    const ENDPOINT_IN_OUTER = 'https://cmq-queue-in.api.qcloud.com';
    const ENDPOINT_IN_INNER = 'http://cmq-queue-in.api.tencentyun.com';

    // 新加坡
    const ENDPOINT_SG_OUTER = 'https://cmq-queue-sg.api.qcloud.com';
    const ENDPOINT_SG_INNER = 'http://cmq-queue-sg.api.tencentyun.com';

    /**
     * CMQAccount constructor.
     * @param $secretId
     * @param $secretKey
     * @param $endPoint
     */
    public function __construct($secretId, $secretKey, $endPoint)
    {
        $this->secretId = $secretId;
        $this->secretKey = $secretKey;
        $this->endPoint = $endPoint;
    }

    /**
     * 获取SecretId
     * @return string|null
     */
    public function getSecretId(): ?string
    {
        return $this->secretId;
    }

    /**
     * 设置SecretId
     * @param string $secretId
     * @return CMQAccount
     */
    public function setSecretId(string $secretId): CMQAccount
    {
        $this->secretId = $secretId;
        return $this;
    }

    /**
     * 获取SecretKey
     * @return string|null
     */
    public function getSecretKey(): ?string
    {
        return $this->secretKey;
    }

    /**
     * 设置SecretKey
     * @param string $secretKey
     * @return CMQAccount
     */
    public function setSecretKey(string $secretKey): CMQAccount
    {
        $this->secretKey = $secretKey;
        return $this;
    }

    /**
     * 获取接入点
     * @return string|null
     */
    public function getEndPoint(): ?string
    {
        return $this->endPoint;
    }

    /**
     * 设置接入点
     * @param string $endPoint
     * @return CMQAccount
     */
    public function setEndPoint(string $endPoint): CMQAccount
    {
        $this->endPoint = $endPoint;
        return $this;
    }

}