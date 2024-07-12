<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class ValueAddedServiceModule extends BasicAPI
{

    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $codeArr  Object Option 查询单据编号
     * @return void
     */
    public function setCodeArr($codeArr)
    {
        $this->params["codeArr"] = $codeArr;
    }

    /**
     * @param $dateFrom  string Option 开始时间
     * @return void
     */
    public function setDateFrom(string $dateFrom)
    {
        $this->params["dateFrom"] = $dateFrom;
    }

    /**
     * @param $dateTo  string Option 结束时间
     * @return void
     */
    public function setDateTo(string $dateTo)
    {
        $this->params["dateTo"] = $dateTo;
    }

    /**
     * 查询落地配订单
     * @codeArr Object Option 查询单据编号
     * @dateFrom string Option 开始时间
     * @dateTo string Option 结束时间
     * @page int Option 页码
     * @pageSize int Option 每页条数
     * 示例：
     * {
     *      "codeArr":["ZACQ-220406-0003"],
     *      "dateFrom":"2021-07-12 10:36:57",
     *      "dateTo":"2022-07-18 16:36:57",
     *      "page":1,
     *      "pageSize":10
     * }
     * @return array|mixed
     */
    public function getPackageFloorOrderList()
    {
        $this->setService("getPackageFloorOrderList");
        return $this->PostSoapXML();
    }

    /**
     * @param $shipping_method string Require 物流方式 sm_code
     * @return void
     */
    public function setShippingMethod(string $shipping_method)
    {
        $this->params["shipping_method"] = $shipping_method;
    }

    /**
     * @param $warehouse_code String Require 目的仓CODE
     * @return void
     */
    public function setWarehouseCode(string $warehouse_code)
    {
        $this->params["warehouse_code"] = $warehouse_code;
    }

    /**
     * @param $order_code String Option 订单号 开启 配置 AL_PACKAGE_FLOOR_BY_ORDER 时订单号必填， 会填充订单仓库代码以及收发件人信息不能修改 未开启配置 填入订单号的信息 以收发件人信息为准
     * @return void
     */
    public function setOrderCode(string $order_code)
    {
        $this->params["order_code"] = $order_code;
    }

    /**
     * @param $fill_order int Require 是否填充订单信息，默认为0：不填充，1:填充，填充则收件人、寄件人信息不允许修改
     * @return void
     */
    public function setFillOrder(int $fill_order)
    {
        $this->params["fill_order"] = $fill_order;
    }

    /**
     * @param $verify int Require 是否审核 0新建不审核(草稿状态) 1 新建并审核 ,默认为0 审核通过之后不可编辑
     * @return void
     */
    public function setVerify(int $verify)
    {
        $this->params["verify"] = $verify;
    }

    /**
     * @param $products array
     * @return void
     */
    public function setProducts(array $products)
    {
        $this->params["items"] = $products;
    }

    /**
     * @param $package_info object
     * @return void
     */
    public function setPackageInfo($package_info)
    {
        $this->params["package_info"] = $package_info;
    }

    /**
     * @param $consignee_address object
     * @return void
     */
    public function setConsigneeAddress($consignee_address)
    {
        $this->params["consignee_address"] = $consignee_address;
    }

    /**
     * @param $sender_address object
     * @return void
     */
    public function setSenderAddress($sender_address)
    {
        $this->params["sender_address"] = $sender_address;
    }

    /**
     * 创建落地配订单
     * @shipping_method string Require 物流方式 sm_code
     * @warehouse_code String Require 目的仓CODE
     * @order_code String Option 订单号 开启 配置 AL_PACKAGE_FLOOR_BY_ORDER 时订单号必填， 会填充订单仓库代码以及收发件人信息不能修改 未开启配置 填入订单号的信息 以收发件人信息为准
     * @fill_order int Require 是否填充订单信息，默认为0：不填充，1:填充，填充则收件人、寄件人信息不允许修改
     * @verify int Require 是否审核 0新建不审核(草稿状态) 1 新建并审核 ,默认为0 审核通过之后不可编辑
     *
     * @products => items 参数
     * @product_sku String Require 产品SKU
     * @product_declared_name_zh String Option 申报中文名称
     * @product_declared_name String Option 申报名称
     * @product_weight float Require 申报价值
     * @product_weight float Require 产品重量
     * @product_qty Int Require 产品数量
     *
     * @package_info参数
     * @package_weight String Require 包裹重量
     * @package_length String Require 包裹长
     * @package_width String Require 包裹宽
     * @package_height String Require 包裹高
     * @package_length String Require 包裹长
     * @reference_code String Option 参考号
     * @package_note String Option 备注
     *
     * @consignee_address参数
     * @consignee_name String Require 收件人姓名
     * @consignee_company String Option 收件人公司
     * @consignee_phone String Require 收件人电话
     * @consignee_email String Option 收件人邮箱
     * @consignee_country String Require 收件人国家(二字码)
     * @consignee_zipcode String Require 收件人邮编
     * @consignee_state String Require 收件人省州
     * @consignee_city String Require 收件人城市
     * @consignee_address1 String Require 收件人地址1
     * @consignee_address2 String Option 收件人地址2
     *
     * @sender_address参数
     * @sender_name String Require 寄件人姓名
     * @sender_company String Option 寄件人公司
     * @sender_phone String Require 寄件人电话
     * @sender_email String Option 寄件人邮箱
     * @sender_country String Require 寄件人国家(二字码)
     * @sender_zipcode String Require 寄件人邮编
     * @sender_state String Require 寄件人省州
     * @sender_city String Require 寄件人城市
     * @sender_address1 String Require 寄件人地址1
     * @sender_address2 String Option 寄件人地址2
     *
     * 示例：
     * {
     *      "warehouse_code":"DEW",
     *      "shipping_method":"SHUNFENG",
     *      "items":[{
     *           "product_sku":"SKU2",
     *           "product_declared_name_zh":"SKU2",
     *           "product_declared_name":"SKU2",
     *           "product_declared_value":4.00,
     *           "product_weight":"13.000",
     *           "product_qty":1
     *      }],
     *      "package_info":{
     *           "package_weight":7.7,
     *           "package_length":2.2,
     *           "package_width":2.2,
     *           "package_height":2.2,
     *           "reference_code":"12312313212",
     *           "package_note":"我是备注"
     *      },
     *      "consignee_address":{
     *           "consignee_name":"小明",
     *           "consignee_company":"小明公司",
     *           "consignee_phone":"13212341234",
     *           "consignee_email":"xiaoming@qq.com",
     *           "consignee_country":"CN",
     *           "consignee_zipcode":"666363",
     *           "consignee_state":"XX state",
     *           "consignee_city":"洛杉矶",
     *           "consignee_address1":"唐人街1",
     *           "consignee_address2":"唐人街2"
     *      },
     *      "sender_address":{
     *           "sender_name":"EC-chen",
     *           "sender_company":"易仓科技有限公司",
     *           "sender_phone":"13672142212",
     *           "sender_email":"cheng.eccang.com",
     *           "sender_country":"CN",
     *           "sender_zipcode":"518000",
     *           "sender_state":"广东省",
     *           "sender_city":"深圳市",
     *           "sender_address1":"留仙大道",
     *           "sender_address2":"留仙大道2"
     *      },
     *      "order_code":"CQ-210615-0002",
     *      "fill_order":"1",
     *      "verify":0
     * }
     * @return array|mixed
     */
    public function createPackageFloorOrder()
    {
        $this->setService("createPackageFloorOrder");
        return $this->PostSoapXML();
    }

    /**
     * @param $package_code string    Require    包裹代码
     * @return void
     */
    public function setPackageCode(string $package_code)
    {
        $this->params["package_code"] = $package_code;
    }

    /**
     * 编辑落地配订单
     * @package_code string    Require    包裹代码
     * @shipping_method string Require 物流方式 sm_code
     * @warehouse_code String Require 目的仓CODE
     * @order_code String Option 订单号 开启 配置 AL_PACKAGE_FLOOR_BY_ORDER 时订单号必填， 会填充订单仓库代码以及收发件人信息不能修改 未开启配置 填入订单号的信息 以收发件人信息为准
     * @fill_order int Require 是否填充订单信息，默认为0：不填充，1:填充，填充则收件人、寄件人信息不允许修改
     * @verify int Require 是否审核 0新建不审核(草稿状态) 1 新建并审核 ,默认为0 审核通过之后不可编辑
     *
     * @products => items 参数
     * @product_sku String Require 产品SKU
     * @product_declared_name_zh String Option 申报中文名称
     * @product_declared_name String Option 申报名称
     * @product_weight float Require 申报价值
     * @product_weight float Require 产品重量
     * @product_qty Int Require 产品数量
     *
     * @package_info参数
     * @package_weight String Require 包裹重量
     * @package_length String Require 包裹长
     * @package_width String Require 包裹宽
     * @package_height String Require 包裹高
     * @package_length String Require 包裹长
     * @reference_code String Option 参考号
     * @package_note String Option 备注
     *
     * @consignee_address参数
     * @consignee_name String Require 收件人姓名
     * @consignee_company String Option 收件人公司
     * @consignee_phone String Require 收件人电话
     * @consignee_email String Option 收件人邮箱
     * @consignee_country String Require 收件人国家(二字码)
     * @consignee_zipcode String Require 收件人邮编
     * @consignee_state String Require 收件人省州
     * @consignee_city String Require 收件人城市
     * @consignee_address1 String Require 收件人地址1
     * @consignee_address2 String Option 收件人地址2
     *
     * @sender_address参数
     * @sender_name String Require 寄件人姓名
     * @sender_company String Option 寄件人公司
     * @sender_phone String Require 寄件人电话
     * @sender_email String Option 寄件人邮箱
     * @sender_country String Require 寄件人国家(二字码)
     * @sender_zipcode String Require 寄件人邮编
     * @sender_state String Require 寄件人省州
     * @sender_city String Require 寄件人城市
     * @sender_address1 String Require 寄件人地址1
     * @sender_address2 String Option 寄件人地址2
     *
     * 示例：
     * {
     *      "warehouse_code":"DEW",
     *      "shipping_method":"SHUNFENG",
     *      "items":[{
     *           "product_sku":"SKU2",
     *           "product_declared_name_zh":"SKU2",
     *           "product_declared_name":"SKU2",
     *           "product_declared_value":4.00,
     *           "product_weight":"13.000",
     *           "product_qty":1
     *      }],
     *      "package_info":{
     *           "package_weight":7.7,
     *           "package_length":2.2,
     *           "package_width":2.2,
     *           "package_height":2.2,
     *           "reference_code":"12312313212",
     *           "package_note":"我是备注"
     *      },
     *      "consignee_address":{
     *           "consignee_name":"小明",
     *           "consignee_company":"小明公司",
     *           "consignee_phone":"13212341234",
     *           "consignee_email":"xiaoming@qq.com",
     *           "consignee_country":"CN",
     *           "consignee_zipcode":"666363",
     *           "consignee_state":"XX state",
     *           "consignee_city":"洛杉矶",
     *           "consignee_address1":"唐人街1",
     *           "consignee_address2":"唐人街2"
     *      },
     *      "sender_address":{
     *           "sender_name":"EC-chen",
     *           "sender_company":"易仓科技有限公司",
     *           "sender_phone":"13672142212",
     *           "sender_email":"cheng.eccang.com",
     *           "sender_country":"CN",
     *           "sender_zipcode":"518000",
     *           "sender_state":"广东省",
     *           "sender_city":"深圳市",
     *           "sender_address1":"留仙大道",
     *           "sender_address2":"留仙大道2"
     *      },
     *      "order_code":"CQ-210615-0002",
     *      "fill_order":"1",
     *      "verify":0
     * }
     * @return array|mixed
     */
    public function editPackageFloorOrder()
    {
        $this->setService("editPackageFloorOrder");
        return $this->PostSoapXML();
    }
}
