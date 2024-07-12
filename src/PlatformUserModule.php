<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class PlatformUserModule extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $app_token string Require 客户token
     * @return void
     */
    public function setAppToken(string $app_token)
    {
        $this->params["app_token"] = $app_token;
    }

    /**
     * @param $user_account string Require 平台帐号
     * @return void
     */
    public function setUserAccount(string $user_account)
    {
        $this->params["user_account"] = $user_account;
    }

    /**
     * @param $platform_user_name string Require 平台登录名称
     * @return void
     */
    public function setPlatformUserName(string $platform_user_name)
    {
        $this->params["platform_user_name"] = $platform_user_name;
    }

    /**
     * @param $short_name string Option 简称
     * @return void
     */
    public function setShortName(string $short_name)
    {
        $this->params["short_name"] = $short_name;
    }

    /**
     * @param $user_token string Require 用户token
     * @return void
     */
    public function setUserToken(string $user_token)
    {
        $this->params["user_token"] = $user_token;
    }

    /**
     * @param $expires_in string Require token过期时间
     * @return void
     */
    public function setExpiresIn(string $expires_in)
    {
        $this->params["expires_in"] = $expires_in;
    }

    /**
     * @param $status int Require 授权状态(0未授权，1授权中，2授权完成)
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->params["status"] = $status;
    }

    /**
     * @param $mws_auth_type int Option 授权类型(1：自身授权访问，2：使用三方授权访问)
     * @return void
     */
    public function setMwsAuthType(int $mws_auth_type)
    {
        $this->params["mws_auth_type"] = $mws_auth_type;
    }

    /**
     * 平台用户模块
     * @app_token String Require 客户token
     * @user_account String Require 平台帐号
     * @platform_user_name String Require 平台登录名称
     * @short_name String Option 简称
     * @user_token String Require 用户token
     * @expires_in string Require token过期时间
     * @status Int Require 授权状态(0未授权，1授权中，2授权完成)
     * @mws_auth_type Int Option 授权类型(1：自身授权访问，2：使用三方授权访问)
     * 示例：
     * {
     *      "app_token" :"d836186400053ed9ac13b2ab0211d8fa",
     *      "user_account":"Jeremy",
     *      "platform_user_name":"Jeremy",
     *      "short_name":"J测试店铺",
     *      "user_token":"AgAAAA**AQAAAA**aAAAAA**6jL4XQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6MEl4SpCJaDqQ2dj6x9nY+seQ**qtsBAA**AAMAAA**0aPeqzO7Bf4NL3IlrTY3qfgfsL2fXL6adwmTv8K2wKFeHYJFo508EiUBa8pvoUDQGAxrbapbvWdBQE/pz7WvzMxSicZgwF1AKHP3PEyfICQJBTRvFXWfqsNV5DuwF7ufWIjE/er0pfX0hUwgxXfk41DVVHAuWA/YYl93d/O0+ybxFDo5u+8pz86i8mbf+X0UtOs5fx/IjmdJwfmKE82vy/GmyZT/V09+jMxh2XPmbYVEqrk7DsQ3W5I8pfVZFRrXZvvUzUar5R4y7OYW9XLR0kJFSQcSLCTrbigb5xxZagQhsUprScU8CSUQvqz248WCAuPeqejw9ueuOfPhl9Uo1KblAjs746OUFHmBQx1e1c4C5gSB4te+aDHCb05SHanCbznIFs8Xn/NKRFw8wdhomwpWHREU2Hw2QmraCAzRSfOtrFCm7q89R0o1FWe2QV9avr7SO8qxI+wMa/Ln6DDsal6xt5jOGJgTMFsvChzWzmaJtsvvoHd3j7ZjIvRi11W8Zkf0QjgWoV2fpdNZqkFGk6yrgWiu4cc+vOnjOVy2GyCZjLFAubrmZdowCN+3fbGd25TU9TreU0E6rtmkmT0L4GB12TP6ksTSjWvFGASDGLSfDtcp5tnzikF4ADue/P3vx2itpcG6UX/Gpj1RlJzYo29hAEcuqNTqJaeL73N0QzYt75YCD5UDB0G1yDc8xe4aRgoiZMiv02CKegDAjvJhCoBxMKJuj0tf7DxoZAHVxZBIcxhOL05/DjfiU8kQatHs",
     *      "expires_in":"2020-11-18 16:10:59",
     *      "status":2,
     *      "mws_auth_type":2
     * }
     * @return array|mixed
     */
    public function createPlatformUser()
    {
        $this->setService("saveOrderAttach");
        return $this->PostSoapXML();
    }
}
