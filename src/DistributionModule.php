<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class DistributionModule extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $warehouse_code_arr array Option 多个仓库代码，数组格式
     * @return void
     */
    public function setWarehouseCodeArr(array $warehouse_code_arr)
    {
        $this->params["warehouse_code_arr"] = $warehouse_code_arr;
    }

    /**
     * @param $product_sku_arr array Option 多个SKU,数组格式
     * $product_sku_arr = ["EA121","EA110"];
     * @return void
     */
    public function setProductSkuArr(array $product_sku_arr)
    {
        $this->params["product_sku_arr"] = $product_sku_arr;
    }

    /**
     * @param $validity_start string Option 起始时间(分销有效期)
     * @return void
     */
    public function setValidityStart(string $validity_start)
    {
        $this->params["validity_start"] = $validity_start;
    }

    /**
     * @param $validity_end string Option 结束时间(分销有效期)
     * @return void
     */
    public function setValidityEnd(string $validity_end)
    {
        $this->params["validity_end"] = $validity_end;
    }

    /**
     * 可分销产品资料(All)
     * @warehouse_code_arr Array Option 多个仓库代码，数组格式
     * @product_sku_arr Array Option 多个SKU,数组格式
     * @page Int Require 当前页，不传值表示查询所有
     * @pageSize Int Require 每页数据长度，不传值表示查询所有
     * @validity_start string Option 起始时间(分销有效期)
     * @validity_end string Option 结束时间(分销有效期)
     * 示例：
     * {
     *      "page":1,
     *      "pageSize":"10",
     *      "warehouse_code":"USLAX01",
     *      "product_sku_arr":["EA121","EA110"],
     *      "validity_start":"2018-02-08 10:00:00",
     *      "validity_end":"2018-03-08 10:00:00"
     * }
     * @return array|mixed
     */
    public function getDistributionList()
    {
        $this->setService("getDistributionList");
        return $this->PostSoapXML();
    }

    /**
     * @param $warehouse_code string Option 仓库代码
     * @return void
     */
    public function setProductBarcodeArr(string $warehouse_code)
    {
        $this->params["warehouse_code"] = $warehouse_code;
    }

    /**
     * @param $distribution_status Int Option 0待审核,1已通过,2不通过；默认1
     * @return void
     */
    public function setOwnerCustomerArr(int $distribution_status)
    {
        $this->params["distribution_status"] = $distribution_status;
    }

    /**
     * @param $product_barcode_arr array Option 多个产品编码,数组格式
     * @return void
     */
    public function setStartTime(array $product_barcode_arr)
    {
        $this->params["product_barcode_arr"] = $product_barcode_arr;
    }

    /**
     * @param $owner_customer_arr array Option 分销者客户代码，数组格式（分销系统使用，获取指定分销者的分享产品库存）
     * @return void
     */
    public function setEndTime(array $owner_customer_arr)
    {
        $this->params["owner_customer_arr"] = $owner_customer_arr;
    }

    /**
     * 我的分销产品
     * @pageSize Int Require 每页数据长度，不传值表示查询所有
     * @page Int Require 当前页，不传值表示查询所有
     * @warehouse_code string Option 仓库代码
     * @distribution_status Int Option 0待审核,1已通过,2不通过；默认1
     * @product_barcode_arr Object Option 多个产品编码,数组格式
     * @owner_customer_arr Object Option 分销者客户代码，数组格式（分销系统使用，获取指定分销者的分享产品库存）
     * @start_time String Datetime 起始时间(产品更新)
     * @end_time String date 结束时间(产品更新)
     * 示例：
     * {
     *      "pageSize":"10",
     *      "page":1,
     *      "product_barcode_arr":["A001-414","A002-121"],
     *      "owner_customer_arr":["a001","a002"],
     *      "warehouse_code":"USLAX01",
     *      "start_time":"2018-02-08 10:00:00",
     *      "end_time":"2019-04-08 10:00:00"
     * }
     * @return array|mixed
     */
    public function getMyDistribution()
    {
        $this->setService("getMyDistribution");
        return $this->PostSoapXML();
    }

    /**
     * 我的分销产品库存
     * @warehouse_code    String    Require    仓库代码,(必填)
     * @start_time    String    Require    开始时间(库存变更时间)
     * @end_time    String    Require    结束时间(库存变更时间)
     * @product_barcode_arr/product_sku_arr    Object    Option    多个SKU,数组格式(这两个参数都表示一个意思，任选其一即可)
     * @owner_customer_arr    Object    Option    分销者客户代码，数组格式（分销系统使用，获取指定分销者的分享产品库存）
     * @page    Int    Option    当前页，默认值1
     * @pageSize    Int    Option    每页显示条数，默认20,最大值100
     * 示例：
     * {
     *      "pageSize":"10",
     *      "page":"1",
     *      "warehouse_code":"USLAX01",
     *      "product_barcode_arr":["sku01","sku02"],
     *      "product_sku_arr":["sku01","sku02"],
     *      "owner_customer_arr":["a001","a002"],
     *      "start_time":"2018-02-08 10:00:00",
     *      "end_time":"2019-04-08 10:00:00"
     * }
     * @return array|mixed
     */
    public function getMyDistributionStock()
    {
        $this->setService("getMyDistributionStock");
        return $this->PostSoapXML();
    }

    /**
     * 我的分销批次库存
     * @pageSize Int Require 每页数据长度，不传值表示查询所有
     * @page Int Require 当前页，不传值表示查询所有
     * @warehouse_code String Require 仓库代码,(必填)
     * @start_time Datetime Require 起始时间
     * @end_time Datetime Require 结束时间
     * @product_sku_arr Object Option 多个SKU,数组格式
     * 示例：
     * {
     *      "pageSize":"10",
     *      "page":"1",
     *      "warehouse_code":"USLAX01",
     *      "start_time":"2018-02-08 10:00:00",
     *      "end_time":"2019-04-08 10:00:00"
     * }
     * @return array|mixed
     */
    public function getMyDistributionBatch()
    {
        $this->setService("getMyDistributionBatch");
        return $this->PostSoapXML();
    }

    /**
     * 货主已分销产品
     * @pageSize Int Option 每页数据长度，不传值表示查询所有
     * @page Int Option 当前页，不传值表示查询所有
     * @warehouse_code string Require 仓库代码(必填)
     * @distribution_status Int Option 0待审核,1已通过,2不通过；默认1
     * @product_sku_arr Object Option 多个SKU,数组格式
     * @start_time String Require 起始时间(产品更新)
     * @end_time String Require 结束时间(产品更新)
     * 示例：
     * {
     *      "pageSize":"10",
     *      "page":1,
     *      "warehouse_code":"USLAX01",
     *      "start_time":"2018-02-08 10:00:00",
     *      "end_time":"2019-04-08 10:00:00"
     * }
     * @return array|mixed
     */
    public function ownerProduct()
    {
        $this->setService("ownerProduct");
        return $this->PostSoapXML();
    }

    /**
     * 货主可售产品库存
     * @warehouse_code String Require 仓库代码（必填）
     * @start_time String Require 开始时间(库存变更时间)
     * @end_time String Require 结束时间(库存变更时间)
     * @shared_sign Int Option 是否分销产品: 1是，0 否 ,空为所有
     * @page Int Option 当前页，默认1
     * @pageSize Int Option 每页数据长度，默认值20,最大100
     * @product_sku_arr Object Option 多个SKU,数组格式
     * 示例：
     * {
     *      "warehouse_code":"USLAX01",
     *      "page":1,
     *      "pageSize":"1",
     *      "product_sku_arr":[]
     * }
     * @return array|mixed
     */
    public function getOwnerProductInventory()
    {
        $this->setService("getOwnerProductInventory");
        return $this->PostSoapXML();
    }

    /**
     * @param $fx_id int 分销ID 获取共享产品列表获取
     * @return void
     */
    public function setFxId(int $fx_id)
    {
        $this->params["fx_id"] = $fx_id;
    }

    /**
     * @param $unit_price float Require 共享单价（AUD）
     * @return void
     */
    public function setUnitPrice(float $unit_price)
    {
        $this->params["unit_price"] = $unit_price;
    }

    /**
     * @param $number_of_shares int Require 申请数量
     * @return void
     */
    public function setNumberOfShares(int $number_of_shares)
    {
        $this->params["number_of_shares"] = $number_of_shares;
    }

    /**
     * @param $product_description string Option 注意
     * @return void
     */
    public function setProductDescription(string $product_description)
    {
        $this->params["product_description"] = $product_description;
    }

    /**
     * 货主可售产品库存
     * @fx_id int 分销ID 获取共享产品列表获取
     * @unit_price float Require 共享单价（AUD）
     * @number_of_shares int Require 申请数量
     * @product_description string Option 注意
     * 示例：
     * {
     *      "fx_id":"1",
     *      "unit_price":"3.00",
     *      "number_of_shares":"1",
     *      "product_description":"test"
     * }
     * @return array|mixed
     */
    public function applySku()
    {
        $this->setService("applySku");
        return $this->PostSoapXML();
    }
}
