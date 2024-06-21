<?php

namespace OmsSweip;

// 在 BasicData.php 文件顶部添加
require_once __DIR__ . '/oms-sweip.php';

class FBAModule extends BasicAPI
{

    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $fba_code String(32)    Option    FBA单号,有则update,无则add
     * @return void
     */
    public function setFbaCode(string $fba_code)
    {
        $this->params["fba_code"] = $fba_code;
    }

    /**
     * @param $reference_number String(32)    Option    参考号（不能重复）
     * @return void
     */
    public function setReferenceNumber(string $reference_number)
    {
        $this->params["reference_number"] = $reference_number;
    }

    /**
     * @param $fba_type Int(4)    Require    类型:1转运,2订单
     * @return void
     */
    public function setFbaType(int $fba_type)
    {
        $this->params["fba_type"] = $fba_type;
    }

    /**
     * @param $fba_id int(11)    Option    FBA仓库id(03版之前使用,对应获取FBA仓接口里的《FBA地址的ID》的参数)，不使用FBA仓请传空
     * @return void
     */
    public function setFbaId(int $fba_id)
    {
        $this->params["fba_id"] = $fba_id;
    }

    /**
     * @param $fba_w_code String(255)    Option    FBA仓库代码(推荐用代码,对应获取FBA仓接口里的《FBA地址的CODE》的参数)，不使用FBA仓请传空
     * @return void
     */
    public function setFbaWCode(string $fba_w_code)
    {
        $this->params["fba_w_code"] = $fba_w_code;
    }

    /**
     * @param $sm_type Int(4)    Option    (FBA转运必需)转运类型:1国内中转,2海外中转,3海外换标,4中转备货,5自发备货
     * @return void
     */
    public function setSmType(int $sm_type)
    {
        $this->params["sm_type"] = $sm_type;
    }

    /**
     * @param $amazon_shipment string(64)    Option    Amazon Shipment Id
     * @return void
     */
    public function setAmazonShipment(string $amazon_shipment)
    {
        $this->params["amazon_shipment"] = $amazon_shipment;
    }

    /**
     * @param $amazon_reference string(64)    Option    Amazon reference Id
     * @return void
     */
    public function setAmazonReference(string $amazon_reference)
    {
        $this->params["amazon_reference"] = $amazon_reference;
    }

    /**
     * @param $to_warehouse_code String(32)    Require    FBA订单:发货仓CODE,FBA转运:转运仓CODE
     * @return void
     */
    public function setToWarehouseCode(string $to_warehouse_code)
    {
        $this->params["to_warehouse_code"] = $to_warehouse_code;
    }

    /**
     * @param $transit_warehouse_code String(32)    Option    交货仓code(FBA转运单国内中转类型必填)
     * @return void
     */
    public function setTransitWarehouseCode(string $transit_warehouse_code)
    {
        $this->params["transit_warehouse_code"] = $transit_warehouse_code;
    }

    /**
     * @param $stock_type int(1)    Require    库存类型：0以仓库为准,1标准区，2转运区,3退件暂存区
     * @return void
     */
    public function setStockType(int $stock_type)
    {
        $this->params["stock_type"] = $stock_type;
    }

    /**
     * @param $sm_code string(64)    Option    派送渠道（wms设置了黑名单的渠道不能填）
     * @return void
     */
    public function setSmCode(string $sm_code)
    {
        $this->params["sm_code"] = $sm_code;
    }

    /**
     * @param $is_insurance int(1)    Option    保险服务:0否,1是
     * @return void
     */
    public function setIsInsurance(int $is_insurance)
    {
        $this->params["is_insurance"] = $is_insurance;
    }

    /**
     * @param $insurance_value float((10,3))    Option    投保金额(is_insurance字段为1时必填)
     * @return void
     */
    public function setInsuranceValue(float $insurance_value)
    {
        $this->params["insurance_value"] = $insurance_value;
    }

