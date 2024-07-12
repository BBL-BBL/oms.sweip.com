<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class ProductModule extends BasicAPI
{
    public function setProductSku($value) // string(80)	Require	SKU
    {
        $this->params["product_sku"] = $value;
    }

    public function setReferenceNo($value) // string(80)	Option(有个配置项可自定义是否校验其它字段 PRODUCT_CREATE_REQUIRED_FIELDS)	自定义编码
    {
        $this->params["reference_no"] = $value;
    }

    public function setProductTitle($value) // string(255)	Require	产品标题
    {
        $this->params["product_title"] = $value;
    }

    public function setProductTitleEn($value) // string(255)	Option	产品英文标题
    {
        $this->params["product_title_en"] = $value;
    }

    public function setProductWeight($value) // decimal(10,3)	Require	重量，单位KG
    {
        $this->params["product_weight"] = $value;
    }

    public function setProductNetWeight($value) // decimal(10,3)	Option	净重，单位KG
    {
        $this->params["product_net_weight"] = $value;
    }

    public function setProductLength($value) // decimal(10,2)	Require	长，单位CM
    {
        $this->params["product_length"] = $value;
    }

    public function setProductWidth($value) // decimal(5,2)	Require	宽，单位CM
    {
        $this->params["product_width"] = $value;
    }

    public function setProductHeight($value) // decimal(10,2)	Require	高，单位CM
    {
        $this->params["product_height"] = $value;
    }

    public function setContainBattery($value) // int(1)	Option	是否含电池，0不含，1含电池
    {
        $this->params["contain_battery"] = $value;
    }

    public function setBatteryType($value) // string(50)	Option	带电类型 非必填 PI970 DHL no more than 2 batteries、PI970 DHL more than 2 batteries、PI967 more than 2 batteries or 4 cells、PI966、PI967
    {
        $this->params["battery_type"] = $value;
    }

    public function setProductDeclaredValue($value) // decimal(10,2)	Require	申报价值，币种为USD
    {
        $this->params["product_declared_value"] = $value;
    }

    public function setProductDeclaredName($value) // string(50)	Require	申报名称 (英文)
    {
        $this->params["product_declared_name"] = $value;
    }

    public function setProductDeclaredNameZh($value) // string(255)	Option	申报名称 (中文)
    {
        $this->params["product_declared_name_zh"] = $value;
    }

    public function setHsCode($value) // string(32)	Option	海关编码
    {
        $this->params["hs_code"] = $value;
    }

    public function setCatLang($value) // string(10)	Option	品类语言，zh中文，en英文，默认为en
    {
        $this->params["cat_lang"] = $value;
    }

    public function setWarningQty($value) // Int(10)	Option	库存预警
    {
        $this->params["warning_qty"] = $value;
    }

    public function setWarningDays($value) // Int(10)	Option	预警天数
    {
        $this->params["warning_days"] = $value;
    }

    public function setProductBrand($value) // string(80)	Option	产品品牌
    {
        $this->params["product_brand"] = $value;
    }

    public function setProductModel($value) // string(100)	Option	产品型号
    {
        $this->params["product_model"] = $value;
    }

    public function setProductOrigin($value) // string(100)	Option	产品原产地
    {
        $this->params["product_origin"] = $value;
    }

    public function setProductMaterial($value) // string(100)	Option	产品材质
    {
        $this->params["product_material"] = $value;
    }

    public function setProductUseEn($value) // string(255)	Option	产品用途[EN]
    {
        $this->params["product_use_en"] = $value;
    }

    public function setProductMaterialEn($value) // string(255)	Option	产品材质[EN]
    {
        $this->params["product_material_en"] = $value;
    }

    public function setProductDescUrl($value) // string(200)	Option	产品信息链接
    {
        $this->params["product_desc_url"] = $value;
    }

    public function setCatIdLevel0($value) // int(10)	Option	一级品类
    {
        $this->params["cat_id_level0"] = $value;
    }

    public function setCatIdLevel1($value) // int(10)	Option	二级品类
    {
        $this->params["cat_id_level1"] = $value;
    }

    public function setCatIdLevel2($value) // int(10)	Option	三级品类
    {
        $this->params["cat_id_level2"] = $value;
    }

    public function setVerify($value) // int(1)	Option	不传或者传0，创建草稿产品，传1，创建正式产品默认为0，产品审核通过之后，不可编辑
    {
        $this->params["verify"] = $value;
    }

    public function setCustomerImg($value) // Object	non-required	产品图片base64
    {
        $this->params["customerImg"] = $value;
    }

    public function setProductColor($value) // string(128)	Option	产品颜色
    {
        $this->params["product_color"] = $value;
    }

    public function setSharedProduct($value) // int(1)	Option	是否共享（0:不共享，1:共享，不填默认传0）
    {
        $this->params["shared_product"] = $value;
    }

    public function setSharedUnitPrice($value) // decimal(10,2)	Option	共享单价（AUD）
    {
        $this->params["Shared_unit_price"] = $value;
    }

    public function setProductDescription($value) // text	Option	产品描述
    {
        $this->params["product_description"] = $value;
    }

    public function setIsBoxMoreSku($value) // int(1)	Option	是否一箱多件 否 1 是 2 未定义 0
    {
        $this->params["is_box_more_sku"] = $value;
    }

    public function setFragileProperty($value) // int(1)	Option	易碎属性，0无易碎，1易碎品
    {
        $this->params["fragile_property"] = $value;
    }

    public function setProductSizeType($value) // string(64)	Option	产品尺码类型
    {
        $this->params["product_size_type"] = $value;
    }


    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $value string(80)    Option    SKU模糊搜索
     * @return void
     */
    public function setProductSkuLike(string $value)
    {
        $this->params["product_sku_like"] = $value;
    }

    /**
     * @param $value array
     * $value = [{
     *     "product_type"=> 0, // 产品形式 0：传SKU；1：产品代码
     *     "product_sku"=> "", // SKU 产品形式为0时为必填
     *     "product_barcode"=> "", // 产品代码 产品形式为1时为必填
     *     "quantity"=> 0, // 数量
     * }]
     * $value = ["EA121","EA110"] 多个SKU,数组格式
     * @return void
     */
    public function setProductSkuArr(array $value)
    {
        $this->params["product_sku_arr"] = $value;
    }

    /**
     * @param $value String    Option    起始时间(产品创建)
     * @return void
     */
    public function setStartTime(string $value)
    {
        $this->params["start_time"] = $value;
    }

    /**
     * @param $value String    Option    结束时间(产品创建)
     * @return void
     */
    public function setEndTime(string $value)
    {
        $this->params["end_time"] = $value;
    }

    /**
     * @param $value String    Option    起始时间(产品更新)
     * @return void
     */
    public function setUpdateStartTime(string $value)
    {
        $this->params["update_start_time"] = $value;
    }

    /**
     * @param $value String    Option    结束时间(产品更新)
     * @return void
     */
    public function setUpdateEndTime(string $value)
    {
        $this->params["update_end_time"] = $value;
    }

    /**
     * 获取产品列表
     * @return void
     */
    public function getProductList()
    {
        $this->setService("getProductList");
        return $this->PostSoapXML();
    }

    /**
     * @param $warehouseCode String(32)    Option    仓库代码
     * @return void
     */
    public function setWarehouseCode(string $warehouseCode)
    {
        $this->params["warehouse_code"] = $warehouseCode;
    }

    /**
     * @param $value array    Option    多个仓库代码,数组格式
     * @return void
     */
    public function setWarehouseCodeArr(array $value)
    {
        $this->params["warehouse_code_arr"] = $value;
    }

    /**
     * @param $value int(1) Option 是否低于预警库存（0全部 1是 2否）
     * @return void
     */
    public function setIsWarning(int $value)
    {
        $this->params["is_warning"] = $value;
    }

    /**
     * @param $value int(1) Option 搜索类型（1精准，0模糊）默认精准查询，用于product_title、product_sku的查询
     * @return void
     */
    public function setSearchType(int $value)
    {
        $this->params["search_type"] = $value;
    }

    /**
     * 获取产品库存
     * @return void
     */
    public function getProductInventory()
    {
        $this->setService("getProductInventory");
        return $this->PostSoapXML();
    }

    /**
     * 创建产品
     * @return void
     */
    public function createProduct()
    {
        $this->setService("createProduct");
        return $this->PostSoapXML();
    }

    /**
     * 修改产品
     * @return void
     */
    public function modifyProduct()
    {
        $this->setService("modifyProduct");
        return $this->PostSoapXML();
    }

    /**
     * 获取共享产品列表
     * @return void
     */
    public function getAllSharedProduct()
    {
        $this->setService("getAllSharedProduct");
        return $this->PostSoapXML();
    }

    /**
     * @param $value string(80) OptionFN SKU
     * @return void
     */
    public function setFnSku(string $value)
    {
        $this->params["fn_sku"] = $value;
    }

    /**
     * @param $value Object Option多个FN SKU,数组格式
     * @return void
     */
    public function setFnSkuArr($value)
    {
        $this->params["fn_sku_arr"] = $value;
    }

    /**
     * 获取FN SKU映射关系
     * @return void
     */
    public function getFnSkuMap()
    {
        $this->setService("getFnSkuMap");
        return $this->PostSoapXML();
    }

    /**
     * @param $value string datetime Require    有效期
     * @return void
     */
    public function setValidityPeriod(string $value)
    {
        $this->params["validity_period"] = $value;
    }

    /**
     * @param $value int(11) Require    共享数量
     * @return void
     */
    public function setNumberOfShares(int $value)
    {
        $this->params["number_of_shares"] = $value;
    }

    /**
     * 创建共享产品
     * @return void
     */
    public function createSharedProduct()
    {
        $this->setService("createSharedProduct");
        return $this->PostSoapXML();
    }

    /**
     * @param $value array 多个序列号,数组格式,每个序列号最大长度(100)字符
     * $value = ["test123","test124"]
     * @return void
     */
    public function setProductSerialNumberArr(array $value)
    {
        $this->params['product_serial_number_arr'] = $value;
    }

    /**
     * 创建产品序列号
     * @return void
     */
    public function createProductSerial()
    {
        $this->setService("createProductSerial");
        return $this->PostSoapXML();
    }

    /**
     * @param $value int(2) 字体大小, 15-50之间的数字
     * @return void
     */
    public function setFontSize(int $value)
    {
        $this->params["font_size"] = $value;
    }

    /**
     * @param $value int(1) 操作类型,
     *                      0：表示PDF（条形码）；
     *                      1：表示PDF（二维码）；
     * @return void
     */
    public function setOperateType(int $value)
    {
        $this->params["operate_type"] = $value;
    }

    /**
     * @param $value int(2) 打印尺寸,
     *                      1、100*100；
     *                      2、100*30；
     *                      3、100*60；
     *                      4、50*30；
     *                      5、70*30；
     *                      6、A4（3）；
     *                      7、A4(4)；
     *                      8、90*30；
     *                      9、A4（3*9new）
     *                      10、A4（3*8）
     *                      11、US_Letter(3)
     *                      12、US_Letter(4)
     *                      说明：不传，默认传1
     * @return void
     */
    public function setPrintSize(int $value)
    {
        $this->params["print_size"] = $value;
    }

    /**
     * @param $value string(50) 打印编码,
     *                          1、产品条码
     *                          2、产品SKU
     *                          3、自定义编码
     *                          4、库内编码
     *                          5、产品条码+库内编码
     * @return void
     */
    public function setPrintCodeType(string $value)
    {
        $this->params["print_code_type"] = $value;
    }

    /**
     * @param $value string(30) 附加信息,
     *                          1、产品名称
     *                          2、客户编码
     *                          3、产品条码
     *                          4、产品SKU
     *                          5、自定义编码
     *                          6、Made in china
     *                          7、日期
     *                          8、分隔符
     *                          （支持传多个值，中间以英文逗号隔开）
     * @return void
     */
    public function setExtraPrintInfo(string $value)
    {
        $this->params["extra_print_info"] = $value;
    }

    /**
     * 获取产品PDF
     * @return void
     */
    public function getProductPdf()
    {
        $this->setService("getProductPdf");
        return $this->PostSoapXML();
    }

    /**
     * @param $value Object    Require    业务数据
     * $value = [{
     *     "warehouse_id"=>0,       // int(11)    仓库ID
     *      "product_barcode"=>"",  // string(80)    产品代码
     *      "quantity"=>0           // int(11)    预警库存数量
     * }]
     * @return void
     */
    public function setData($value)
    {
        $this->params["data"] = $value;
    }

    /**
     * 设置预警库存
     * @return void
     */
    public function setWarningInventory()
    {
        $this->setService("setWarningInventory");
        return $this->PostSoapXML();
    }
}
