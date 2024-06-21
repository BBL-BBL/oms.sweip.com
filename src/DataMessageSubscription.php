<?php

namespace OmsSweip;

// 在 BasicData.php 文件顶部添加
require_once __DIR__ . '/oms-sweip.php';

class DataMessageSubscription extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $subscript_type string    Require    订阅数据类型，枚举：order-订单，receiving-入库单，stock-库存变更，ec_new_fba-新fba业务
     * @return void
     */
    public function setSubscriptType(string $subscript_type)
    {
        $this->params["subscript_type"] = $subscript_type;
    }

    /**
     * @param $callback  String    Optional    回调地址，可选。数据变更后会发起 HTTP POST 请求以通知拉取数据。
     *          在开通订阅时，如果传入了回调地址，那么验证回调地址的有效性。会执行回调地址的 GET 请求，
     *          random 参数传入一个随机数，回调接口接收后要原样返回表示该回调地址是互通的。如下：
     *              [dev@test]#curl 'http://your-erp-domain.com/callback-path?random=1679297714' -H 'Accept:*\/*' -H 'Content-Type: application/json;charset = UTF-8'
     *              [dev@test]#{"random":"1679297714"}
     * @return void
     */
    public function setCallback(string $callback)
    {
        $this->params["callback"] = $callback;
    }

    /**
     * @param $erp_platform String    Require    对接的 ERP 类型，枚举：eccangerp:易仓ERP，othererp:第三方ERP，erp:自研ERP
     * @return void
     */
    public function setErpPlatform(string $erp_platform)
    {
        $this->params["erp_platform"] = $erp_platform;
    }

    /**
     * @param $tenant_id String    Option    ERP 租户 ID，当 erp_platform 为 eccangerp 时必填 在回调通知时，会原样在url返回，如 ?tenant_id=abc
     * @return void
     */
    public function setTenantId(string $tenant_id)
    {
        $this->params["tenant_id"] = $tenant_id;
    }

    /**
     * @param $expire_date string    Require    本次订阅过期截止时间，格式年月日，如：2023-03-20，在这个时间内订阅才会触发回调通知 过期后需要重新订阅
     * @return void
     */
    public function setExpireDate(string $expire_date)
    {
        $this->params["expire_date"] = $expire_date;
    }

    /**
     * 导出认领单信息
     * subscript_type    String    Require    订阅数据类型，枚举：order-订单，receiving-入库单，stock-库存变更，ec_new_fba-新fba业务
     * callback    String    Optional    回调地址，可选。数据变更后会发起 HTTP POST 请求以通知拉取数据。
     *      在开通订阅时，如果传入了回调地址，那么验证回调地址的有效性。会执行回调地址的 GET 请求，
     *      random 参数传入一个随机数，回调接口接收后要原样返回表示该回调地址是互通的。如下：
     *      [dev@test]#curl 'http://your-erp-domain.com/callback-path?random=1679297714' -H 'Accept:*\/*' -H 'Content-Type: application/json;charset = UTF-8'
     *      [dev@test]#{"random":"1679297714"}
     * erp_platform    String    Require    对接的 ERP 类型，枚举：eccangerp:易仓ERP，othererp:第三方ERP，erp:自研ERP
     * tenant_id    String    Option    ERP 租户 ID，当 erp_platform 为 eccangerp 时必填 在回调通知时，会原样在url返回，如 ?tenant_id=abc
     * expire_date    Date    Require    本次订阅过期截止时间，格式年月日，如：2023-03-20，在这个时间内订阅才会触发回调通知 过期后需要重新订阅
     * 示例：
     * {
     *      "subscript_type" :"receiving",
     *      "callback":"http://your-erp-domain.com/callback-path",
     *      "erp_platform":"eccangerp",
     *      "tenant_id":"ec",
     *      "expire_date":"2026-12-31"
     * }
     * @return array|mixed
     */
    public function messageSubscript()
    {
        $this->setService("messageSubscript");
        return $this->PostSoapXML();
    }
}