    /**
     * @param $fba_remarks string(255)    Option    备注
     * @return void
     */
    public function setFbaRemarks(string $fba_remarks)
    {
        $this->params["fba_remarks"] = $fba_remarks;
    }

    /**
     * @param $fba_fn_sku Object    Option    FN SKU明细(标准订单需要去掉此参数)
     * $fba_fn_sku = [{
     *      "box_no"=>"",// String(16) Option 箱号(从1开始)
     *      "fn_sku"=>"",// String(128) Require FN SKU
     *      "quantity"=>0,// Int(11) Require FN SKU数量
     * }]
     * @return void
     */
    public function setFbaFnSku($fba_fn_sku)
    {
        $this->params["fba_fn_sku"] = $fba_fn_sku;
    }

    /**
     * @param $boxRows Object    Option    箱子明细(fba_type为1时必填)
     * $boxRows = {
     *      "customer_box_number":["1","2","3"], // 客户箱号
     *      "box_num":["1","2","3"], // 箱号
     *      "box_length":["2","3","6"], // 箱子长
     *      "box_width":["5","2","5"], // 箱子宽
     *      "box_height":["6","5","4"], // 箱子高
     *      "box_weight":["3","2","4"], // 箱子重量
     *      "product_qty":["5","6","9"], // 产品重量
     *      "tracking_number":["56411","54651","156146"] // 跟踪号
     * }
     * @return void
     */
    public function setBoxRows($boxRows)
    {
        $this->params["boxRows"] = $boxRows;
    }

    /**
     * @param $boxDetail Object    Option    箱子明细(fba_type为1时必填)
     * $boxDetail = { FBA订单不必须,FBA转运必需
     *      "box_num"=>"",//  Int(11)    箱号
     *      "product_barcode"=>"",//  String(80)    产品编码
     *      "platform_barcode"=>"",//  String(80)    平台编号
     *      "product_title"=>"",//  String(100)    产品名称
     *      "length"=>"",//  Float(6,2)    长
     *      "width"=>"",//  Float(6,2)    宽
     *      "height"=>"",//  Float(6,2)    高
     *      "weight"=>"",//  Float(8,3)    产品重量
     *      "quantity"=>"",//  Int(11)    数量
     * }
     * @return void
     */
    public function setBoxDetail($boxDetail)
    {
        $this->params["boxDetail"] = $boxDetail;
    }

    /**
     * @param $fbaAddress Object    Option    箱子明细(fba_type为1时必填)
     * $fbaAddress = { FBA订单不必须,FBA转运必需
     *      "street1"=>"", // String(200) 街道地址1
     *      "street2"=>"", // String(200) 街道地址2
     *      "doorplate"=>"", // String(64) 门牌号
     *      "postal_code"=>"", // String(16) 邮编
     *      "city"=>"", // String(120) 城市
     *      "state"=>"", // String(120) 省/州
     *      "country_code"=>"", // String(6) 国家
     *      "consignee"=>"", // String(100) 收件人
     *      "consignee_phone"=>"", // String(30) 电话
     *      "consignee_email"=>"", // String(100) 邮箱
     *      "consignee_company"=>"", // String(200) 公司名称
     * }
     * @return void
     */
    public function setFbaAddress($fbaAddress)
    {
        $this->params["fbaAddress"] = $fbaAddress;
    }

    /**
     * @param $box_info Object    Option    箱子明细(fba_type为1时必填)
     * $box_info = { FBA订单不必须,FBA转运必需
     *      "stock_code" String(48) Require 备货单号
     *      "box_code" String(48) Require 箱号
     *      "platform_box_code" String(32) Option 平台箱号
     * }
     * @return void
     */
    public function setBox_info($box_info)
    {
        $this->params["box_info"] = $box_info;
    }

