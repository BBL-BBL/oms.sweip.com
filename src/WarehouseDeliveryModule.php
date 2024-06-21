<?php

namespace OmsSweip;

// 在 BasicData.php 文件顶部添加
require_once __DIR__ . '/oms-sweip.php';

class WarehouseDeliveryModule extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $package_code  String Option 包裹单号,有则update,无则add
     * @return void
     */
    public function setPackageCode($package_code)
    {
        $this->params["package_code"] = $package_code;
    }

    /**
     * @param $sm_code  string Require 物流渠道
     * @return void
     */
    public function setSmCode($sm_code)
    {
        $this->params["sm_code"] = $sm_code;
    }

    /**
     * @param $warehouse_code  String Require 目的仓CODE
     * @return void
     */
    public function setWarehouseCode($warehouse_code)
    {
        $this->params["warehouse_code"] = $warehouse_code;
    }

    /**
     * @param $reference_code  String Option 参考号
     * @return void
     */
    public function setReferenceCode($reference_code)
    {
        $this->params["reference_code"] = $reference_code;
    }

    /**
     * @param $length  float Require 包裹长
     * @return void
     */
    public function setLength($length)
    {
        $this->params["length"] = $length;
    }

    /**
     * @param $width  float Require 包裹宽
     * @return void
     */
    public function setWidth($width)
    {
        $this->params["width"] = $width;
    }

    /**
     * @param $height  float Require 包裹高
     * @return void
     */
    public function setHeight($height)
    {
        $this->params["height"] = $height;
    }

    /**
     * @param $weight  float Require 包裹重量
     * @return void
     */
    public function setWeight($weight)
    {
        $this->params["weight"] = $weight;
    }

    /**
     * @param $remark  string Option 备注
     * @return void
     */
    public function setRemark($remark)
    {
        $this->params["remark"] = $remark;
    }

    /**
     * @param $products  Object Require 产品明细
     * $products = [{
     *      "product_sku":"EE887775", // String    Require    产品SKU
     *      "declared_name_zh":"WMS系统", // String    Option    申报中文名称
     *      "declared_name":"EC-666666", // String    Option    申报名称
     *      "declared_value":"23", // float    Option    申报价值
     *      "weight":"6.33", // float    Require    产品重量
     *      "product_qty":6 // Int    Require    产品数量
     * }]
     * @return void
     */
    public function setProducts($products)
    {
        $this->params["products"] = $products;
    }

    /**
     * @param $address  array Require 地址信息
     * $address = :{
     *      "consignee_name":"玫瑰谷", // String    Require    收件人姓名
     *      "consignee_company":"XX公司", // String    Option    收件人公司
     *      "consignee_phone":"8200000093", // String    Require    收件人电话
     *      "consignee_email":"xxxxxx.eccang.com", // String    Option    收件人邮箱
     *      "consignee_country":"CN", // String    Require    收件人国家(二字码)
     *      "consignee_zipcode":"666363", // String    Require    收件人邮编
     *      "consignee_state":"XX XX state", // String    Require    收件人省州
     *      "consignee_city":"洛杉矶", // String    Require    收件人城市
     *      "consignee_address1":"唐人街", // String    Require    收件人地址1
     *      "consignee_address2":"", // String    Require    收件人地址2
     *      "consignee_doorplate":"001号", // String    Option    收件人门牌号
     *      "sender_name":"EC-chen", // String    Require    寄件人姓名
     *      "sender_company":"易仓科技有限公司", // String    Option    寄件人公司
     *      "sender_phone":"136******88", // String    Require    寄件人电话
     *      "sender_email":"****.eccang.com", // String    Option    寄件人邮箱
     *      "sender_country":"CN", // String    Require    寄件人国家(二字码)
     *      "sender_zipcode":"518000", // String    Require    寄件人邮编
     *      "sender_state":"广东省", // String    Require    寄件人省州
     *      "sender_city":"深圳市", // String    Require    寄件人城市
     *      "sender_address1":"留仙大道", // String    Require    寄件人地址1
     *      "sender_address2":"", // String    Option    寄件人地址2
     *      "sender_doorplate":"易仓科技" // String    Option    寄件人门牌号
     * }
     * @return void
     */
    public function setAddress(array $address)
    {
        $this->params["address"] = $address;
    }

    /**
     * @param $attachments  array Option 附件
     * $attachments = [{
     *       "attach_name"=>"",// String Option 附件名称
     *       "attach_path"=>"",// String Require 附件路径
     *       "attach_note"=>"",// String Option 附件备注
     *  }]
     * @return void
     */
    public function setAttachments(array $attachments)
    {
        $this->params["attachments"] = $attachments;
    }

    /**
     * 创建或编辑单据
     * @package_code String Option 包裹单号,有则update,无则add
     * @sm_code string Require 物流渠道
     * @warehouse_code String Require 目的仓CODE
     * @reference_code String Option 参考号
     * @length float Require 包裹长
     * @width float Require 包裹宽
     * @height float Require 包裹高
     * @weight float Require 包裹重量
     * @remark string Option 备注
     * @products Object Require 产品明细
     * @address Array Require 地址信息
     * @attachments Object Option 附件
     * 示例：
     * {
     *      "package_code":"",
     *      "sm_code":"AIR",
     *      "warehouse_code":"USW",
     *      "reference_code":"999000999",
     *      "length":"1.3",
     *      "width":"1",
     *      "height":"1.20",
     *      "weight":"23.3",
     *      "remark":"这里是备注",
     *      "products":[{
     *          "product_sku":"EE887775",
     *          "declared_name_zh":"WMS系统",
     *          "declared_name":"EC-666666",
     *          "declared_value":"23",
     *          "weight":"6.33",
     *          "product_qty":6
     *      }],
     *      "address":{
     *          "consignee_name":"玫瑰谷",
     *          "consignee_company":"XX公司",
     *          "consignee_phone":"8200000093",
     *          "consignee_email":"xxxxxx.eccang.com",
     *          "consignee_country":"CN",
     *          "consignee_zipcode":"666363",
     *          "consignee_state":"XX XX state",
     *          "consignee_city":"洛杉矶",
     *          "consignee_address1":"唐人街",
     *          "consignee_address2":"",
     *          "consignee_doorplate":"001号",
     *          "sender_name":"EC-chen",
     *          "sender_company":"易仓科技有限公司",
     *          "sender_phone":"136******88",
     *          "sender_email":"****.eccang.com",
     *          "sender_country":"CN",
     *          "sender_zipcode":"518000",
     *          "sender_state":"广东省",
     *          "sender_city":"深圳市",
     *          "sender_address1":"留仙大道",
     *          "sender_address2":"",
     *          "sender_doorplate":"易仓科技"
     *      }
     * }
     * @return array|mixed
     */
    public function createPackageToBill()
    {
        $this->setService("createPackageToBill");
        return $this->PostSoapXML();
    }

    /**
     * @param $code String    Require    查询单号
     * @return void
     */
    public function setCode(string $code)
    {
        $this->params["code"] = $code;
    }

    /**
     * @param $codes array Require    查询单号
     * @return void
     */
    public function setCodes(string $codes)
    {
        $this->params["codes"] = $codes;
    }

    /**
     * 查询单据
     * @code    String    Require    查询单号
     * 示例： { "code":"BAA001-180101-0001" }
     * @return array|mixed
     */
    public function getOrderInfo()
    {
        $this->setService("getOrderInfo");
        return $this->PostSoapXML();
    }

    /**
     * 查询单据
     * @code    String    Require    查询单号
     * 示例： { "codes":[ "单号1","单号2","单号3" ] }
     * @return array|mixed
     */
    public function submitBill()
    {
        $this->setService("submitBill");
        return $this->PostSoapXML();
    }
}

