<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-02-21
 * Time: 19:11
 */

namespace evalor\coCloudMessageQueue;

use evalor\coCloudMessageQueue\Actions\Action;

class CMQSignature
{
    /**
     * 生成请求参数串
     * @param array $requestParams 请求参数
     * @param string $requestMethod 请求方法
     * @return string
     */
    static function buildParamStr($requestParams, $requestMethod = 'POST')
    {
        $paramStr = '';

        // 2.1 对所有请求参数按参数名做字典序升序
        ksort($requestParams);

        // 2.2 拼接请求字符串 参数值不需要URL编码 若参数中包含下划线则要转为点(.) 各个参数用"&"拼接在一起
        $i = 0;
        foreach ($requestParams as $key => $value) {
            if ($key == 'Signature') {
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
     * 构造已完成的签名串
     * @param $paramStr
     * @param $secretKey
     * @param string $requestMethod
     * @param string $requestHost
     * @param string $requestPath
     * @param string $signatureMethod
     * @return string
     */
    static function makeSignature($paramStr, $secretKey, $requestMethod = 'POST', $requestHost = '', $requestPath = '/v2/index.php', $signatureMethod = Action::SIGNATURE_HMAC_SHA1)
    {
        $srcStr = "{$requestMethod}{$requestHost}{$requestPath}?{$paramStr}";
        $method = $signatureMethod == Action::SIGNATURE_HMAC_SHA256 ? 'sha256' : 'sha1';
        return $paramStr . '&Signature=' . urlencode(base64_encode(hash_hmac($method, $srcStr, $secretKey, true)));
    }
}