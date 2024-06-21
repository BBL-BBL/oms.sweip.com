<?php

class CargoTransferModule extends \OmsSweip\BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $warehouse_code String Require 仓库
     * @return void
     */
    public function setWarehouseCode(string $warehouse_code)
    {
        $this->params["warehouse_code"] = $warehouse_code;
    }

    /**
     * @param $user_to String Require To客户
     * @return void
     */
    public function setUserTo(string $user_to)
    {
        $this->params["user_to"] = $user_to;
    }

    /**
     * @param $pr_reference_no String Option 参考号
     * @return void
     */
    public function setPrReferenceNo(string $pr_reference_no)
    {
        $this->params["pr_reference_no"] = $pr_reference_no;
    }

    /**
     * @param $product_items array Require 产品详情
     * $product_items = [{
     *           "product_barcode":"A001-YAMAHA",
     *           "qty":"2"
     *       }]
     * @return void
     */
    public function setProductItems(array $product_items)
    {
        $this->params["product_items"] = $product_items;
    }

    /**
     * 创建货权转移
     * @warehouse_code String Require 仓库
     * @user_to String Require To客户
     * @pr_reference_no String Option 参考号
     * @product_items Object Require 产品详情
     * 示例：
     * {
     *      "warehouse_code" :"DEW",
     *      "user_to":"A002",
     *      "pr_reference_no":"96589",
     *      "product_items":[{
     *          "product_barcode":"A001-YAMAHA",
     *          "qty":"2"
     *      }]
     * }
     * @return array|mixed
     */
    public function createPrBill()
    {
        $this->setService("createPrBill");
        return $this->PostSoapXML();
    }

    /**
     * @param $pr_code_arr array    Require    货权转移单号；多个单号,数组格式
     * @return void
     */
    public function setPrCodeArr(array $pr_code_arr)
    {
        $this->params["pr_code_arr"] = $pr_code_arr;
    }

    /**
     * 创建货权转移
     * @pr_code_arr    Object    Require    货权转移单号；多个单号,数组格式
     * 示例：{ "pr_code_arr":["PRA001-190806-0008","PRA001-190806-0007"] }
     * @return array|mixed
     */
    public function viewProductRight()
    {
        $this->setService("viewProductRight");
        return $this->PostSoapXML();
    }
}