    /**
     * @param $products Object    Option    产品明细(fba_type为3时必填)
     * $products = [{
     *      "box_no"=>1, // int(11) Option 箱号(从1开始)
     *      "product_barcode"=>"", // String(80) Require 产品编码
     *      "platform_barcode"=>"", // String(80) Option 平台编码
     *      "product_title"=>"", // String(100) Option 产品标题
     *      "quantity"=>1, // Int(11) Require 产品数量
     * }]
     * @return void
     */
    public function setProducts($products)
    {
        $this->params["products"] = $products;
    }

    /**
     * @param $attachments Object    Option    单据附件
     * $attachments = [{
     *      "attach_name"=>"", // String(250) Require 附件名字
     *      "attach_path"=>"", // String(250) Require 附件内容（格式：base64编码）
     *      "attach_note"=>"", // String(255) Option 备注说明
     *      "attach_type"=>"", // String(20) Require 附件后缀（仅支持rar,zip,pdf,doc,docx,xls,xlsx）
     * }]
     * @return void
     */
    public function setAttachments($attachments)
    {
        $this->params["attachments"] = $attachments;
    }

    /**
     * @param $is_batch_ship int(1)    Option    是否分批发货 1是 0不是(默认值为0)
     * @return void
     */
    public function setIsBatchShip(int $is_batch_ship)
    {
        $this->params["is_batch_ship"] = $is_batch_ship;
    }

    /**
     * @param $box_info Object    Option    FBA订单装箱信息(is_batch_ship为1时必填)
     * @return void
     */
    public function setBoxInfo($box_info)
    {
        $this->params["box_info"] = $box_info;
    }

