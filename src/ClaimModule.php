<?php

namespace OmsSweip;

// 在 BasicData.php 文件顶部添加
require_once __DIR__ . '/oms-sweip.php';

class ClaimModule extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $code string    Require    认领单号/参考号
     * @return void
     */
    public function setCode(string $code)
    {
        $this->params["code"] = $code;
    }

    /**
     * 获取认领单信息
     * @code    string    Require    认领单号/参考号
     * 示例：{ "code":"C42451808110001" }
     * @return array|mixed
     */
    public function getClaimOrderByCode()
    {
        $this->setService("getClaimOrderByCode");
        return $this->PostSoapXML();
    }

    /**
     * @param $warehouseCode string Option 仓库代码
     * @return void
     */
    public function setWarehouseCode(string $warehouseCode)
    {
        $this->params["warehouseCode"] = $warehouseCode;
    }

    /**
     * @param $type Int Option 认领类型:1-立即上架、2-申请销毁、4-等待转运、5-等待上架、6-申请拍照
     * @return void
     */
    public function setType(int $type)
    {
        $this->params["type"] = $type;
    }

    /**
     * @param $isPlatform Int Option 是否平台认领:1-是、0-否
     * @return void
     */
    public function setIsPlatform(int $isPlatform)
    {
        $this->params["isPlatform"] = $isPlatform;
    }

    /**
     * @param $status string Option 状态 X：作废 C:待认领 W:已认领 D:待处理(已建立退件) P:处理中 F:已完成、E已过期、R已销毁
     * @return void
     */
    public function setStatus(string $status)
    {
        $this->params["status"] = $status;
    }

    /**
     * @param $referenceNo string Option 参考号
     * @return void
     */
    public function setReferenceNo(string $referenceNo)
    {
        $this->params["referenceNo"] = $referenceNo;
    }

    /**
     * @param $orderCode string Option 订单号
     * @return void
     */
    public function setOrderCode(string $orderCode)
    {
        $this->params["orderCode"] = $orderCode;
    }

    /**
     * @param $coCode string Option 认领单号
     * @return void
     */
    public function setCoCode(string $coCode)
    {
        $this->params["coCode"] = $coCode;
    }

    /**
     * @param $trackingNumber string Option 跟踪号
     * @return void
     */
    public function setTrackingNumber(string $trackingNumber)
    {
        $this->params["trackingNumber"] = $trackingNumber;
    }

    /**
     * @param $comments string Option 备注
     * @return void
     */
    public function setComments(string $comments)
    {
        $this->params["comments"] = $comments;
    }

    /**
     * @param $dateFor string Option 起始创建时间
     * @return void
     */
    public function setDateFor(string $dateFor)
    {
        $this->params["dateFor"] = $dateFor;
    }

    /**
     * @param $dataTo string Option 结束创建时间
     * @return void
     */
    public function setDataTo(string $dataTo)
    {
        $this->params["dataTo"] = $dataTo;
    }

    /**
     * 获取认领单列表
     * @pageSize Int Option 每页数据长度，最大值 50
     * @page Int Option 页码，大于0的正整数
     * @warehouseCode string Option 仓库代码
     * @ type Int Option 认领类型:1-立即上架、2-申请销毁、4-等待转运、5-等待上架、6-申请拍照
     * @isPlatform Int Option 是否平台认领:1-是、0-否
     * @status string Option 状态 X：作废 C:待认领 W:已认领 D:待处理(已建立退件) P:处理中 F:已完成、E已过期、R已销毁
     * @referenceNo string Option 参考号
     * @orderCode string Option 订单号
     * @coCode string Option 认领单号
     * @trackingNumber string Option 跟踪号
     * @comments string Option 备注
     * @dateFor string Option 起始创建时间
     * @dataTo string Option 结束创建时间
     * 示例：
     * {
     *      "pageSize":"20",
     *      "page":"1",
     *      "warehouseCode":"USW",
     *      "status":"F",
     *      "type":"1",
     *      "referenceNo":"参考号",
     *      "orderCode":"订单号",
     *      "coCode":"认领单号",
     *      "trackingNumber":"跟踪号",
     *      "dateFor":"2017-12-08 19:17:19",
     *      "dataTo":"2017-12-10 19:17:20"
     * }
     * @return array|mixed
     */
    public function getClaimOrderList()
    {
        $this->setService("getClaimOrderList");
        return $this->PostSoapXML();
    }

    /**
     * 获取认领单列表统计
     * 示例：{}
     * @return array|mixed
     */
    public function getClaimCount()
    {
        $this->setService("getClaimCount");
        return $this->PostSoapXML();
    }

    /**
     * @param $action string Require 认领操作方式：claim - 认领，destroy - 销毁
     * @return void
     */
    public function setAction(string $action)
    {
        $this->params["action"] = $action;
    }

    /**
     * @param $coType int Option 认领类型:1-立即上架、2-申请销毁、4-等待转运、5-等待上架、6-申请拍照
     * @return void
     */
    public function setCoType(int $coType)
    {
        $this->params["coType"] = $coType;
    }

    /**
     * 认领单操作
     * @coCode string Require 认领单号
     * @action string Require 认领操作方式：claim - 认领，destroy - 销毁
     * @coType int Option 认领类型:1-立即上架、2-申请销毁、4-等待转运、5-等待上架、6-申请拍照
     * 示例：
     * {
     *      "coCode":"C98951811280001",
     *      "action":"claim",
     *      "coType":"2"
     * }
     * @return array|mixed
     */
    public function returnClaim()
    {
        $this->setService("returnClaim");
        return $this->PostSoapXML();
    }

    /**
     * @param $coId string Require 认领ID
     * @return void
     */
    public function setCoId(string $coId)
    {
        $this->params["coId"] = $coId;
    }

    /**
     * @param $coIds array    Require    认领数据ID数组：[1, 2, 3]
     * @return void
     */
    public function setCoIds(array $coIds)
    {
        $this->params["coIds"] = $coIds;
    }

    /**
     * 获取认领单日志
     * @coId string Require 认领ID
     * @page int Option 页码
     * @pageSize int Option 每页数据长度
     * 示例：{"coId":"1","page":1,"pageSize":1}
     * @return array|mixed
     */
    public function getClaimLog()
    {
        $this->setService("getClaimLog");
        return $this->PostSoapXML();
    }

    /**
     * 导出认领单信息
     * @coIds    Array    Require    认领数据ID数组：[1, 2, 3]
     * 示例：{"coIds":[1,2,3,4,5]}
     * @return array|mixed
     */
    public function exportClaimInfo()
    {
        $this->setService("exportClaimInfo");
        return $this->PostSoapXML();
    }
}
