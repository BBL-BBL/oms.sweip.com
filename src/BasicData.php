<?php

namespace OmsSweip;

// 在 BasicData.php 文件顶部添加
require_once __DIR__ . '/oms-sweip.php';

class BasicData extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * 系统仓库
     *
     * 示例： { "pageSize":"1", "page":1 }
     *
     * @pageSize int Option 每页数据长度，不传值表示查询所有
     * @page int Option 当前页，不传值表示查询所有
     *
     * @return array|mixed
     */
    public function getWarehouse()
    {
        $this->setService("getWarehouse");
        return $this->PostSoapXML();
    }


    /**
     * @param $warehouseCode string 仓库代码
     * @return void
     */
    public function setWarehouseCode(string $warehouseCode)
    {
        $this->params["warehouseCode"] = $warehouseCode;
    }

    /**
     * @return array
     */
    public function getShippingMethod(): array
    {
        $this->setService("getShippingMethod");
        return $this->PostSoapXML();
    }

    /**
     * @return array
     */
    public function getCategory(): array
    {
        $this->setService("getCategory");
        return $this->PostSoapXML();
    }

    /**
     * @return array
     */
    public function getAccount(): array
    {
        $this->setService("getAccount");
        return $this->PostSoapXML();
    }

    /**
     *
     * @return array
     */
    public function getCountry(): array
    {
        $this->setService("getCountry");
        return $this->PostSoapXML();
    }

    /**
     * @return array
     */
    public function getRegion(): array
    {
        $this->setService("getRegion");
        return $this->PostSoapXML();
    }

    /**
     * @return array
     */
    public function getRegionForReceiving(): array
    {
        $this->setService("getRegionForReceiving");
        return $this->PostSoapXML();
    }

    /**
     * @return void
     */
    public function getPaymentMethod()
    {
        $this->setService("getPaymentMethod");
        return $this->PostSoapXML();
    }

    /**
     * @param $paymentMethod string 汇款方式编码
     * @return void
     */
    public function setPaymentMethod(string $paymentMethod)
    {
        $this->params["paymentMethod"] = $paymentMethod;
    }

    /**
     * @return void
     */
    public function getBankAccount(string $paymentMethod)
    {
        $this->setService("getBankAccount");
        return $this->PostSoapXML();
    }

    /**
     * @return void
     */
    public function getCurrency()
    {
        $this->setService("getCurrency");
        return $this->PostSoapXML();
    }

    /**
     * @return void
     */
    public function getFeeType()
    {
        $this->setService("getFeeType");
        return $this->PostSoapXML();
    }

    /**
     * @param $value string $platform require 平台
     * @return void
     */
    public function setPlatform(string $value)
    {
        $this->params["platform"] = $value;
    }

    /**
     * @param $value string $site require 站点
     * @return void
     */
    public function setSite(string $value)
    {
        $this->params["site"] = $value;
    }

    /**
     * @param $value string $platform_shop require 店铺账号
     * @return void
     */
    public function setPlatformShop(string $value)
    {
        $this->params["platform_shop"] = $value;
    }

    /**
     * @param $value string $logistics_name require 平台物流
     * @return void
     */
    public function setLogisticsName(string $value)
    {
        $this->params["logistics_name"] = $value;
    }

    /**
     * @return void
     */
    public function createPlatformSoutheastAsiaChannel()
    {
        $this->setService("createPlatformSoutheastAsiaChannel");
        return $this->PostSoapXML();
    }

    /**
     * @return void
     */
    public function getPlatformSoutheastAsiaChannel()
    {
        $this->setService("getPlatformSoutheastAsiaChannel");
        return $this->PostSoapXML();
    }

    /**
     * @param $templateType string Require 模板类型（returnSwapOrderTemplate创建退件-导入产品模板 returnsImport批量导入退件模板）
     * @return void
     */
    public function setTemplateType(string $templateType)
    {
        $this->params['templateType'] = $templateType;
    }

    /**
     * @return void
     */
    public function getImportTemplate()
    {
        $this->setService("getImportTemplate");
        return $this->PostSoapXML();
    }
}