    /**
     * 创建或编辑FBA单据
     * @fba_code String(32)    Option    FBA单号,有则update,无则add
     * @reference_number String(32)    Option    参考号（不能重复）
     * @fba_type Int(4)    Require    类型:1转运,2订单
     * @fba_id int(11)    Option    FBA仓库id(03版之前使用,对应获取FBA仓接口里的《FBA地址的ID》的参数)，不使用FBA仓请传空
     * @fba_w_code String(255)    Option    FBA仓库代码(推荐用代码,对应获取FBA仓接口里的《FBA地址的CODE》的参数)，不使用FBA仓请传空
     * @sm_type Int(4)    Option    (FBA转运必需)转运类型:1国内中转,2海外中转,3海外换标,4中转备货,5自发备货
     * @amazon_shipment string(64)    Option    Amazon Shipment Id
     * @amazon_reference string(64)    Option    Amazon reference Id
     * @to_warehouse_code String(32)    Require    FBA订单:发货仓CODE,FBA转运:转运仓CODE
     * @transit_warehouse_code String(32)    Option    交货仓code(FBA转运单国内中转类型必填)
     * @stock_type int(1)    Require    库存类型：0以仓库为准,1标准区，2转运区,3退件暂存区
     * @sm_code string(64)    Option    派送渠道（wms设置了黑名单的渠道不能填）
     * @is_insurance int(1)    Option    保险服务:0否,1是
     * @insurance_value float((10,3))    Option    投保金额(is_insurance字段为1时必填)
     * @fba_remarks string(255)    Option    备注
     * @fba_fn_sku Object    Option    FN SKU明细(标准订单需要去掉此参数)
     * @boxRows Object    Option    箱子明细(fba_type为1时必填)
     * @products Object    Option    产品明细(fba_type为3时必填)
     * @attachments Object    Option    单据附件
     * @is_batch_ship int(1)    Option    是否分批发货 1是 0不是(默认值为0)
     * @box_info Object    Option    FBA订单装箱信息(is_batch_ship为1时必填)
     *
     * 示例：
     * {
     *      "fba_code":"FD31-170601-0001",
     *      "reference_number":"123",
     *      "fba_type":"2",
     *      "sm_type":"1",
     *      "fba_id":1,
     *      "fba_w_code":"FBA-DEW",
     *      "amazon_shipment":"100101",
     *      "amazon_reference":"2016526666",
     *      "to_warehouse_code":"USLA",
     *      "transit_warehouse_code":"RU",
     *      "stock_type":"1",
     *      "sm_code":"DHL-SKY",
     *      "is_insurance":"1",
     *      "insurance_value":"1.20",
     *      "fba_remarks":"这是备注,fba创建",
     *      "is_batch_ship":"0",
     *      "fba_fn_sku":[{
     *           "box_no":1,
     *           "fn_sku":"4365464",
     *           "quantity":"2"
     *      }],
     *      "products":[{
     *           "box_no":"1",
     *           "product_barcode":"8989223",
     *           "platform_barcode":"EC-666666",
     *           "product_title":"产品标题",
     *           "quantity":6
     *      }],
     *      "attachments":[{
     *           "attach_name":"FD-201705251755-1",
     *           "attach_path":"base64编码",
     *           "attach_note":"EC-666666",
     *           "attach_type":"rar"
     *      }],
     *      "boxRows":{
     *           "customer_box_number":["1","2","3"],
     *           "box_num":["1","2","3"],
     *           "box_length":["2","3","6"],
     *           "box_width":["5","2","5"],
     *           "box_height":["6","5","4"],
     *           "box_weight":["3","2","4"],
     *           "product_qty":["5","6","9"],
     *           "tracking_number":["56411","54651","156146"]
     *      },
     *      "boxDetail":{
     *           "box_num":["1","2","3"],
     *           "product_barcode":["2132","1233","1236"],
     *           "platform_barcode":["12315","12312","123125"],
     *           "product_title":["6","5","4"],
     *           "length":["3","2","4"],
     *           "width":["5","6","9"],
     *           "height":["1","3","2"],
     *           "weight":["2","3","4"],
     *           "quantity":["1","11","6"]
     *      },
     *      "fba_address":{
     *           "street1":"街道地址1",
     *           "street2":"街道地址2",
     *           "doorplate":"门牌号",
     *           "postal_code":"邮编",
     *           "city":"城市",
     *           "state":"省/州",
     *           "country_code":"国家:",
     *           "consignee":"收件人",
     *           "consignee_phone":"电话",
     *           "consignee_email":"邮箱",
     *           "consignee_company":"公司名称"
     *      },
     *      "box_info":{
     *           "stock_code":"1111",
     *           "box_code":"2222",
     *           "platform_box_code":"33333"
     *      }
     * }
     * @return array|mixed
     */
    public function createOrEditFbaOrder()
    {
        $this->setService("createOrEditFbaOrder");
        return $this->PostSoapXML();
    }

    /**
     * 审核FBA单据
     * @fba_code    String    Require    FBA单号
     * 示例：{ "fba_code":"FD31-20170526-0001" }
     * @return array|mixed
     */
    public function releaseFbaOrder()
    {
        $this->setService("releaseFbaOrder");
        return $this->PostSoapXML();
    }

    /**
     * 查询FBA单据信息
     * @fba_code    String    Require    FBA单号
     * 示例：{ "fba_code":"FD31-20170526-0001" }
     * @return array|mixed
     */
    public function queryFbaOrder()
    {
        $this->setService("queryFbaOrder");
        return $this->PostSoapXML();
    }

    /**
     * 取消FBA单据
     * @fba_code    String    Require    FBA单号
     * 示例：{ "fba_code":"FD31-20170526-0001" }
     * @return array|mixed
     */
    public function cancelFbaOrder()
    {
        $this->setService("cancelFbaOrder");
        return $this->PostSoapXML();
    }

    /**
     * @param $fba_code_arr array Option 多个fba单号,数组格式
     * @return void
     */
    public function setFbaCodeArr(array $fba_code_arr)
    {
        $this->params["fba_code_arr"] = $fba_code_arr;
    }

    /**
     * @param $create_date_from string Option fba订单创建开始时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @return void
     */
    public function setCreateDateFrom(string $create_date_from)
    {
        $this->params["create_date_from"] = $create_date_from;
    }

