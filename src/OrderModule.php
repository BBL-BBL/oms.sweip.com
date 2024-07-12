<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class OrderModule extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $country_code string    Require    收件人国家二字码，参考getCountry
     * @return void
     */
    public function setCountryCode(string $country_code)
    {
        $this->params["country_code"] = $country_code;
    }

    /**
     * @param $shipping_method string    Require    运输方式，参考getShippingMethod
     * 创建订单时：  配送方式，参考getShippingMethod。如果配置了(CPCAINIAO),该值就只能传配置的（CPSHIPPINGMETHOD）
     * @return void
     */
    public function setShippingMethod(string $shipping_method)
    {
        $this->params["shipping_method"] = $shipping_method;
    }

    /**
     * @param $consignee_province string    Option    省
     * @return void
     */
    public function setConsigneeProvince(string $consignee_province)
    {
        $this->params["consignee_province"] = $consignee_province;
    }

    /**
     * @param $consignee_city string    Option    城市
     * @return void
     */
    public function setConsigneeCity(string $consignee_city)
    {
        $this->params["consignee_city"] = $consignee_city;
    }

    /**
     * @param $consignee_street string    Option    地址1 (length:30)
     * @return void
     */
    public function setConsigneeStreet(string $consignee_street)
    {
        $this->params["consignee_street"] = $consignee_street;
    }

    /**
     * @param $consignee_street1 string    Option    地址2 (length:30)
     * @return void
     */
    public function setConsigneeStreet1(string $consignee_street1)
    {
        $this->params["consignee_street1"] = $consignee_street1;
    }

    /**
     * @param $consignee_street2 string    Option    地址3 (length:30)
     * @return void
     */
    public function setConsigneeStreet2(string $consignee_street2)
    {
        $this->params["consignee_street2"] = $consignee_street2;
    }

    /**
     * @param $consignee_postcode string    Option    邮编
     * @return void
     */
    public function setConsigneePostcode(string $consignee_postcode)
    {
        $this->params["consignee_postcode"] = $consignee_postcode;
    }

    /**
     * @param $consignee_areacode string    Option    地区代码
     * @return void
     */
    public function setConsigneeAreacode(string $consignee_areacode)
    {
        $this->params["consignee_areacode"] = $consignee_areacode;
    }

    /**
     * @param $consignee_doorplate string    Option    门牌号
     * @return void
     */
    public function setConsigneeDoorplate(string $consignee_doorplate)
    {
        $this->params["consignee_doorplate"] = $consignee_doorplate;
    }

    /**
     * @param $consignee_company string    Option    公司名
     * @return void
     */
    public function setConsigneeCompany(string $consignee_company)
    {
        $this->params["consignee_company"] = $consignee_company;
    }

    /**
     * @param $consignee_name string    Option    收件人姓名
     * @return void
     */
    public function setConsigneeName(string $consignee_name)
    {
        $this->params["consignee_name"] = $consignee_name;
    }

    /**
     * @param $consignee_telephone string    Option    收件人联系方式
     * @return void
     */
    public function setConsigneeTelephone(string $consignee_telephone)
    {
        $this->params["consignee_telephone"] = $consignee_telephone;
    }

    /**
     * @param $consignee_email string    Option    收件人邮箱
     * @return void
     */
    public function setConsigneeEmail(string $consignee_email)
    {
        $this->params["consignee_email"] = $consignee_email;
    }

    /**
     * @param $consignee_fax string    Option    传真
     * @return void
     */
    public function setConsigneeFax(string $consignee_fax)
    {
        $this->params["consignee_fax"] = $consignee_fax;
    }

    /**
     * @param $api_check string    Option    是否调用服务商接口校验地址(前提必须在渠道开启地址校验并且服务商api支持)
     * @return void
     */
    public function setApiCheck(string $api_check)
    {
        $this->params["api_check"] = $api_check;
    }

    /**
     * @param $order_code string    Option    订单号
     * @return void
     */
    public function setOrderCode(string $order_code)
    {
        $this->params["order_code"] = $order_code;
    }

    /**
     * @param $sw_order_number string(32)    Option    公共平台订单号
     * @return void
     */
    public function setSwOrderNumber(string $sw_order_number)
    {
        $this->params["sw_order_number"] = $sw_order_number;
    }

    /**
     * @param $order_status string    Option    订单状态 C:待发货审核 W:待发货 D:已发货 H:暂存 N:异常订单 P:问题件 X:废弃
     * @return void
     */
    public function setOrderStatus(string $order_status)
    {
        $this->params["order_status"] = $order_status;
    }

    /**
     * @param $order_code_arr array    Option    多个订单号,数组格式
     * @return void
     */
    public function setOrderCodeArr(array $order_code_arr)
    {
        $this->params["order_code_arr"] = $order_code_arr;
    }

    /**
     * @param $create_date_from string    Option    订单创建开始时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setCreateDateFrom(string $create_date_from)
    {
        $this->params["create_date_from"] = $create_date_from;
    }

    /**
     * @param $create_date_to string    Option    订单创建结束时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setCreateDateTo(string $create_date_to)
    {
        $this->params["create_date_to"] = $create_date_to;
    }

    /**
     * @param $modify_date_from string    Option    订单修改开始时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setModifyDateFrom(string $modify_date_from)
    {
        $this->params["modify_date_from"] = $modify_date_from;
    }

    /**
     * @param $modify_date_to string    Option    订单修改结束时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setModifyDateTo(string $modify_date_to)
    {
        $this->params["modify_date_to"] = $modify_date_to;
    }

    /**
     * @param $ship_date_from string    Option    订单出库开始时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setShipDateFrom(string $ship_date_from)
    {
        $this->params["ship_date_from"] = $ship_date_from;
    }

    /**
     * @param $ship_date_to string    Option    订单出库结束时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setShipDateTo(string $ship_date_to)
    {
        $this->params["ship_date_to"] = $ship_date_to;
    }

    /**
     * @param $reference_no string(64)    Require    订单参考号(建议使用平台单号)
     * @return void
     */
    public function setReferenceNo(string $reference_no)
    {
        $this->params["reference_no"] = $reference_no;
    }

    /**
     * @param $aliexpress_order_no string(64)    Option    平台订单号(例如速卖通平台订单号)
     * @return void
     */
    public function setAliexpressOrderNo(string $aliexpress_order_no)
    {
        $this->params["aliexpress_order_no"] = $aliexpress_order_no;
    }

    /**
     * @param $lp_order_number string(64)    Option    LP订单号
     * @return void
     */
    public function setLpOrderNumber(string $lp_order_number)
    {
        $this->params["lp_order_number"] = $lp_order_number;
    }

    /**
     * @param $platform string(12)    Option    平台， ALIEXPRESS, AMAZON, B2C, EBAY, OTHER 默认OTHER
     * @return void
     */
    public function setPlatform(string $platform)
    {
        $this->params["platform"] = $platform;
    }

    /**
     * @param $allocated_auto string    Option    自动分仓:0无,1自动分仓
     * @return void
     */
    public function setAllocatedAuto(string $allocated_auto)
    {
        $this->params["allocated_auto"] = $allocated_auto;
    }

    /**
     * @param $warehouse_code string(20)    Require    配送仓库，参考getWarehouse。配置(checkCustomerWarehouseIsCloud)开启必传
     * @return void
     */
    public function setWarehouseCode(string $warehouse_code)
    {
        $this->params["warehouse_code"] = $warehouse_code;
    }

    /**
     * @param $province string(128)    Option    省/州/府
     * @return void
     */
    public function setProvince(string $province)
    {
        $this->params["province"] = $province;
    }

    /**
     * @param $city string(128)    Option    城市/区
     * @return void
     */
    public function setCity(string $city)
    {
        $this->params["city"] = $city;
    }

    /**
     * @param $district string(64)    Option    收件人区
     * @return void
     */
    public function setDistrict(string $district)
    {
        $this->params["district"] = $district;
    }

    /**
     * @param $address1 string(500)    Require    地址1 (length:30)
     * @return void
     */
    public function setAddress1(string $address1)
    {
        $this->params["address1"] = $address1;
    }

    /**
     * @param $address2 string(500)    Require    地址2 (length:30)
     * @return void
     */
    public function setAddress2(string $address2)
    {
        $this->params["address2"] = $address2;
    }

    /**
     * @param $address3 string(500)    Require    地址3 (length:30)
     * @return void
     */
    public function setAddress3(string $address3)
    {
        $this->params["address3"] = $address3;
    }

    /**
     * @param $zipcode string(32)    Require    邮编；收件人国家为菲律宾，邮编非必填
     * @return void
     */
    public function setZipcode(string $zipcode)
    {
        $this->params["zipcode"] = $zipcode;
    }

    /**
     * @param $license string(80)    Option    收件人证件号
     * @return void
     */
    public function setLicense(string $license)
    {
        $this->params["license"] = $license;
    }

    /**
     * @param $doorplate string(32)    Option    门牌号
     * @return void
     */
    public function setDoorplate(string $doorplate)
    {
        $this->params["doorplate"] = $doorplate;
    }

    /**
     * @param $company string(128)    Option    公司名
     * @return void
     */
    public function setCompany(string $company)
    {
        $this->params["company"] = $company;
    }

    /**
     * @param $name string(128)    Require    收件人姓名
     * @return void
     */
    public function setName(string $name)
    {
        $this->params["name"] = $name;
    }

    /**
     * @param $phone string(64)    Require    收件人联系方式
     * @return void
     */
    public function setPhone($phone)
    {
        $this->params["phone"] = $phone;
    }

    /**
     * @param $cell_phone string(64)    Option    收件人联系方式2
     * @return void
     */
    public function setCellPhone($cell_phone)
    {
        $this->params["cell_phone"] = $cell_phone;
    }

    /**
     * @param $phone_extension string(64)    Option    收件人电话分机
     * @return void
     */
    public function setPhoneExtension($phone_extension)
    {
        $this->params["phone_extension"] = $phone_extension;
    }

    /**
     * @param $email string(64)    Option    收件人邮箱
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->params["email"] = $email;
    }

    /**
     * @param $platform_shop string(128)    Option    平台店铺
     * @return void
     */
    public function setPlatformShop(string $platform_shop)
    {
        $this->params["platform_shop"] = $platform_shop;
    }

    /**
     * @param $is_order_cod int(2)    Option    COD订单：0:否 1:是。配置（IS_SHOW_ORDER_COD_PRICE）开启必传1
     * @return void
     */
    public function setIsOrderCod(int $is_order_cod)
    {
        $this->params["is_order_cod"] = $is_order_cod;
    }

    /**
     * @param $order_cod_price float(10)    Option    COD Value。配置（IS_SHOW_ORDER_COD_PRICE）开启必传
     * @return void
     */
    public function setOrderCodPrice(float $order_cod_price)
    {
        $this->params["order_cod_price"] = $order_cod_price;
    }

    /**
     * @param $order_cod_currency string(8)    Option    币种
     * @return void
     */
    public function setOrderCodCurrency(string $order_cod_currency)
    {
        $this->params["order_cod_currency"] = $order_cod_currency;
    }

    /**
     * @param $order_age_limit int(2)    Option    年龄: 0:无 1:16岁-18岁 2:18岁以上
     * @return void
     */
    public function setOrderAgeLimit(int $order_age_limit)
    {
        $this->params["order_age_limit"] = $order_age_limit;
    }

    /**
     * @param $is_signature int(2)    Option    签名服务: 0:否 1:是
     * @return void
     */
    public function setIsSignature(int $is_signature)
    {
        $this->params["is_signature"] = $is_signature;
    }

    /**
     * @param $is_insurance int(2)    Option    保险服务: 0:否 1:是
     * @return void
     */
    public function setIsInsurance(int $is_insurance)
    {
        $this->params["is_insurance"] = $is_insurance;
    }

    /**
     * @param $insurance_value int(2)    Option    投保金额，默认：美元
     * @return void
     */
    public function setInsuranceValue(int $insurance_value)
    {
        $this->params["insurance_value"] = $insurance_value;
    }

    /**
     * @param $channel_code string(32)    Option    渠道编码
     * @return void
     */
    public function setChannelCode(string $channel_code)
    {
        $this->params["channel_code"] = $channel_code;
    }

    /**
     * @param $packageCenterCode string(255)    Option    集包地中心代码
     * @return void
     */
    public function setPackageCenterCode(string $packageCenterCode)
    {
        $this->params["packageCenterCode"] = $packageCenterCode;
    }

    /**
     * @param $packageCenterName string(255)    Option    集包地中心名称
     * @return void
     */
    public function setPackageCenterName(string $packageCenterName)
    {
        $this->params["packageCenterName"] = $packageCenterName;
    }

    /**
     * @param $QrCode string(不限)    Option    二维码
     * @return void
     */
    public function setQrCode(string $QrCode)
    {
        $this->params["QrCode"] = $QrCode;
    }

    /**
     * @param $shortAddress string(不限)    Option    三段码
     * @return void
     */
    public function setShortAddress(string $shortAddress)
    {
        $this->params["shortAddress"] = $shortAddress;
    }

    /**
     * @param $order_desc string(512)    Option    订单说明
     * @return void
     */
    public function setOrderDesc(string $order_desc)
    {
        $this->params["order_desc"] = $order_desc;
    }

    /**
     * @param $remark string(不限)    Option    操作员留言-同步WMS订单备注中
     * @return void
     */
    public function setRemark(string $remark)
    {
        $this->params["remark"] = $remark;
    }

    /**
     * @param $order_business_type string(12)    Option    保税:订单模式(bbc/b2c)
     * @return void
     */
    public function setOrderBusinessType(string $order_business_type)
    {
        $this->params["order_business_type"] = $order_business_type;
    }

    /**
     * @param $receiver_id_type_code string(80)    Option    保税:收货人证件类型
     * @return void
     */
    public function setReceiverIdTypeCode(string $receiver_id_type_code)
    {
        $this->params["receiver_id_type_code"] = $receiver_id_type_code;
    }

    /**
     * @param $receiver_id_number string(200)    Option    保税:收货人身份证
     * @return void
     */
    public function setReceiverIdNumber(string $receiver_id_number)
    {
        $this->params["receiver_id_number"] = $receiver_id_number;
    }

    /**
     * @param $pay_no string(80)    Option    保税:支付人(订购人)编码
     * @return void
     */
    public function setPayNo(string $pay_no)
    {
        $this->params["pay_no"] = $pay_no;
    }

    /**
     * @param $payer_name string(80)    Option    保税:支付人(订购人)姓名,也即订购人
     * @return void
     */
    public function setPayerName(string $payer_name)
    {
        $this->params["payer_name"] = $payer_name;
    }

    /**
     * @param $id_type_code string(12)    Option    保税:支付人证件类型(1身份证)
     * @return void
     */
    public function setIdTypeCode(string $id_type_code)
    {
        $this->params["id_type_code"] = $id_type_code;
    }

    /**
     * @param $id_number string(200)    Option    保税:证件号码
     * @return void
     */
    public function setIdNumber(string $id_number)
    {
        $this->params["id_number"] = $id_number;
    }

    /**
     * @param $payer_phone string(64)    Option    保税:支付人电话
     * @return void
     */
    public function setPayerPhone(string $payer_phone)
    {
        $this->params["payer_phone"] = $payer_phone;
    }

    /**
     * @param $tax float(10,3)    Option    保税:税费，没有填0
     * @return void
     */
    public function setTax(float $tax)
    {
        $this->params["tax"] = $tax;
    }

    /**
     * @param $other_payment float(10,3)    Option    保税:抵扣费用，没有填0
     * @return void
     */
    public function setOtherPayment(float $other_payment)
    {
        $this->params["other_payment"] = $other_payment;
    }

    /**
     * @param $pro_amount float(10,3)    Option    保税:优惠金额，没有填0
     * @return void
     */
    public function setProAmount(float $pro_amount)
    {
        $this->params["pro_amount"] = $pro_amount;
    }

    /**
     * @param $transport_fee float(10,3)    Option    保税:运费，没有填0
     * @return void
     */
    public function setTransportFee(float $transport_fee)
    {
        $this->params["transport_fee"] = $transport_fee;
    }

    /**
     * @param $valuation_fee float(10,3)    Option    保税:保价费，没有填0
     * @return void
     */
    public function setValuationFee(float $valuation_fee)
    {
        $this->params["valuation_fee"] = $valuation_fee;
    }

    /**
     * @param $trans_type_id string(64)    Option    保税:运输方式编号
     * @return void
     */
    public function setTransTypeId(string $trans_type_id)
    {
        $this->params["trans_type_id"] = $trans_type_id;
    }

    /**
     * @param $trans_tool_id string(64)    Option    保税:运输工具编号
     * @return void
     */
    public function setTransToolId(string $trans_tool_id)
    {
        $this->params["trans_tool_id"] = $trans_tool_id;
    }

    /**
     * @param $voyages string(64)    Option    保税:航班航次号
     * @return void
     */
    public function setVoyages(string $voyages)
    {
        $this->params["voyages"] = $voyages;
    }

    /**
     * @param $pack_type_id string(64)    Option    保税:包装种类编号
     * @return void
     */
    public function setPackTypeId(string $pack_type_id)
    {
        $this->params["pack_type_id"] = $pack_type_id;
    }

    /**
     * @param $trans_sum_no string(64)    Option    保税:货运总单号
     * @return void
     */
    public function setTransSumNo(string $trans_sum_no)
    {
        $this->params["trans_sum_no"] = $trans_sum_no;
    }

    /**
     * @param $lading_bill_no string(64)    Option    保税:提单号
     * @return void
     */
    public function setLadingBillNo(string $lading_bill_no)
    {
        $this->params["lading_bill_no"] = $lading_bill_no;
    }

    /**
     * @param $verify Int(2)    Option    是否审核,0新建不审核(草稿状态)，1新建并审核， 默认为0， 审核通过之后，不可编辑
     * @return void
     */
    public function setVerify(int $verify)
    {
        $this->params["verify"] = $verify;
    }

    /**
     * @param $forceVerify Int(2)    Option    是否强制审核(如欠费，缺货时是否审核到仓配系统), 0不强制，1强制， 默认为0 当verify==1时生效
     * @return void
     */
    public function setForceVerify(int $forceVerify)
    {
        $this->params["forceVerify"] = $forceVerify;
    }

    /**
     * @param $items array    Require    订单明细
     * $items = [{
     *      "product_sku":"EA140509201610", // string(80)    Require    SKU
     *      "reference_no":"149H6286", // string(80)    Option    自定义编码
     *      "product_name_en":"Product Name", // string(200)    Option    英文申报名称
     *      "product_name":"Product Name", // string(200)    Option    中文申报名称
     *      "product_declared_value":5.000, // decimal(10,3)    Option    申报价值
     *      "quantity":1, // int(11)    Require    数量
     *      "ref_tnx":"1495099983020", // string(128)    Option    eBay交易号，选填(Edis物流必填)
     *      "ref_item_id":"302588235574", // string(128)    Option    eBay物品号，选填(Edis物流必填，平台编码和ebay物品号都往此字段传值)
     *      "ref_buyer_id":"esramo_a62szxok", // string(64)    Option    eBay买家ID，选填(Edis物流必填)
     *      "already_taxed":"I_TAXED", // string(20)    Option    已税标识:选填(I_TAXED 表示跨境已税，U_TAXED 表示海外仓已税)
     *      "child_order_id":"child_order_id", // string(32)    Option    子单号，单据编码
     *      "batch_info":[{
     *          "inventory_code": "RVJRY-220308-0008_EA140509201610_444_20220308151424", // string(255)    库存批次号
     *          "sku_quantity": "1" // int(11)    库存批次号对应的SKU数量
     *      }]
     * }]
     * 新建退仓订单
     * "items":[{
     *      "product_sku":"EA140509201610", // string    Require    SKU
     *      "reference_no":"149H6286", // string    Option    自定义编码
     *      "product_name":"键盘",// string    Option    中文申报名称
     *      "product_name_en":"Product Name", // string    Option    英文申报名称
     *      "product_declared_value":"5.000", // decimal    Option    申报价值
     *      "op_quantity":"2", // int    Require    良品数量
     *      "ng_quantity":"3", // int    Option    不良品数量(与良品数量两者至少要填一个)
     *      "product_receiving_map":[{ // Object    Option    指定入库单明细
     *           "receiving_code":"RVA001-200519-0001", // string    Require    入库单号
     *           "serial_number":"46457567", // string    Require    序列号
     *           "type":1 // int    Require    库位类型 1良品 2不良品
     *      }]
     * }],
     * @return void
     */
    public function setItems(array $items)
    {
        $this->params["items"] = $items;
    }

    /**
     * @param $item array    Require    订单明细
     *
     * @$item = {
     *      "product_sku":"EA140509201610", // string    Require    SKU
     *      "reference_no":"149H6286", // string    Option    自定义编码
     *      "product_name":"键盘",// string    Option    中文申报名称
     *      "product_name_en":"Product Name", // string    Option    英文申报名称
     *      "product_declared_value":"5.000", // decimal    Option    申报价值
     *      "op_quantity":"2", // int    Require    良品数量
     *      "ng_quantity":"3", // int    Option    不良品数量(与良品数量两者至少要填一个)
     *      "product_receiving_map":[{ // Object    Option    指定入库单明细
     *           "receiving_code":"RVA001-200519-0001", // string    Require    入库单号
     *           "serial_number":"46457567", // string    Require    序列号
     *           "type":1 // int    Require    库位类型 1良品 2不良品
     *      }
     * @return void
     */
    public function setItem(array $item)
    {
        if (!isset($this->params["items"])) {
            $this->params["items"] = [];
        }
        $this->params["items"][] = $item;
    }

    /**
     * @param $report array    Option    海关申报信息(开启仅走物流的时候需要传该字段)
     * "report":[{
     *      "product_sku":"EA140509201610",// string(80)    Require    产品SKU 不存在就创建新的,only_logistics=1仅走物流时必填
     *      "product_title":"键盘",// string(200)    Require    产品中文名称,only_logistics=1仅走物流时必填
     *      "product_title_en":"keyboard", // string(200)    Require    产品英文名称,only_logistics=1仅走物流时必填
     *      "product_quantity":1, // int(11)    Require    数量,only_logistics=1仅走物流时必填
     *      "product_declared_value":5, // decimal(10,2)    Require    单价,only_logistics=1仅走物流时必填
     *      "product_weight":3 // decimal(10,3)    Require    重量,only_logistics=1仅走物流时必填
     * }]
     * @return void
     */
    public function setReport(array $report)
    {
        $this->params["report"] = $report;
    }

    /**
     * @param $tracking_no string(50)    Option    跟踪号
     * @return void
     */
    public function setTrackingNo(string $tracking_no)
    {
        $this->params["tracking_no"] = $tracking_no;
    }

    /**
     * @param $label Object    Option    标签信息
     * $label = {
     *      "file_type":"png", // string(20)    普通类型(pdf/png/gif/jpg/jpeg)  特殊类型(cainiao/html)  erp新增(url)
     *      "file_data":"hVJPjUP4+yHjvKErt5PuFfvRhd...", // string / array(不限)    base64编码 / 数组 (多个标签: 数组格式[base64编码, ..])
     *      "file_size":"100x100", // string(100)    尺寸(格式如100x100，以小写x字母分隔)
     *      "file_name":"name" // string / array(不限)    名称 / 数组 (多个标签: 数组格式[名称1,名称2 ..])
     * },
     * @return void
     */
    public function setLabel($label)
    {
        $this->params["label"] = $label;
    }

    /**
     * @param $attach array    Option    订单附件
     * "attach":[{
     *      "file_type":"zip",// string(20)    pdf,rar,zip
     *      "attach_id":"4276" // int(11)    公共上传接口返回的主键
     * }]
     * @return void
     */
    public function setAttach(array $attach)
    {
        $this->params["attach"] = $attach;
    }

    /**
     * @param $other_documents array    Option    其他附件
     * $other_documents = [{
     *      "attach_id":"133", // int(11)    公共上传接口返回的主键
     * }]
     * @return void
     */
    public function setOtherDocuments(array $other_documents)
    {
        $this->params["other_documents"] = $other_documents;
    }

    /**
     * @param $is_pack_box int(2)    Option    装箱服务: 0:否 1:是(此字段已弃用，默认为否，以运输方式是否支持为准)
     * @return void
     */
    public function setIsPackBox(int $is_pack_box)
    {
        $this->params["is_pack_box"] = $is_pack_box;
    }

    /**
     * @param $seller_id string(64)    Option    卖家id(非必填-分销EDIS物流使用)
     * @return void
     */
    public function setSellerId(string $seller_id)
    {
        $this->params["seller_id"] = $seller_id;
    }

    /**
     * @param $buyer_id string(64)    Option    买家id(非必填-分销EDIS物流使用)
     * @return void
     */
    public function setBuyerId(string $buyer_id)
    {
        $this->params["buyer_id"] = $buyer_id;
    }

    /**
     * @param $only_logistics int(2)    Option    是否开启仅走物流模式(非必填-前海云途客户定制)
     * @return void
     */
    public function setOnlyLogistics(int $only_logistics)
    {
        $this->params["only_logistics"] = $only_logistics;
    }

    /**
     * @param $is_release_cargo int(2)    Option    DEDHL额外服务【强制放货】,0否,1是,默认为0
     * @return void
     */
    public function setIsReleaseCargo(int $is_release_cargo)
    {
        $this->params["is_release_cargo"] = $is_release_cargo;
    }

    /**
     * @param $is_vip int(2)    Option    是否为VIP订单 1是 0不是 默认为0
     * @return void
     */
    public function setIsVip(int $is_vip)
    {
        $this->params["is_vip"] = $is_vip;
    }

    /**
     * @param $order_kind string(32)    Option    订单类型 BC,CC 默认为BC
     * @return void
     */
    public function setOrderKind(string $order_kind)
    {
        $this->params["order_kind"] = $order_kind;
    }

    /**
     * @param $order_payer_name string(60)    Option    订购人
     * @return void
     */
    public function setOrderPayerName(string $order_payer_name)
    {
        $this->params["order_payer_name"] = $order_payer_name;
    }

    /**
     * @param $order_id_number string(60)    Option    订购人证件号码
     * @return void
     */
    public function setOrderIdNumber(string $order_id_number)
    {
        $this->params["order_id_number"] = $order_id_number;
    }

    /**
     * @param $order_payer_phone string(60)    Option    订购人电话
     * @return void
     */
    public function setOrderPayerPhone(string $order_payer_phone)
    {
        $this->params["order_payer_phone"] = $order_payer_phone;
    }

    /**
     * @param $order_country_code_origin string    Option    原产国
     * @return void
     */
    public function setOrderCountryCodeOrigin(string $order_country_code_origin)
    {
        $this->params["order_country_code_origin"] = $order_country_code_origin;
    }

    /**
     * @param $order_sale_amount float(10,3)    Option    订单销售金额（不填默认为0）
     * @return void
     */
    public function setOrderSaleAmount(float $order_sale_amount)
    {
        $this->params["order_sale_amount"] = $order_sale_amount;
    }

    /**
     * @param $order_sale_currency string(8)    Option    订单销售金额币种
     * @return void
     */
    public function setOrderSaleCurrency($order_sale_currency)
    {
        $this->params["order_sale_currency"] = $order_sale_currency;
    }

    /**
     * @param $is_platform_ebay string(2)    Option    是否ebay平台，1是，0否，默认为0
     * @return void
     */
    public function setIsPlatformEbay(string $is_platform_ebay)
    {
        $this->params["is_platform_ebay"] = $is_platform_ebay;
    }

    /**
     * @param $ebay_item_id string(64)    Option    ebay物品编码ebay平台交易id(eBay Item ID)，is_platform_ebay为1时必填
     * @return void
     */
    public function setEbayItemId(string $ebay_item_id)
    {
        $this->params["ebay_item_id"] = $ebay_item_id;
    }

    /**
     * @param $ebay_transaction_id string    Option    ebay交易编号(eBay Transaction ID)ebay平台交易号(eBay Transaction ID)，is_platform_ebay为1时必填
     * @return void
     */
    public function setEbayTransactionId(string $ebay_transaction_id)
    {
        $this->params["ebay_transaction_id"] = $ebay_transaction_id;
    }

    /**
     * @param $tax_payment_method string(20)    Option    税金付款方式，可以为空，不为空的时候为其中一项（"CFR_OR_CPT", "CIF_OR_CIP", "DDP", "DDU", "DAP", "DAT", "EXW", "FOB_OR_FCA"）。配置了(FHF_IS_ADD_TAX_PAYMENT_METHOD)后必填
     * @return void
     */
    public function setTaxPaymentMethod(string $tax_payment_method)
    {
        $this->params["tax_payment_method"] = $tax_payment_method;
    }

    /**
     * @param $customs_company_name string(64)    Option    清关公司名称
     * @return void
     */
    public function setCustomsCompanyName(string $customs_company_name)
    {
        $this->params["customs_company_name"] = $customs_company_name;
    }

    /**
     * @param $customs_address string(64)    Option    清关地址
     * @return void
     */
    public function setCustomsAddress(string $customs_address)
    {
        $this->params["customs_address"] = $customs_address;
    }

    /**
     * @param $customs_contact_name string(64)    Option    清关联系人
     * @return void
     */
    public function setCustomsContactName(string $customs_contact_name)
    {
        $this->params["customs_contact_name"] = $customs_contact_name;
    }

    /**
     * @param $customs_email string(64)    Option    清关邮箱
     * @return void
     */
    public function setCustomsEmail(string $customs_email)
    {
        $this->params["customs_email"] = $customs_email;
    }

    /**
     * @param $customs_tax_code string(64)    Option    清关税号
     * @return void
     */
    public function setCustomsTaxCode(string $customs_tax_code)
    {
        $this->params["customs_tax_code"] = $customs_tax_code;
    }

    /**
     * @param $customs_phone string(64)    Option    清关电话
     * @return void
     */
    public function setCustomsPhone(string $customs_phone)
    {
        $this->params["customs_phone"] = $customs_phone;
    }

    /**
     * @param $customs_city string(128)    Option    清关城市
     * @return void
     */
    public function setCustomsCity(string $customs_city)
    {
        $this->params["customs_city"] = $customs_city;
    }

    /**
     * @param $customs_state string(128)    Option    清关省/州
     * @return void
     */
    public function setCustomsState(string $customs_state)
    {
        $this->params["customs_state"] = $customs_state;
    }

    /**
     * @param $customs_country_code string(32)    Option    清关国家编码
     * @return void
     */
    public function setCustomsCountryCode(string $customs_country_code)
    {
        $this->params["customs_country_code"] = $customs_country_code;
    }

    /**
     * @param $customs_postcode string(60)    Option    清关邮编
     * @return void
     */
    public function setCustomsPostcode(string $customs_postcode)
    {
        $this->params["customs_postcode"] = $customs_postcode;
    }

    /**
     * @param $customs_doorplate string(32)    Option    清关门牌号
     * @return void
     */
    public function setCustomsDoorplate(string $customs_doorplate)
    {
        $this->params["customs_doorplate"] = $customs_doorplate;
    }

    /**
     * @param $consignee_tax_number string(50)    Option    收件人税号
     * @return void
     */
    public function setConsigneeTaxNumber(string $consignee_tax_number)
    {
        $this->params["consignee_tax_number"] = $consignee_tax_number;
    }

    /**
     * @param $order_battery_type string(10)    Option    电池型号
     * @return void
     */
    public function setOrderBatteryType($order_battery_type)
    {
        $this->params["order_battery_type"] = $order_battery_type;
    }

    /**
     * @param $vat_tax_code string(128)    Option    VAT税号
     * @return void
     */
    public function setVatTaxCode(string $vat_tax_code)
    {
        $this->params["vat_tax_code"] = $vat_tax_code;
    }

    /**
     * @param $distribution_information string(128)    Option    配货信息
     * @return void
     */
    public function setDistributionInformation(string $distribution_information)
    {
        $this->params["distribution_information"] = $distribution_information;
    }

    /**
     * @param $consignee_tax_type int(1)    Option    收件人税号类型0无 1个人 2公司 3护照 4其他
     * @return void
     */
    public function setConsigneeTaxType(int $consignee_tax_type)
    {
        $this->params["consignee_tax_type"] = $consignee_tax_type;
    }

    /**
     * @param $consignee_eori string(64)    Option    收件人EORI号
     * @return void
     */
    public function setConsigneeEori(string $consignee_eori)
    {
        $this->params["consignee_eori"] = $consignee_eori;
    }

    /**
     * @param $api_source string(50)    Option    erp回调平台
     * @return void
     */
    public function setApiSource($api_source)
    {
        $this->params["api_source"] = $api_source;
    }

    /**
     * @param $assign_date string    Option    配送指定日期；例如2021-01-01
     * @return void
     */
    public function setAssignDate(string $assign_date)
    {
        $this->params["assign_date"] = $assign_date;
    }

    /**
     * @param $assign_time string(2)    Option    配送指定时间；"00"：无指定； "01"：午前中 ；"12"：12時~14時 ；"14"：14時~16時 ；"16"：16時~18時 ；"18"：18時~20時 ；"19"：19時~21時 ；"04"：18時~21時
     * @return void
     */
    public function setAssignTime(string $assign_time)
    {
        $this->params["assign_time"] = $assign_time;
    }

    /**
     * @param $lp_code string(不限)    Option    菜鸟lp单号（非必填，不填默认为空）
     * @return void
     */
    public function setLpCode(string $lp_code)
    {
        $this->params["lp_code"] = $lp_code;
    }

    /**
     * $is_merge   float(10,3)    Option    订单销售金额（不填默认为0） 是否是合单订单，0不是，1是，默认为0
     * @return void
     */
    public function setIsMerge($is_merge)
    {
        $this->params["is_merge"] = $is_merge;
    }

    /**
     * @param $IOSS string(200)    Option    欧盟一站式进口编码(IOSS)
     * @return void
     */
    public function setIOSS($IOSS)
    {
        $this->params["IOSS"] = $IOSS;
    }

    /**
     * @param $merge_order_count int(10)    Option    合单订单数量，不填默认为0
     * 注意：非合单订单时（is_merge为0），合单订单数量无效为0
     * @return void
     */
    public function setMergeOrderCount(int $merge_order_count)
    {
        $this->params["merge_order_count"] = $merge_order_count;
    }

    /**
     * @param $insurance_type int(2)    Option    保险类型 1:通达保&一件代发(保签收) ，3:通达保&一件代发(保签收后7天)，4:通达保&一件代发(保签收后14天),5:通达保&一件代发(保签收后21天) 不填默认为0
     * @return void
     */
    public function setInsuranceType(int $insurance_type)
    {
        $this->params["insurance_type"] = $insurance_type;
    }

    /**
     * @param $insurance_type_goods_value float(10,2)    Option    保留2位小数
     * @return void
     */
    public function setInsuranceTypeGoodsValue(float $insurance_type_goods_value)
    {
        $this->params["insurance_type_goods_value"] = $insurance_type_goods_value;
    }

    /**
     * @param $is_ju_order int(2)    Option    是否为聚水潭下发的订单，1表示是，0表示否。默认值0
     * @return void
     */
    public function setIsJuOrder(int $is_ju_order)
    {
        $this->params["is_ju_order"] = $is_ju_order;
    }

    /**
     * @param $is_allow_open int(2)    Option    是否允许打开包裹 0否，1是，默认为0
     * @return void
     */
    public function setIsAllowOpen(int $is_allow_open)
    {
        $this->params["is_allow_open"] = $is_allow_open;
    }

    /**
     * @param $transaction_no string(128)    Option    平台交易号（跨境堡投保使用）
     * @return void
     */
    public function setTransactionNo(string $transaction_no)
    {
        $this->params["transaction_no"] = $transaction_no;
    }

    /**
     * @param $reason string    Option    截单原因
     * @return void
     */
    public function setReason(string $reason)
    {
        $this->params["reason"] = $reason;
    }

    /**
     * @param $is_assign_receiving Int    Option    是否指定入库单 0不指定 1指定 不传默认为0
     * @return void
     */
    public function setIsAssignReceiving(int $is_assign_receiving)
    {
        $this->params["is_assign_receiving"] = $is_assign_receiving;
    }

    /**
     * @param $order_numbers string    Require    可用逗号,空格或者回车隔开,最多支持20个订单
     * @return void
     */
    public function setOrderNumbers(string $order_numbers)
    {
        $this->params["order_numbers"] = $order_numbers;
    }

    /**
     * @param $trackingNumber    string    Require    跟踪号
     * @return void
     */
    public function setTrackingNumber(string $trackingNumber)
    {
        $this->params["trackingNumber"] = $trackingNumber;
    }

    /**
     * @param $source    string    Option    来源（客户自己定义估计来源 例如:SF）
     * @return void
     */
    public function setSource(string $source)
    {
        $this->params["source"] = $source;
    }

    /**
     * @param $detail    array    Require    轨迹详情
     * "detail": [{
     *      "trackingNumber":"sf15121254523256445", // string    Require    跟踪号
     *      "locationCode": "轨迹地点", // string    Option    轨迹地点
     *      "status": "AC", // string    Option    轨迹状态
     *          AC    清关异常    Abnormal clearance
     *          AD    派送异常    Abnormal delivery
     *          AF    已上网    arrived at facility
     *          AO    操作异常    Abnormal Operation
     *          AT    转运异常    Abnormal transfer
     *          CC    派送妥投    Case Close
     *          DA    派送异常    Delivery accident
     *          NC    清关中    Normal clearance
     *          ND    派送中    Normal delivery
     *          NE    包裹异常    Unknown Exception
     *          NO    未上网    Normal Operation
     *          NT    转运中    Normal transfer
     *          UE    退件    Untread Expressage
     *          NA    待接受    No Accepted
     *          IS    在库    In stock
     *          CP    完成    Completed
     *          RP    接收    Reception
     *      "trackDescription": "轨迹描述", // string    Require    轨迹描述
     *      "deliveryDate": "2020-05-10 00:00:00", // string    Require    轨迹时间
     *      "trackCode": "轨迹号5" // string    Option    节点顺序号/轨迹状态码 （默认请填轨迹状态码,必要情况自定义）
     * }]
     * @return void
     */
    public function setDetail(array $detail)
    {
        $this->params["detail"] = $detail;
    }

    /**
     * @param $SKU string    Option    sku
     * @return void
     */
    public function setSKU(string $SKU)
    {
        $this->params["SKU"] = $SKU;
    }

    /**
     * @param $to_warehouse_id  string    Option    目的仓库
     * @return void
     */
    public function setToWarehouseId(string $to_warehouse_id)
    {
        $this->params["to_warehouse_id"] = $to_warehouse_id;
    }

    /**
     * @param $warehouse_id  string    Option    仓库
     * @return void
     */
    public function setWarehouseId(string $warehouse_id)
    {
        $this->params["warehouse_id"] = $warehouse_id;
    }

    /**
     * @param $createDateFrom  string    Option    订单创建开始时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setCreateDateFrom2(string $createDateFrom)
    {
        $this->params["createDateFrom"] = $createDateFrom;
    }

    /**
     * @param $createDateEnd  string    Option    订单创建结束时间， 格式YYYY-MM-DD HH:II:SS 订单号传值时，该参数无效
     * @return void
     */
    public function setCreateDateEnd(string $createDateEnd)
    {
        $this->params["createDateEnd"] = $createDateEnd;
    }

    /**
     * @param $to_warehouse_code string    Require    目的仓库代码
     * @return void
     */
    public function setToWarehouseCode(string $to_warehouse_code)
    {
        $this->params["to_warehouse_code"] = $to_warehouse_code;
    }

    /**
     * @param $aim_merchant_id string    Option    调拨目的商家编码
     * @return void
     */
    public function setAimMerchantId(string $aim_merchant_id)
    {
        $this->params["aim_merchant_id"] = $aim_merchant_id;
    }

    /**
     * @param $aim_cus_manual string    Option    调拨目的账册编号
     * @return void
     */
    public function setAimCusManual(string $aim_cus_manual)
    {
        $this->params["aim_cus_manual"] = $aim_cus_manual;
    }

    /**
     * @param $op_quantity array    Require    产品信息 { 产品SKU:产品数量, ... }
     * @return void
     */
    public function setOpQuantity(array $op_quantity)
    {
        $this->params["op_quantity"] = $op_quantity;
    }

    /**
     * @param $is_sync_putaway_time Int    Option    是否同步SKU上架时间：1是，0否，不传默认为0
     * @return void
     */
    public function setIsSyncPutawayTime(int $is_sync_putaway_time)
    {
        $this->params["is_sync_putaway_time"] = $is_sync_putaway_time;
    }

    /**
     * @param $order_id int    Require    订单ID
     * @return void
     */
    public function setOrder_id(int $order_id)
    {
        $this->params["order_id"] = $order_id;
    }


    /**
     * 地址校验
     * @return void
     */
    public function checkAddress()
    {
        $this->setService("checkAddress");
        return $this->PostSoapXML();
    }

    /**
     * 获取订单列表
     * @return void
     */
    public function getOrderList()
    {
        $this->setService("getOrderList");
        return $this->PostSoapXML();
    }

    /**
     * 新建订单
     * @reference_no string(64)    Require    订单参考号(建议使用平台单号)
     * @aliexpress_order_no string(64)    Option    平台订单号(例如速卖通平台订单号)
     * @lp_order_number string(64)    Option    LP订单号
     * @sw_order_number string(32)    Option    公共平台订单号
     * @platform string(12)    Option    平台， ALIEXPRESS, AMAZON, B2C, EBAY, OTHER 默认OTHER
     * @allocated_auto string    Option    自动分仓:0无,1自动分仓
     * @shipping_method string(64)    Require    配送方式，参考getShippingMethod。如果配置了(CPCAINIAO),该值就只能传配置的（CPSHIPPINGMETHOD）
     * @warehouse_code string(20)    Require    配送仓库，参考getWarehouse。配置(checkCustomerWarehouseIsCloud)开启必传
     * @country_code string(64)    Require    收件人国家，参考getCountry
     * @province string(128)    Option    省/州/府
     * @city string(128)    Option    城市/区
     * @district string(64)    Option    收件人区
     * @address1 string(500)    Require    地址1 (length:30)
     * @address2 string(216)    Option    地址2 (length:30)
     * @address3 string(216)    Option    地址3 (length:30)
     * @zipcode string(32)    Require    邮编；收件人国家为菲律宾，邮编非必填
     * @license string(80)    Option    收件人证件号
     * @doorplate string(32)    Option    门牌号
     * @company string(128)    Option    公司名
     * @name string(128)    Require    收件人姓名
     * @phone string(64)    Require    收件人联系方式
     * @cell_phone string(64)    Option    收件人联系方式2
     * @phone_extension string(64)    Option    收件人电话分机
     * @email string(64)    Option    收件人邮箱
     * @platform_shop string(128)    Option    平台店铺
     * @is_order_cod int(2)    Option    COD订单：0:否 1:是。配置（IS_SHOW_ORDER_COD_PRICE）开启必传1
     * @order_cod_price float(10)    Option    COD Value。配置（IS_SHOW_ORDER_COD_PRICE）开启必传
     * @order_cod_currency string(8)    Option    币种
     * @order_age_limit int(2)    Option    年龄: 0:无 1:16岁-18岁 2:18岁以上
     * @is_signature int(2)    Option    签名服务: 0:否 1:是
     * @is_insurance int(2)    Option    保险服务: 0:否 1:是
     * @insurance_value int(2)    Option    投保金额，默认：美元
     * @channel_code string(32)    Option    渠道编码
     * @packageCenterCode string(255)    Option    集包地中心代码
     * @packageCenterName string(255)    Option    集包地中心名称
     * @QrCode string(不限)    Option    二维码
     * @shortAddress string(不限)    Option    三段码
     * @order_desc string(512)    Option    订单说明
     * @remark string(不限)    Option    操作员留言-同步WMS订单备注中
     * @order_business_type string(12)    Option    保税:订单模式(bbc/b2c)
     * @receiver_id_type_code string(80)    Option    保税:收货人证件类型
     * @receiver_id_number string(200)    Option    保税:收货人身份证
     * @pay_no string(80)    Option    保税:支付人(订购人)编码
     * @payer_name string(80)    Option    保税:支付人(订购人)姓名,也即订购人
     * @id_type_code string(12)    Option    保税:支付人证件类型(1身份证)
     * @id_number string(200)    Option    保税:证件号码
     * @payer_phone string(64)    Option    保税:支付人电话
     * @tax float(10,3)    Option    保税:税费，没有填0
     * @other_payment float(10,3)    Option    保税:抵扣费用，没有填0
     * @pro_amount float(10,3)    Option    保税:优惠金额，没有填0
     * @transport_fee float(10,3)    Option    保税:运费，没有填0
     * @valuation_fee float(10,3)    Option    保税:保价费，没有填0
     * @trans_type_id string(64)    Option    保税:运输方式编号
     * @trans_tool_id string(64)    Option    保税:运输工具编号
     * @voyages string(64)    Option    保税:航班航次号
     * @pack_type_id string(64)    Option    保税:包装种类编号
     * @trans_sum_no string(64)    Option    保税:货运总单号
     * @lading_bill_no string(64)    Option    保税:提单号
     * @verify Int(2)    Option    是否审核,0新建不审核(草稿状态)，1新建并审核， 默认为0， 审核通过之后，不可编辑
     * @forceVerify Int(2)    Option    是否强制审核(如欠费，缺货时是否审核到仓配系统), 0不强制，1强制， 默认为0 当verify==1时生效
     * @items array    Require    订单明细
     * @report array    Option    海关申报信息(开启仅走物流的时候需要传该字段)
     * @tracking_no string(50)    Option    跟踪号
     * @label Object    Option    标签信息
     * @attach array    Option    订单附件
     * @other_documents array    Option    其他附件
     * @is_pack_box int(2)    Option    装箱服务: 0:否 1:是(此字段已弃用，默认为否，以运输方式是否支持为准)
     * @seller_id string(64)    Option    卖家id(非必填-分销EDIS物流使用)
     * @buyer_id string(64)    Option    买家id(非必填-分销EDIS物流使用)
     * @only_logistics int(2)    Option    是否开启仅走物流模式(非必填-前海云途客户定制)
     * @is_release_cargo int(2)    Option    DEDHL额外服务【强制放货】,0否,1是,默认为0
     * @is_vip int(2)    Option    是否为VIP订单 1是 0不是 默认为0
     * @order_kind string(32)    Option    订单类型 BC,CC 默认为BC
     * @order_payer_name string(60)    Option    订购人
     * @order_id_number string(60)    Option    订购人证件号码
     * @order_payer_phone string(60)    Option    订购人电话
     * @order_country_code_origin (60)    string    Option    原产国
     * @order_sale_amount float(10,3)    Option    订单销售金额（不填默认为0）
     * @order_sale_currency string(8)    Option    订单销售金额币种
     * @is_platform_ebay string(2)    Option    是否ebay平台，1是，0否，默认为0
     * @ebay_item_id string(64)    Option    ebay物品编码ebay平台交易id(eBay Item ID)，is_platform_ebay为1时必填
     * @ebay_transaction_id string    Option    ebay交易编号(eBay Transaction ID)ebay平台交易号(eBay Transaction ID)，is_platform_ebay为1时必填
     * @tax_payment_method string(20)    Option    税金付款方式，可以为空，不为空的时候为其中一项（"CFR_OR_CPT", "CIF_OR_CIP", "DDP", "DDU", "DAP", "DAT", "EXW", "FOB_OR_FCA"）。配置了(FHF_IS_ADD_TAX_PAYMENT_METHOD)后必填
     * @customs_company_name string(64)    Option    清关公司名称
     * @customs_address string(64)    Option    清关地址
     * @customs_contact_name string(64)    Option    清关联系人
     * @customs_email string(64)    Option    清关邮箱
     * @customs_tax_code string(64)    Option    清关税号
     * @customs_phone string(64)    Option    清关电话
     * @customs_city string(128)    Option    清关城市
     * @customs_state string(128)    Option    清关省/州
     * @customs_country_code string(32)    Option    清关国家编码
     * @customs_postcode string(60)    Option    清关邮编
     * @customs_doorplate string(32)    Option    清关门牌号
     * @consignee_tax_number string(50)    Option    收件人税号
     * @order_battery_type string(10)    Option    电池型号
     * @vat_tax_code string(128)    Option    VAT税号
     * @distribution_information string(128)    Option    配货信息
     * @consignee_tax_type int(1)    Option    收件人税号类型0无 1个人 2公司 3护照 4其他
     * @consignee_eori string(64)    Option    收件人EORI号
     * @api_source string(50)    Option    erp回调平台
     * @assign_date string    Option    配送指定日期；例如2021-01-01
     * @assign_time string(2)    Option    配送指定时间；"00"：无指定； "01"：午前中 ；"12"：12時~14時 ；"14"：14時~16時 ；"16"：16時~18時 ；"18"：18時~20時 ；"19"：19時~21時 ；"04"：18時~21時
     * @lp_code string(不限)    Option    菜鸟lp单号（非必填，不填默认为空）
     * @is_merge int(2)    Option    是否是合单订单，0不是，1是，默认为0
     * @IOSS string(200)    Option    欧盟一站式进口编码(IOSS)
     * @merge_order_count int(10)    Option    合单订单数量，不填默认为0
     * @注意 ：非合单订单时（is_merge为0），合单订单数量无效为0
     * @insurance_type int(2)    Option    保险类型 1:通达保&一件代发(保签收) ，3:通达保&一件代发(保签收后7天)，4:通达保&一件代发(保签收后14天),5:通达保&一件代发(保签收后21天) 不填默认为0
     * @insurance_type_goods_value float(10,2)    Option    保留2位小数
     * @is_ju_order int(2)    Option    是否为聚水潭下发的订单，1表示是，0表示否。默认值0
     * @is_merge int(2)    Option    是否是合单订单，0不是，1是，默认为0
     * @is_allow_open int(2)    Option    是否允许打开包裹 0否，1是，默认为0
     * @transaction_no string(128)    Option    平台交易号（跨境堡投保使用）
     *
     * 示例：
     * {
     *      "platform":"OTHER",
     *      "allocated_auto":"0",
     *      "warehouse_code":"HRBW",
     *      "shipping_method":"F4",
     *      "reference_no":"ref_1399867101",
     *      "aliexpress_order_no":"8000777788889999",
     *      "order_desc":"\u8ba2\u5355\u63cf\u8ff0",
     *      "remark":"我是备注",
     *      "order_business_type":"b2c",
     *      "lp_order_number":"lp_123456",
     *      "country_code":"RU",
     *      "province":"province",
     *      "city":"city",
     *      "district":"收件人区",
     *      "address1":"address1",
     *      "address2":"address2",
     *      "address3":"address3",
     *      "zipcode":"142970",
     *      "license":"420904",
     *      "doorplate":"doorplate",
     *      "company":"company",
     *      "name":"name",
     *      "phone":"phone",
     *      "cell_phone":"cell_phone",
     *      "phone_extension":"",
     *      "email":"email",
     *      "platform_shop":"shop",
     *      "is_order_cod":1,
     *      "order_cod_price":99,
     *      "order_cod_currency":"RMB",
     *      "order_age_limit":2,
     *      "is_signature":0,
     *      "is_insurance":0,
     *      "insurance_value":0,
     *      "channel_code":"demo",
     *      "packageCenterCode":"center_code",
     *      "packageCenterName":"集包地中心名称",
     *      "QrCode":"123ABC",
     *      "shortAddress":"100-200-30-400",
     *      "seller_id":"ebay-test001",
     *      "buyer_id":"ebay-test002",
     *      "only_logistics":0,
     *      "assign_date":"2021-01-01",
     *      "assign_time":"02",
     *      "items":[{
     *          "product_sku":"EA140509201610",
     *          "reference_no":"149H6286",
     *          "product_name_en":"Product Name",
     *          "product_name":"Product Name",
     *          "product_declared_value":5.000,
     *          "quantity":1,
     *          "ref_tnx":"1495099983020",
     *          "ref_item_id":"302588235574",
     *          "ref_buyer_id":"esramo_a62szxok",
     *          "already_taxed":"I_TAXED",
     *          "child_order_id":"child_order_id",
     *          "batch_info":[{
     *              "inventory_code": "RVJRY-220308-0008_EA140509201610_444_20220308151424",
     *              "sku_quantity": "1"
     *          }]
     *      }],
     *      "report":[{
     *          "product_sku":"EA140509201610",
     *          "product_title":"键盘",
     *          "product_title_en":"keyboard",
     *          "product_quantity":1,
     *          "product_declared_value":5,
     *          "product_weight":3
     *      }],
     *      "tracking_no":"123",
     *      "label":{
     *          "file_type":"png",
     *          "file_data":"hVJPjUP4+yHjvKErt5PuFfvRhd...",
     *          "file_size":"100x100",
     *          "file_name":"name"
     *      },
     *      "attach":[
     *          {
     *              "file_type":"zip",
     *              "attach_id":"4276"
     *          },
     *          {
     *              "file_type":"pdf",
     *              "attach_id":"4277"
     *          }
     *      ],
     *      "other_documents":[{
     *          "attach_id":"133",
     *      }],
     *      "is_pack_box":0,
     *      "is_release_cargo":0,
     *      "is_vip":0,
     *      "order_kind":"BC",
     *      "order_payer_name":"小明",
     *      "order_id_number":"1325323112323",
     *      "order_payer_phone":"13120775656",
     *      "order_country_code_origin":"美国",
     *      "order_sale_amount":"0",
     *      "order_sale_currency":"RMB",
     *      "is_platform_ebay":"0",
     *      "ebay_item_id":"130056",
     *      "ebay_transaction_id":"202009041652-0001",
     *      "tax_payment_method":"CFR_OR_CPT",
     *      "customs_company_name":"我是清关公司",
     *      "customs_address":"我是清关地址",
     *      "customs_contact_name":"我是清关联系人",
     *      "customs_email":"15026521351@gmail.com",
     *      "customs_tax_code":"156156156",
     *      "customs_phone":"15625231521",
     *      "customs_city":"武汉市",
     *      "customs_state":"湖北省",
     *      "customs_country_code":"CN",
     *      "customs_postcode":"434400",
     *      "customs_doorplate":"601",
     *      "consignee_tax_number":"682515426999999",
     *      "consignee_eori":"我是收件人EORI号",
     *      "order_battery_type":"UN3481",
     *      "vat_tax_code":"16515612231",
     *      "distribution_information":"distribution information",
     *      "consignee_tax_type":1,
     *      "api_source":"mabangerp",
     *      "verify":1,
     *      "forceVerify":0,
     *      "lp_code":"AEOWH0000345968",
     *      "is_merge":0,
     *      "merge_order_count":0,
     *      "insurance_type":1,
     *      "insurance_type_goods_value":1,
     *      "is_ju_order":0,
     *      "is_allow_open":1,
     *      "transaction_no": ""
     * }
     */
    public function createOrder()
    {
        $this->setService("createOrder");
        return $this->PostSoapXML();
    }

    /**
     * 修改订单
     * @return void
     */
    public function modifyOrder()
    {
        $this->setService("modifyOrder");
        return $this->PostSoapXML();
    }

    /**
     * 取消订单
     * @return void
     */
    public function cancelOrder()
    {
        $this->setService("cancelOrder");
        return $this->PostSoapXML();
    }

    /**
     * 新建退仓订单
     * @return void
     */
    public function createReturnOrder()
    {
        $this->setService("createReturnOrder");
        return $this->PostSoapXML();
    }

    /**
     * 查询退仓订单列表
     * @return void
     */
    public function getReturnOrderList()
    {
        $this->setService("getReturnOrderList");
        return $this->PostSoapXML();
    }

    /**
     * 根据订单号获取单票订
     * @return void
     */
    public function getOrderByCode()
    {
        $this->setService("getReturnOrderList");
        return $this->PostSoapXML();
    }

    /**
     * 根据参考号获取单票订
     * @return void
     */
    public function getOrderByRefCode()
    {
        $this->setService("getOrderByRefCode");
        return $this->PostSoapXML();
    }

    /**
     * 根据参考号获取单票订
     * @return array|mixed
     */
    public function getOrderTracking()
    {
        $this->setService("getOrderTracking");
        return $this->PostSoapXML();
    }

    /**
     * 添加轨迹详情
     * @return void
     */
    public function addTracking()
    {
        $this->setService("addTracking");
        return $this->PostSoapXML();
    }

    /**
     * 获取转仓单列表
     * @return void
     */
    public function getTransferOrderList()
    {
        $this->setService("getTransferOrderList");
        return $this->PostSoapXML();
    }

    /**
     * 新建转仓单/修改转仓单
     * @return void
     */
    public function createTransferOrder()
    {
        $this->setService("createTransferOrder");
        return $this->PostSoapXML();
    }

    /**
     * 获取订单状态
     * @return void
     */
    public function getOrderStatusByCode()
    {
        $this->setService("getOrderStatusByCode");
        return $this->PostSoapXML();
    }

    /**
     * 获取订单变更费用列表
     * @return void
     */
    public function getChangeFeeList()
    {
        $this->setService("getChangeFeeList");
        return $this->PostSoapXML();
    }

    /**
     * 获取订单标签(仅走物流)
     * @return void
     */
    public function getPrintLabelOnlyLogistics()
    {
        $this->setService("getPrintLabelOnlyLogistics");
        return $this->PostSoapXML();
    }

    /**
     * 获取订单附件
     * @return void
     */
    public function getOrderAttach()
    {
        $this->setService("getOrderAttach");
        return $this->PostSoapXML();
    }

    /**
     * 更新订单附件
     * @return void
     */
    public function saveOrderAttach()
    {
        $this->setService("saveOrderAttach");
        return $this->PostSoapXML();
    }
}