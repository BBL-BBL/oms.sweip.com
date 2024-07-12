<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class FreightCalculator extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $warehouse_code string Require 发货仓库代码
     * @return void
     */
    public function setWarehouseCode(string $warehouse_code)
    {
        $this->params["warehouse_code"] = $warehouse_code;
    }

    /**
     * @param $country_code string Require 目的国家代码
     * @return void
     */
    public function setCountryCode(string $country_code)
    {
        $this->params["country_code"] = $country_code;
    }

    /**
     * @param $shipping_method string|array Require 配送方式
     * @return void
     */
    public function setShippingMethod(string $shipping_method)
    {
        $this->params["shipping_method"] = $shipping_method;
    }

    /**
     * @param $postcode string Option 邮政编码
     * @return void
     */
    public function setPostcode(string $postcode)
    {
        $this->params["postcode"] = $postcode;
    }

    /**
     * @param $weight float Require 包裹重量
     * @return void
     */
    public function setWeight(float $weight)
    {
        $this->params["weight"] = $weight;
    }

    /**
     * @param $length float Option 包裹长
     * @return void
     */
    public function setLength(float $length)
    {
        $this->params["length"] = $length;
    }

    /**
     * @param $width float Option 包裹宽
     * @return void
     */
    public function setWidth(float $width)
    {
        $this->params["width"] = $width;
    }

    /**
     * @param $height float Option 包裹高
     * @return void
     */
    public function setHeight(float $height)
    {
        $this->params["height"] = $height;
    }

    /**
     * @param $city string Option 城市
     * @return void
     */
    public function setCity(string $city)
    {
        $this->params["city"] = $city;
    }

    /**
     * @param $state string Option 州/省
     * @return void
     */
    public function setState(string $state)
    {
        $this->params["state"] = $state;
    }

    /**
     * @param $address1 string Option 地址1
     * @return void
     */
    public function setAddress1(string $address1)
    {
        $this->params["address1"] = $address1;
    }

    /**
     * @param $name string Option 收件人名称
     * @return void
     */
    public function setName(string $name)
    {
        $this->params["name"] = $name;
    }

    /**
     * @param $phone string Option 电话
     * @return void
     */
    public function setPhone(string $phone)
    {
        $this->params["phone"] = $phone;
    }

    /**
     * 运费试算
     * @warehouse_code string Require 发货仓库代码
     * @country_code string Require 目的国家代码
     * @shipping_method string Require 配送方式
     * @postcode string Option 邮政编码
     * @weight float Require 包裹重量
     * @length float Option 包裹长
     * @width float Option 包裹宽
     * @height float Option 包裹高
     * @city string Option 城市
     * @state string Option 州/省
     * @address1 string Option 地址1
     * @name string Option 收件人名称
     * @phone string Option 电话
     * 示例：
     * {
     *      "warehouse_code":"HRBW",
     *      "country_code":"RU",
     *      "shipping_method":"F4",
     *      "postcode":"456145615",
     *      "weight":0.2,
     *      "length":0.2,
     *      "width":0.2,
     *      "height":0.2,
     *      "city":"",
     *      "state":""
     *      "name":"",
     *      "phone":"",
     * }
     * @return void
     */
    public function getCalculateFee()
    {
        $this->setService("getCalculateFee");
        return $this->PostSoapXML();
    }

    /**
     * 批量运费试算
     * @warehouse_code Int Require 发货仓库代码
     * @country_code string Require 目的国家代码
     * @shipping_method array Require 配送方式
     * @postcode string Option 邮政编码
     * @weight float Require 包裹重量
     * @length float Option 包裹长
     * @width float Option 包裹宽
     * @height float Option 包裹高
     * @address1 string Option 地址1
     * @state string Option 省
     * 示例：
     * {
     *      "warehouse_code":"HRBW",
     *      "country_code":"RU",
     *      "shipping_method":["FF","US"],
     *      "postcode":"456145615",
     *      "weight":"0.2",
     *      "length":"0.2",
     *      "width":"0.2",
     *      "height":"0.2"
     * }
     * @return void
     */
    public function getCalculateFeeBatch()
    {
        $this->setService("getCalculateFeeBatch");
        return $this->PostSoapXML();
    }

    /**
     * @param $cbl_refer_code string 否 单号
     * @return void
     */
    public function setCblReferCode(string $cbl_refer_code)
    {
        $this->params["cbl_refer_code"] = $cbl_refer_code;
    }

    /**
     * @param $ft_code String 否 费用类型
     * @return void
     */
    public function setFtCode(string $ft_code)
    {
        $this->params["ft_code"] = $ft_code;
    }

    /**
     * @param $addDateFrom string 否 创建开始时间
     * @return void
     */
    public function setAddDateFrom(string $addDateFrom)
    {
        $this->params["addDateFrom"] = $addDateFrom;
    }

    /**
     * @param $addDateEnd string 否 创建结束时间
     * @return void
     */
    public function setAddDateEnd(string $addDateEnd)
    {
        $this->params["addDateEnd"] = $addDateEnd;
    }

    /**
     * 费用流水
     * @cbl_refer_code string 否 单号
     * @ft_code String 否 费用类型
     * @addDateFrom string 否 创建开始时间
     * @addDateEnd string 否 创建结束时间
     * @page Int 是 当前页面
     * @pageSize Int 是 页面显示条数[0--100]
     * 示例：
     * {
     *      "pageSize":"20",
     *      "page":"1",
     *      "cbl_refer_code":"",
     *      "ft_code":"",
     *      "addDateFrom":"",
     *      "addDateEnd":""
     * }
     * @return void
     */
    public function getCostWater()
    {
        $this->setService("getCostWater");
        return $this->PostSoapXML();
    }

    /**
     * @param $business String Require 业务类型：
     * @return void
     */
    public function setBusiness(string $business)
    {
        $this->params["business"] = $business;
    }

    /**
     * @param $bill_code string Option 业务单号 (业务单号不为空时,业务类型可不填写)
     * @return void
     */
    public function setBillCode(string $bill_code)
    {
        $this->params["bill_code"] = $bill_code;
    }

    /**
     * @param $check_status Int Option 核账状态：A全部，C已核账，N未核账
     * @return void
     */
    public function setCheckStatus(int $check_status)
    {
        $this->params["check_status"] = $check_status;
    }

    /**
     * @param $start_time string Option 计费开始时间
     * @return void
     */
    public function setStartTime(string $start_time)
    {
        $this->params["start_time"] = $start_time;
    }

    /**
     * @param $end_time string Option 计费结束时间
     * @return void
     */
    public function setEndTime(string $end_time)
    {
        $this->params["end_time"] = $end_time;
    }

    /**
     * 费用账单
     * @warehouse_code string Require 仓库代码
     * @business String Require 业务类型：
     *                                  RECEIVING(入库单),ORDER(订单),RETURN(退件),FBA(FBA),RENT(仓租),CLAIM_ORDER(认领),FBA_RENT(FBA仓租),
     *                                  FBA_TRANSIT_ORDER(FBA转运单),FBA_BACK(FBA退件),FBA_PLATFORM_ORDER(FBA平台订单),
     *                                  FBA_EXCH(FBA退货换标),FBA_RECEIVING(FBA入库单),PACKAGE(包裹订单),PROCESSING_ORDER(集运),OTHER(其他)
     * @bill_code string Option 业务单号 (业务单号不为空时,业务类型可不填写)
     * @check_status Int Option 核账状态：A全部，C已核账，N未核账
     * @start_time string Option 计费开始时间
     * @end_time string Option 计费结束时间
     * @page Int Option 当前页面
     * @pageSize Int Option 页面显示条数[0--100]
     * 示例：
     * {
     *      "business":"ORDER",
     *      "warehouse_code":"DEW",
     *      "bil_code":"A001-20201218-0001",
     *      "check_status":"A",
     *      "start_time":"2020-08-18 14:00:00",
     *      "end_time":"2020-12-18 14:00:00",
     *      "page":"1",
     *      "pageSize":"20"
     * }
     * @return void
     */
    public function getBillingDetail()
    {
        $this->setService("getBillingDetail");
        return $this->PostSoapXML();
    }

    /**
     * 获取余额
     * 示例： {}
     * @return void
     */
    public function getBalance()
    {
        $this->setService("getBalance");
        return $this->PostSoapXML();
    }

    /**
     * @param $state_code string Option 省/州
     * @return void
     */
    public function setStateCode(string $state_code)
    {
        $this->params["state_code"] = $state_code;
    }

    /**
     * @param $is_signature int Option 是否签名0代表否 1代表是（默认0）
     * @return void
     */
    public function setIsSignature(int $is_signature)
    {
        $this->params["is_signature"] = $is_signature;
    }

    /**
     * @param $is_insurance int Option 是否保险0代表否 1代表是（默认0）
     * @return void
     */
    public function setIsInsurance(int $is_insurance)
    {
        $this->params["is_insurance"] = $is_insurance;
    }

    /**
     * @param $insurance_value string Option 保险金额
     * @return void
     */
    public function setInsuranceValue(string $insurance_value)
    {
        $this->params["insurance_value"] = $insurance_value;
    }

    /**
     * @param $order_product array Require 产品明细
     * @return void
     */
    public function setOrderProduct(array $order_product)
    {
        $this->params["order_product"] = $order_product;
    }

    /**
     * 订单费用试算
     * @warehouse_code Int Require 发货仓库代码
     * @country_code string Require 目的国家代码
     * @shipping_method string Require 物流产品
     * @postcode string Require 邮政编码（ODA邮编自动匹配ODA费用）
     * @weight float Option 包裹重量（不填则使用产品总重）
     * @length float Option 包裹长
     * @width float Option 包裹宽
     * @height float Option 包裹高
     * @state_code string Option 省/州
     * @city string Option 城市
     * @is_signature int Option 是否签名0代表否 1代表是（默认0）
     * @is_insurance int Option 是否保险0代表否 1代表是（默认0）
     * @insurance_value string Option 保险金额
     * @order_product object Require 产品明细
     * @address1 string Option 地址1
     * 示例：
     * {
     *      "warehouse_code": "DEW",
     *      "country_code": "DE",
     *      "shipping_method": "BRANT_GROUND",
     *      "postcode": "99999",
     *      "weight": "11",
     *      "is_signature": "0",
     *      "is_insurance": "0",
     *      "insurance_value": "0.000",
     *      "city": "Berlin",
     *      "state_code": "QLD",
     *      "order_product": [{
     *          "product_barcode": "A001-EC123",
     *          "product_declared_value": "10.000",
     *          "sku": "EC123",
     *          "quantity": "11",
     *          "shared_unit_price": "0.00",
     *          "op_sales_price": "0.000"
     *      }]
     * }
     * @return void
     */
    public function getOrderOperateFees()
    {
        $this->setService("getOrderOperateFees");
        return $this->PostSoapXML();
    }

    /**
     * 订单费用试算
     * @warehouse_code Int Require 发货仓库代码
     * @country_code string Require 目的国家代码
     * @shipping_method array Require 物流产品
     * @postcode string Require 邮政编码（ODA邮编自动匹配ODA费用）
     * @weight float Option 包裹重量
     * @length float Option 包裹长
     * @width float Option 包裹宽
     * @height float Option 包裹高
     * @state_code string Option 省/州
     * @city string Option 城市
     * @is_signature string Option 是否签名（默认否）
     * @is_insurance string Option 是否保险（默认否）
     * @insurance_value string Option 保险金额
     * @order_product Object Require 产品明细
     * @address1 string Option 地址1
     * 示例：
     * {
     *      "warehouse_code": "DEW",
     *      "country_code": "DE",
     *      "shipping_method": ["BRANT_GROUND"],
     *      "postcode": "99999",
     *      "weight": "11",
     *      "is_signature": "0",
     *      "is_insurance": "0",
     *      "insurance_value": "0.000",
     *      "city": "Berlin",
     *      "state_code": "QLD",
     *      "order_product": [{
     *          "product_barcode": "A001-EC123",
     *          "product_declared_value": "10.000",
     *          "sku": "EC123",
     *          "quantity": "11",
     *          "shared_unit_price": "0.00",
     *          "op_sales_price": "0.000"
     *      }]
     * }
     * @return void
     */
    public function getOrderOperateFeesBatch()
    {
        $this->setService("getOrderOperateFeesBatch");
        return $this->PostSoapXML();
    }

    /**
     * @param $amount string Require 充值金额
     * @return void
     */
    public function setAmount(string $amount)
    {
        $this->params["amount"] = $amount;
    }

    /**
     * @param $rechargeType string Require 支付方式（alipay支付宝,wxpay微信,union_pay银联, paypal,tgpay,paypal_payer）
     * @return void
     */
    public function setRechargeType(string $rechargeType)
    {
        $this->params["rechargeType"] = $rechargeType;
    }

    /**
     * 在线充值
     * @amount string Require 充值金额
     * @rechargeType string Require 支付方式（alipay支付宝,wxpay微信,union_pay银联, paypal,tgpay,paypal_payer）
     * 示例：
     * {
     *      "amount":"188",
     *      "rechargeType":"alipay"
     * }
     * @return void
     */
    public function customerRecharge()
    {
        $this->setService("customerRecharge");
        return $this->PostSoapXML();
    }

    /**
     * 获取充值明细
     * @orderCode    string    Require    充值流水号
     * 示例：
     * {
     *      "orderCode":"PAY20220202",
     * }
     * @return void
     */
    public function getPaymentDetail()
    {
        $this->setService("getPaymentDetail");
        return $this->PostSoapXML();
    }

    /**
     * @param $paymentMethod string Require 支付方式
     * @return void
     */
    public function setPaymentMethod(string $paymentMethod)
    {
        $this->params["paymentMethod"] = $paymentMethod;
    }

    /**
     * @param $paymentDate string Require 交易时间
     * @return void
     */
    public function setPaymentDate(string $paymentDate)
    {
        $this->params["paymentDate"] = $paymentDate;
    }

    /**
     * @param $paymentAccount string Require 收款账号
     * @return void
     */
    public function setPaymentAccount(string $paymentAccount)
    {
        $this->params["paymentAccount"] = $paymentAccount;
    }

    /**
     * @param $paymentCurrency string Require 币种
     * @return void
     */
    public function setPaymentCurrency(string $paymentCurrency)
    {
        $this->params["paymentCurrency"] = $paymentCurrency;
    }

    /**
     * @param $paymentAmount string Require 汇款金额
     * @return void
     */
    public function setPaymentAmount(string $paymentAmount)
    {
        $this->params["paymentAmount"] = $paymentAmount;
    }

    /**
     * @param $transactionNo string Option 交易号
     * @return void
     */
    public function setTransactionNo(string $transactionNo)
    {
        $this->params["transactionNo"] = $transactionNo;
    }

    /**
     * @param $paymentNote string Option 备注
     * @return void
     */
    public function setPaymentNote(string $paymentNote)
    {
        $this->params["paymentNote"] = $paymentNote;
    }

    /**
     * @param $attachArr array Option 附件
     * @return void
     */
    public function setAttachArr(array $attachArr)
    {
        $this->params["attachArr"] = $attachArr;
    }

    /**
     * @param $orderCode string Require 充值流水号
     * @return void
     */
    public function setOrderCode(string $orderCode)
    {
        $this->params["orderCode"] = $orderCode;
    }

    /**
     * 汇款通知
     * @paymentMethod string Require 支付方式
     * @paymentDate string Require 交易时间
     * @paymentAccount string Require 收款账号
     * @paymentCurrency string Require 币种
     * @paymentAmount string Require 汇款金额
     * @transactionNo string Option 交易号
     * @paymentNote string Option 备注
     * @attachArr array Option 附件
     * @orderCode string Require 充值流水号
     * 示例：
     * {
     *      "paymentMethod":"BANK",
     *      "paymentDate":"2022-08-09",
     *      "paymentAccount":"6225000000000011",
     *      "paymentCurrency":"RMB",
     *      "paymentAmount":"1",
     *      "transactionNo":"jioayu12345",
     *      "paymentNote":"备注",
     *      "attachArr":[
     *          "https://puep.qpic.cn/coral/Q3auHgzwzM4fgQ41VTF2rEDOichica3xDK4OSEsbC1AkBQQQtv5WN5Uw/0",
     *          "https://puep.qpic.cn/coral/Q3auHgzwzM4fgQ41VTF2rEDOichica3xDK4OSEsbC1AkBQQQtv5WN5Uw/0"
     *      ]
     * }
     * @return void
     */
    public function submitPayment()
    {
        $this->setService("submitPayment");
        return $this->PostSoapXML();
    }

    /**
     * 作废汇款通知
     * @noteIDs    array    Require    汇款单ID
     * 示例：
     * {
     *      "noteIDs":[168,167]
     * }
     * @return void
     */
    public function discardPayment()
    {
        $this->setService("discardPayment");
        return $this->PostSoapXML();
    }

    /**
     * @param $startDate string Option 创建开始日期
     * @return void
     */
    public function setStartDate(string $startDate)
    {
        $this->params["startDate"] = $startDate;
    }

    /**
     * @param $endDate string Option 创建截止日期
     * @return void
     */
    public function setEndDate(string $endDate)
    {
        $this->params["endDate"] = $endDate;
    }

    /**
     * @param $paymentCode string Option 支付方式代码
     * @return void
     */
    public function setPaymentCode(string $paymentCode)
    {
        $this->params["paymentCode"] = $paymentCode;
    }

    /**
     * @param $pnStatus int Option 状态 -1全部 0已作废 1待确认 2已确认 3已审核 4驳回 5已完成
     * @return void
     */
    public function setPnStatus(int $pnStatus)
    {
        $this->params["pnStatus"] = $pnStatus;
    }

    /**
     * @param $searchType int Option 搜索类型 1序号 2交易号
     * @return void
     */
    public function setSearchType(int $searchType)
    {
        $this->params["searchType"] = $searchType;
    }

    /**
     * @param $searchCode string Option 搜索代码
     * @return void
     */
    public function setSearchCode(string $searchCode)
    {
        $this->params["searchCode"] = $searchCode;
    }

    /**
     * 汇款通知列表
     * @pageSize int Option 页面显示条数[0--100]
     * @page int Option 当前页数
     * @startDate string Option 创建开始日期
     * @endDate string Option 创建截止日期
     * @paymentCode string Option 支付方式代码
     * @pnStatus int Option 状态 -1全部 0已作废 1待确认 2已确认 3已审核 4驳回 5已完成
     * @searchType int Option 搜索类型 1序号 2交易号
     * @searchCode string Option 搜索代码
     * 示例：
     * {
     *      "pageSize":2,
     *      "page":1,
     *      "startDate":"2022-01-08",
     *      "endDate":"2022-10-08",
     *      "pnStatus":1,
     *      "paymentCode":"Bank",
     *      "searchType":1,
     *      "searchCode":"202209141504513531"
     * }
     * @return void
     */
    public function getPaymentNoteList()
    {
        $this->setService("getPaymentNoteList");
        return $this->PostSoapXML();
    }

    /**
     * 汇款通知明细
     * @noteID    int    Require    汇款单ID
     * 示例： { "noteID":"160" }
     * @return void
     */
    public function getPaymentNoteDetail()
    {
        $this->setService("getPaymentNoteDetail");
        return $this->PostSoapXML();
    }

    /**
     * @param $warehouseId int Option 仓库ID
     * @return void
     */
    public function setWarehouseId(int $warehouseId)
    {
        $this->params["warehouseId"] = $warehouseId;
    }

    /**
     * @param $dateFor string Option 仓租发生开始日期
     * @return void
     */
    public function setDateFor(string $dateFor)
    {
        $this->params["dateFor"] = $dateFor;
    }

    /**
     * @param $dateTo string Option 仓租发生截止日期
     * @return void
     */
    public function setDateTo(string $dateTo)
    {
        $this->params["dateTo"] = $dateTo;
    }

    /**
     * @param $codeLike string Option 仓租单号（支持模糊搜索）
     * @return void
     */
    public function setCodeLike(string $codeLike)
    {
        $this->params["codeLike"] = $codeLike;
    }

    /**
     * @param $type int Option 搜索类型（ 1体积 2数量 3金额）
     * @return void
     */
    public function setType(int $type)
    {
        $this->params["type"] = $type;
    }

    /**
     * @param $typeValueFrom string Option 搜索类型开始值
     * @return void
     */
    public function setTypeValueFrom(string $typeValueFrom)
    {
        $this->params["typeValueFrom"] = $typeValueFrom;
    }

    /**
     * @param $typeValueTo string Option 搜索类型结束值
     * @return void
     */
    public function setTypeValueTo(string $typeValueTo)
    {
        $this->params["typeValueTo"] = $typeValueTo;
    }

    /**
     * @param $noteID int Require 汇款单ID
     * @return void
     */
    public function setNoteID(int $noteID)
    {
        $this->params["noteID"] = $noteID;
    }

    /**
     * 仓租列表
     * @pageSize int Option 页面显示条数[0--100]
     * @page int Option 当前页数
     * @warehouseId int Option 仓库ID
     * @dateFor string Option 仓租发生开始日期
     * @dateTo string Option 仓租发生截止日期
     * @codeLike string Option 仓租单号（支持模糊搜索）
     * @ type int Option 搜索类型（1体积 2数量 3金额）
     * @typeValueFrom string Option 搜索类型开始值
     * @typeValueTo string Option 搜索类型结束值
     * @noteID    int    Require    汇款单ID
     * 示例：
     * {
     *      "page":1,
     *      "pageSize":20,
     *      "dateFor":"2021-09-01",
     *      "dateTo":"2022-01-01",
     *      "codeLike":"-48-",
     *      "type":1,
     *      "typeValueFrom":1,
     *      "typeValueTo":100000000
     * }
     * @return void
     */
    public function getStorageCosts()
    {
        $this->setService("getStorageCosts");
        return $this->PostSoapXML();
    }

    /**
     * @param $platform array 否 平台
     * @return void
     */
    public function setPlatform(array $platform)
    {
        $this->params["platform"] = $platform;
    }

    /**
     * @param $cbl_type Int 否 资金流向 0:冻结; 1:解冻; 2:扣款（支出）; 3:入款（收入）
     * @return void
     */
    public function setCblType(int $cbl_type)
    {
        $this->params["cbl_type"] = $cbl_type;
    }

    /**
     * 订单费用流水
     * @page Int 是 当前页面
     * @pageSize Int 是 页面显示条数[0--100]
     * @ft_code String 否 费用类型
     * @addDateFrom datetime 否 创建开始时间
     * @addDateEnd datetime 否 创建结束时间
     * @platform array 否 平台
     * @search_code string 否 搜索单号
     * @search_type Int 否 单号类型（1交易流水号 2平台订单号 3仓库单号 4跟踪号 5店铺名称）
     * @cbl_type Int 否 资金流向 0:冻结; 1:解冻; 2:扣款（支出）; 3:入款（收入）
     * 示例：
     * {
     *      "pageSize":"20",
     *      "page":"1",
     *      "ft_code":"",
     *      "addDateFrom":"",
     *      "addDateEnd":"",
     *      "search_code":"A001-180801-0008",
     *      "search_type":3,
     *      "platform":["SHOPEE","OTHER"],
     *      "cbl_type":2
     * }
     * @return void
     */
    public function getCostWaterAndOrder()
    {
        $this->setService("getCostWaterAndOrder");
        return $this->PostSoapXML();
    }

    /**
     * @param $ds_code string Option 业务类型代码
     * @return void
     */
    public function setDsCode(string $ds_code)
    {
        $this->params["ds_code"] = $ds_code;
    }

    /**
     * @param $bi_status int Option 核账状态 2未核账 3已核账
     * @return void
     */
    public function setBiStatus(int $bi_status)
    {
        $this->params["bi_status"] = $bi_status;
    }

    /**
     * 订单费用账单
     * @ds_code string Option 业务类型代码
     * @bi_status int Option 核账状态 2未核账 3已核账
     * @ft_code string Option 费用类型代码
     * @warehouse_id Int Option 仓库ID
     * @dateFor datetime Option 计费开始时间
     * @dateTo datetime Option 计费结束时间
     * @search_code datetime Option 搜索单号
     * @search_type datetime int 搜索类型 1仓库单号 2平台订单号 3店铺名称
     * @page Int Option 当前页面
     * @pageSize Int Option 页面显示条数[0--100]
     * 示例：
     * {
     *      "pageSize":"2",
     *      "page":"1",
     *      "ds_code":"so",
     *      "bi_status":2,
     *      "ft_code":"pay",
     *      "warehouse_id":1,
     *      "search_type":1,
     *      "search_code":"A001-210311-0008",
     *      "dateFor":"2020-08-18 14:00:00",
     *      "dateTo":"2021-12-18 14:00:00"
     * }
     * @return void
     */
    public function getCostBillAndOrder()
    {
        $this->setService("getCostBillAndOrder");
        return $this->PostSoapXML();
    }

    /**
     * 申请信用额度
     * 示例：
     * {
     *      "creditLine":20,
     *      "effectiveTime":"2022-11-17 18:37:54",
     *      "note":"接口触发"
     * }
     * @return void
     */
    public function quotaApply()
    {
        $this->setService("quotaApply");
        return $this->PostSoapXML();
    }

    /**
     * @param $applyName string Option 申请人名称（支持模糊）
     * @return void
     */
    public function setApplyName(string $applyName)
    {
        $this->params["applyName"] = $applyName;
    }

    /**
     * @param $code string Option 单号
     * @return void
     */
    public function setCode(string $code)
    {
        $this->params["code"] = $code;
    }

    /**
     * @param $channel int Option 单据来源（0全部 1wms 2oms（sellerwell））
     * @return void
     */
    public function setChannel(int $channel)
    {
        $this->params["channel"] = $channel;
    }

    /**
     * @param $status int Option 状态（0已作废 2待审核 3审核通过 4已过期 5审核不通过）
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->params["status"] = $status;
    }

    /**
     * 申请信用额度列表
     * @pageSize int Option 页面显示条数[0--100]
     * @page int Option 当前页数
     * @applyName string Option 申请人名称（支持模糊）
     * @dateFor string Option 申请开始日期
     * @dateTo string Option 申请截止日期
     * @code string Option 单号
     * @channel int Option 单据来源（0全部 1wms 2oms（sellerwell））
     * @status int Option 状态（0已作废 2待审核 3审核通过 4已过期 5审核不通过）
     * 示例：
     * {
     *      "page":1,
     *      "pageSize":20,
     *      "applyName":"申请人",
     *      "dateFor":"2022-10-12 10:11:18",
     *      "dateTo":"2022-10-12 11:11:18",
     *      "code":"单号",
     *      "channel":"1",
     *      "status":1
     * }
     * @return void
     */
    public function getCreditLineList()
    {
        $this->setService("getCreditLineList");
        return $this->PostSoapXML();
    }

    /**
     * @param $acl_code string    Require    单号
     * @return void
     */
    public function setAclCode(string $acl_code)
    {
        $this->params["acl_code"] = $acl_code;
    }

    /**
     * 作废信用额度申请
     * @acl_code string    Require    单号
     * 示例：
     * { "acl_code":"W202210121011183973" }
     * @return void
     */
    public function voidApply()
    {
        $this->setService("voidApply");
        return $this->PostSoapXML();
    }

    /**
     * 删除信用额度申请
     * @acl_code string    Require    单号
     * 示例：
     * { "acl_code":"W202210121011183973" }
     * @return void
     */
    public function deleteApply()
    {
        $this->setService("deleteApply");
        return $this->PostSoapXML();
    }
}