    /**
     * @param $create_date_to string Option fba订单创建结束时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @return void
     */
    public function setCreateDateTo(string $create_date_to)
    {
        $this->params["create_date_to"] = $create_date_to;
    }

    /**
     * @param $modify_date_from string Option fba订单修改开始时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @return void
     */
    public function setModifyDateFrom(string $modify_date_from)
    {
        $this->params["modify_date_from"] = $modify_date_from;
    }

    /**
     * @param $modify_date_to string Option fba订单修改结束时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @return void
     */
    public function setModifyDateTo(string $modify_date_to)
    {
        $this->params["modify_date_to"] = $modify_date_to;
    }

    /**
     * 批量查询FBA单据
     * @pageSize Int Require 每页数据长度，最大值100
     * @page Int Require 当前页
     * @fba_code string Option fba单号
     * @fba_type string Option fba类型:1转运,2订单
     * @fba_code_arr Object Option 多个fba单号,数组格式
     * @create_date_from string Option fba订单创建开始时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @create_date_to string Option fba订单创建结束时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @modify_date_from string Option fba订单修改开始时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @modify_date_to string Option fba订单修改结束时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * 示例：
     * {
     *      "pageSize":"20",
     *      "page":"1",
     *      "fba_code":"",
     *      "fba_type":"",
     *      "fba_code_arr":[],
     *      "create_date_from":"",
     *      "create_date_to":"",
     *      "modify_date_from":"",
     *      "modify_date_to":""
     * }
     * @return array|mixed
     */
    public function batchQueryFbaOrder()
    {
        $this->setService("batchQueryFbaOrder");
        return $this->PostSoapXML();
    }

    /**
     * 获取FBA退件列表
     * @pageSize Int Require 每页数据长度，最大值100
     * @page Int Require 当前页
     * @fba_code string Option fba退件单号
     * @fba_code_arr Object Option 多个fba退件单号,数组格式
     * @create_date_from string Option fba退件单创建开始时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @create_date_to string Option fba退件单创建结束时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @modify_date_from string Option fba退件单修改开始时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * @modify_date_to string Option fba退件单修改结束时间， 格式YYYY-MM-DD HH:II:SS fba单号传值时，该参数无效
     * 示例：
     * {
     *      "pageSize": "20",
     *      "page": "1",
     *      "fba_code": "",
     *      "fba_code_arr": [
     *      "FRTEST1-44-230215-0001"
     *      ],
     *      "create_date_from": "",
     *      "create_date_to": "",
     *      "modify_date_from": "",
     *      "modify_date_to": 0
     * }
     * @return array|mixed
     */
    public function getFbaReturnOrderList()
    {
        $this->setService("getFbaReturnOrderList");
        return $this->PostSoapXML();
    }

    /**
     * 获取FBA仓接口
     * @fba_w_code String Option FBA仓代码 非必填,但如果有ID,优先选用ID
     * @fba_id Int Option FBA仓ID 非必填,但如果有ID,优先选用ID
     * 示例：
     * {
     *      "fba_w_code":"FBA111",
     *      "fba_id":"2"
     * }
     * @return array|mixed
     */
    public function searchFbaWarehouse()
    {
        $this->setService("searchFbaWarehouse");
        return $this->PostSoapXML();
    }

    /**
     * @param $fbaId String Option FBA仓代码 非必填,但如果有ID,优先选用ID
     * @return void
     */
    public function setFbaId2(string $fbaId)
    {
        $this->params["fbaId"] = $fbaId;
    }

    /**
     * @param $warehouseCode Int Option FBA仓ID 非必填,但如果有ID,优先选用ID
     * @return void
     */
    public function setWarehouseCode(int $warehouseCode)
    {
        $this->params["warehouseCode"] = $warehouseCode;
    }

    /**
     * 获取FBA运输方式接口
     * @fba_w_code String Option FBA仓代码 非必填,但如果有ID,优先选用ID
     * @fba_id Int Option FBA仓ID 非必填,但如果有ID,优先选用ID
     * 示例：
     * {
     *      "fbaId":"2",
     *      "warehouseCode":"USPA"
     * }
     * @return array|mixed
     */
    public function getFbaShippingMethod()
    {
        $this->setService("getFbaShippingMethod");
        return $this->PostSoapXML();
    }

    /**
     * @param $return_code string Option fba退件单号
     * @return void
     */
    public function setReturnCode(string $return_code)
    {
        $this->params["return_code"] = $return_code;
    }

    /**
     * @param $return_code_arr array Option 多个fba退件单号,数组格式
     * @return void
     */
    public function setReturnCodeArr(array $return_code_arr)
    {
        $this->params["return_code_arr"] = $return_code_arr;
    }

    /**
     * @param $time_from string Option 创建开始时间， 格式YYYY-MM-DD HH:II:SS 退件单号传值时，该参数无效
     * @return void
     */
    public function setTimeFrom(string $time_from)
    {
        $this->params["time_from"] = $time_from;
    }

    /**
     * @param $time_to string Option 创建结束时间， 格式YYYY-MM-DD HH:II:SS 退件单号传值时，该参数无效
     * @return void
     */
    public function setTimeTo(string $time_to)
    {
        $this->params["time_to"] = $time_to;
    }

    /**
     * @param $tracking_number string Option 跟踪单号
     * @return void
     */
    public function setTrackingNumber(string $tracking_number)
    {
        $this->params["tracking_number"] = $tracking_number;
    }

    /**
     * @param $tracking_status int Option 到货状态：0-已作废，1-待入库，2-已到仓，3-已拆包，4-已上架，5-已签出，6-已处理，7-已退回国内
     * @return void
     */
    public function setTrackingStatus(int $tracking_status)
    {
        $this->params["tracking_status"] = $tracking_status;
    }

    /**
     * @param $put_status int Option 上架状态：0-暂存，1-待上架，2-已上架
     * @return void
     */
    public function setPutStatus(int $put_status)
    {
        $this->params["put_status"] = $put_status;
    }

    /**
     * @param $warehouse_id int Option 仓库ID
     * @return void
     */
    public function setWarehouseId(int $warehouse_id)
    {
        $this->params["warehouse_id"] = $warehouse_id;
    }

    /**
     * 平台退件包裹列表
     * @page_size Int Require 每页数据长度，最大值100
     * @page int Require 当前页
     * @return_code string Option fba退件单号
     * @return_code_arr object Option 多个fba退件单号,数组格式
     * @time_from string Option 创建开始时间， 格式YYYY-MM-DD HH:II:SS 退件单号传值时，该参数无效
     * @time_to string Option 创建结束时间， 格式YYYY-MM-DD HH:II:SS 退件单号传值时，该参数无效
     * @tracking_number string Option 跟踪单号
     * @tracking_status int Option 到货状态：0-已作废，1-待入库，2-已到仓，3-已拆包，4-已上架，5-已签出，6-已处理，7-已退回国内
     * @put_status int Option 上架状态：0-暂存，1-待上架，2-已上架
     * @warehouse_id int Option 仓库ID
     * 示例：
     * {
     *      "return_code":"FRTC-44-230829-0045",
     *      "tracking_number": "",
     *      "return_code_arr": [],
     *      "tracking_status": "",
     *      "put_status": "",
     *      "warehouse_id": 1,
     *      "time_from": "2023-08-29 13:59:30",
     *      "time_to": "2023-08-29 13:59:41",
     *      "page": 1,
     *      "page_size": 10
     * }
     * @return array|mixed
     */
    public function getFbaReturnPackageList()
    {
        $this->setService("getFbaReturnPackageList");
        return $this->PostSoapXML();
    }


}
