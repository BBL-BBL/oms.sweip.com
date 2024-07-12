<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class ReturnModule extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $code_arr  int require 每页数据长度，最大值100
     * @return void
     */
    public function setCodeArr(int $code_arr)
    {
        $this->params["code_arr"] = $code_arr;
    }

    /**
     * @param $spo_status  int require 当前页
     * @return void
     */
    public function setSpoStatus(int $spo_status)
    {
        $this->params["spo_status"] = $spo_status;
    }

    /**
     * @param $spo_type  array option 单号数组：['R001', 'R002']
     * @return void
     */
    public function setSpoType(array $spo_type)
    {
        $this->params["spo_type"] = $spo_type;
    }

    /**
     * @param $warehouse_code  int option 状态 0:已作废 1:待确认 2:在途 3:到货 4:到货异常 5:已完成
     * @return void
     */
    public function setWarehouseCode(int $warehouse_code)
    {
        $this->params["warehouse_code"] = $warehouse_code;
    }

    /**
     * @param $spo_storage_type  int option 退件类型 1:买家退件 2:物流退件 3:认领
     * @return void
     */
    public function setSpoStorageType(int $spo_storage_type)
    {
        $this->params["spo_storage_type"] = $spo_storage_type;
    }

    /**
     * @param $spo_process_type  string option 仓库代码
     * @return void
     */
    public function setSpoProcessType(string $spo_process_type)
    {
        $this->params["spo_process_type"] = $spo_process_type;
    }

    /**
     * @param $searchType  int option 入库类型：1:仓内 2:外仓 3:两者均有
     * @return void
     */
    public function setSearchType(int $searchType)
    {
        $this->params["searchType"] = $searchType;
    }

    /**
     * @param $code
     * int option 处理类型：1:重新上架销售 2:退回国内 3:不良品 4:销毁 5:待检查 6:换标 8:产品升级     * @return void
     */
    public function setCode($code)
    {
        $this->params["code"] = $code;
    }

    /**
     * @param $inventory_type  string option 搜索类型：searchCode退件单号 searchSku搜索SKU
     * @return void
     */
    public function setInventoryType(string $inventory_type)
    {
        $this->params["inventory_type"] = $inventory_type;
    }

    /**
     * @param $spo_attr  string option 搜索值，配合上面的searchType条件使用，代表对应类型的单号或者sku代码
     * @return void
     */
    public function setSpoAttr(string $spo_attr)
    {
        $this->params["spo_attr"] = $spo_attr;
    }

    /**
     * @param $spo_label_services  int option 库存类型：0标准 1:不良 2:暂存
     * @return void
     */
    public function setSpoLabelServices(int $spo_label_services)
    {
        $this->params["spo_label_services"] = $spo_label_services;
    }

    /**
     * @param $spo_desc_like  int option 退件标识：1:标准退件 2:回邮退件
     * @return void
     */
    public function setSpoDescLike(int $spo_desc_like)
    {
        $this->params["spo_desc_like"] = $spo_desc_like;
    }

    /**
     * @param $spo_add_time_from  int option Label服务 1:是 0:否
     * @return void
     */
    public function setSpoAddTimeFrom(int $spo_add_time_from)
    {
        $this->params["spo_add_time_from"] = $spo_add_time_from;
    }

    /**
     * @param $spo_add_time_to  string option 退件原因,模糊搜索
     * @return void
     */
    public function setSpoAddTimeTo(string $spo_add_time_to)
    {
        $this->params["spo_add_time_to"] = $spo_add_time_to;
    }

    /**
     * @param $spo_confirm_time_from  string option 创建开始时间， 格式YYYY-MM-DD HH:II:SS
     * @return void
     */
    public function setSpoConfirmTimeFrom(string $spo_confirm_time_from)
    {
        $this->params["spo_confirm_time_from"] = $spo_confirm_time_from;
    }

    /**
     * @param $spo_confirm_time_to  string option 创建结束时间， 格式YYYY-MM-DD HH:II:SS
     * @return void
     */
    public function setSpoConfirmTimeTo(string $spo_confirm_time_to)
    {
        $this->params["spo_confirm_time_to"] = $spo_confirm_time_to;
    }

    /**
     * @param $spo_complete_time_from  string option 审核开始时间， 格式YYYY-MM-DD HH:II:SS
     * @return void
     */
    public function setSpoCompleteTimeFrom(string $spo_complete_time_from)
    {
        $this->params["spo_complete_time_from"] = $spo_complete_time_from;
    }

    /**
     * @param $spo_complete_time_to  string option 审核结束时间， 格式YYYY-MM-DD HH:II:SS
     * @return void
     */
    public function setSpoCompleteTimeTo(string $spo_complete_time_to)
    {
        $this->params["spo_complete_time_to"] = $spo_complete_time_to;
    }

    /**
     * @param $spo_update_time_from  string option 完成开始时间， 格式YYYY-MM-DD HH:II:SS
     * @return void
     */
    public function setSpoUpstringFrom(string $spo_update_time_from)
    {
        $this->params["spo_update_time_from"] = $spo_update_time_from;
    }

    /**
     * @param $spo_update_time_to  string option 完成结束时间， 格式YYYY-MM-DD HH:II:SS
     * @return void
     */
    public function setSpoUpstringTo(string $spo_update_time_to)
    {
        $this->params["spo_update_time_to"] = $spo_update_time_to;
    }

    /**
     * 获取退件列表
     * @pageSize int require 每页数据长度，最大值100
     * @page int require 当前页
     * @code_arr array option 单号数组：['R001', 'R002']
     * @spo_status int option 状态 0:已作废 1:待确认 2:在途 3:到货 4:到货异常 5:已完成
     * @spo_type int option 退件类型 1:买家退件 2:物流退件 3:认领
     * @warehouse_code string option 仓库代码
     * @spo_storage_type int option 入库类型：1:仓内 2:外仓 3:两者均有
     * @spo_process_type int option 处理类型：1:重新上架销售 2:退回国内 3:不良品 4:销毁 5:待检查 6:换标 8:产品升级
     * @searchType string option 搜索类型：searchCode退件单号 searchSku搜索SKU
     * @code string option 搜索值，配合上面的searchType条件使用，代表对应类型的单号或者sku代码
     * @inventory_type int option 库存类型：0标准 1:不良 2:暂存
     * @spo_attr int option 退件标识：1:标准退件 2:回邮退件
     * @spo_label_services int option Label服务 1:是 0:否
     * @spo_desc_like string option 退件原因,模糊搜索
     * @spo_add_time_from string option 创建开始时间， 格式YYYY-MM-DD HH:II:SS
     * @spo_add_time_to string option 创建结束时间， 格式YYYY-MM-DD HH:II:SS
     * @spo_confirm_time_from string option 审核开始时间， 格式YYYY-MM-DD HH:II:SS
     * @spo_confirm_time_to string option 审核结束时间， 格式YYYY-MM-DD HH:II:SS
     * @spo_complete_time_from string option 完成开始时间， 格式YYYY-MM-DD HH:II:SS
     * @spo_complete_time_to string option 完成结束时间， 格式YYYY-MM-DD HH:II:SS
     * @spo_update_time_from string option 更新开始时间， 格式YYYY-MM-DD HH:II:SS
     * @spo_update_time_to string option 更新结束时间， 格式YYYY-MM-DD HH:II:SS
     * 示例：
     * {
     *      "pageSize":"20",
     *      "page":"1",
     *      "code_arr":["RMAA002-171208-0002"],
     *      "spo_status":"3",
     *      "spo_type":"1",
     *      "warehouse_code":"DEW",
     *      "spo_storage_type":"1",
     *      "spo_process_type":"1",
     *      "spo_label_services":"0",
     *      "spo_desc_like":"",
     *      "spo_add_time_from":"2017-12-08 19:17:19",
     *      "spo_add_time_to":"2017-12-08 19:17:20",
     *      "spo_confirm_time_from":"2017-12-08 19:17:19",
     *      "spo_confirm_time_to":"2017-12-08 19:17:20",
     *      "spo_complete_time_from":"",
     *      "spo_complete_time_to":"",
     *      "spo_update_time_from" : "",
     *      "spo_update_time_to" : "",
     *      "spo_attr":"1",
     * }
     * @return array|mixed
     */
    public function getSpecialOrdersList()
    {
        $this->setService("getSpecialOrdersList");
        return $this->PostSoapXML();
    }

    /**
     * @param $tracking_no string require 退件跟踪号 ，不能超过64个字符
     * @return void
     */
    public function setTrackingNo(string $tracking_no)
    {
        $this->params["tracking_no"] = $tracking_no;
    }

    /**
     * @param $return_type string require 退件类型 ：S买家退件，L物流退件，C认领退件
     * @return void
     */
    public function setReturnType(string $return_type)
    {
        $this->params["return_type"] = $return_type;
    }

    /**
     * @param $verify string option 确认审核 ：1确认，0草稿
     * @return void
     */
    public function setVerify(string $verify)
    {
        $this->params["verify"] = $verify;
    }

    /**
     * @param $reference_no string option 参考号 ，不能超过32个字符
     * @return void
     */
    public function setReferenceNo(string $reference_no)
    {
        $this->params["reference_no"] = $reference_no;
    }

    /**
     * @param $order_code string option 原订单号 ；(S类型必填)
     * @return void
     */
    public function setOrderCode(string $order_code)
    {
        $this->params["order_code"] = $order_code;
    }

    /**
     * @param $claim_code string option 认领单号 ；(C类型必填)
     * @return void
     */
    public function setClaimCode(string $claim_code)
    {
        $this->params["claim_code"] = $claim_code;
    }

    /**
     * @param $expected_date string option 预计到达日期
     * @return void
     */
    public function setExpectedDate(string $expected_date)
    {
        $this->params["expected_date"] = $expected_date;
    }

    /**
     * @param $return_desc string option 退件描述 ，不能超过255个字符
     * @return void
     */
    public function setReturnDesc(string $return_desc)
    {
        $this->params["return_desc"] = $return_desc;
    }

    /**
     * @param $operation_desc string option 退件操作说明
     * @return void
     */
    public function setOperationDesc(string $operation_desc)
    {
        $this->params["operation_desc"] = $operation_desc;
    }

    /**
     * @param $buyer_name string option 买家名字 ，不能超过64个字符
     * @return void
     */
    public function setBuyerName(string $buyer_name)
    {
        $this->params["buyer_name"] = $buyer_name;
    }

    /**
     * @param $buyers_ein string option 买家税号 ，不能超过64个字符
     * @return void
     */
    public function setBuyersEin(string $buyers_ein)
    {
        $this->params["buyers_ein"] = $buyers_ein;
    }

    /**
     * @param $seller_store string option 卖家店铺 ，不能超过100个字符
     * @return void
     */
    public function setSellerStore(string $seller_store)
    {
        $this->params["seller_store"] = $seller_store;
    }

    /**
     * @param $items array require 退件产品明细
     * @return void
     */
    public function setItems(array $items)
    {
        $this->params["items"] = $items;
    }

    /**
     * @param $images array option 退件图片
     * @return void
     */
    public function setImages(array $images)
    {
        $this->params["images"] = $images;
    }

    /**
     * 创建退件
     * @tracking_no string require 退件跟踪号 ，不能超过64个字符
     * @warehouse_code string require 仓库编码
     * @return_type enum require 退件类型 ：S买家退件，L物流退件，C认领退件
     * @verify enum option 确认审核 ：1确认，0草稿
     * @reference_no string option 参考号 ，不能超过32个字符
     * @order_code string option 原订单号 ；(S类型必填)
     * @claim_code string option 认领单号 ；(C类型必填)
     * @expected_date datetime option 预计到达日期
     * @return_desc string option 退件描述 ，不能超过255个字符
     * @operation_desc string option 退件操作说明
     * @buyer_name string option 买家名字 ，不能超过64个字符
     * @buyers_ein string option 买家税号 ，不能超过64个字符
     * @seller_store string option 卖家店铺 ，不能超过100个字符
     * @items object[] require 退件产品明细
     * @images object[] option 退件图片
     * 示例:
     * {
     *      "reference_no": "F00-000000-0001",
     *      "warehouse_code": "HRBW",
     *      "sm_code": "GRABEXPRESS",
     *      "verify": "0",
     *      "return_identification":1,
     *      "items": [{
     *          "product_sku": "EA140509201610",
     *          "quantity": "1",
     *          "process": "1",
     *          "note": "备注说明"
     *      }],
     *      "images": [{
     *          "file_type": "jpg",
     *          "file_data": "data:image/jpeg;base64,/9j/4R/+RXhpZgAATU0AKgAAAAgACwEPAAIAAAAGAAAAkgEQAAIAAAAK...."
     *      }],
     *      "sender_info": {
     *          "sender_name": "",
     *          "sender_company": "",
     *          "sender_country": "",
     *          "sender_phone": "",
     *          "sender_email": "",
     *          "sender_zipcode": "",
     *          "sender_address1": "",
     *          "sender_city": "",
     *          "sender_address2": "",
     *          "sender_state": "",
     *          "sender_doorplate":""
     *      }
     * }
     * @return array|mixed
     */
    public function createReturnBill()
    {
        $this->setService("createReturnBill");
        return $this->PostSoapXML();
    }

    /**
     * @param $return_code string require 退件单号
     * @return void
     */
    public function setReturnCode(string $return_code)
    {
        $this->params["return_code"] = $return_code;
    }

    /**
     * 修改退件
     * @return_code string require 退件单号
     * @tracking_no string require 退件跟踪号，不能超过64个字符
     * @warehouse_code string require 仓库编码
     * @return_type enum require 退件类型：S买家退件，L物流退件，C认领退件
     * @verify enum option 确认审核：1确认，0草稿
     * @reference_no string option 参考号，不能超过32个字符
     * @order_code string option 原订单号；(S类型必填)
     * @claim_code string option 认领单号；(C类型必填)
     * @expected_date datetime option 预计到达日期
     * @return_desc string option 退件描述，不能超过255个字符
     * @operation_desc string option 退件操作说明
     * @buyer_name string option 买家名字，不能超过64个字符
     * @buyers_ein string option 买家税号，不能超过64个字符
     * @seller_store string option 卖家店铺，不能超过100个字符
     * @items array require 退件产品明细
     * 示例：
     * {
     *      "return_code":"RMA5-161221-0001",
     *      "tracking_no":"F00-000000-0002",
     *      "warehouse_code":"HRBW",
     *      "return_type":"S",
     *      "verify":"0",
     *      "reference_no":"31-160709-0001",
     *      "order_code":"100002-140512-0003",
     *      "claim_code":"C15581701230004",
     *      "expected_date":"0000-00-00 00:00:00",
     *      "return_desc":"退件描述",
     *      "operation_desc":"退件操作说明",
     *      "buyer_name":"买家名字",
     *      "buyers_ein":"买家税号",
     *      "seller_store":"卖家店铺",
     *      "items":[{
     *          "product_sku":"EA140509201610",
     *          "quantity":"1",
     *          "process":"1",
     *          "note":"备注说明"
     *      }]
     * }
     * @return array|mixed
     */
    public function updateReturnBill()
    {
        $this->setService("updateReturnBill");
        return $this->PostSoapXML();
    }

    /**
     * 获取退件信息
     * @return_code    string    Require    退件单号
     * 示例：
     * {
     *      "return_code":"RMA31-160930-0002"
     * }
     * @return array|mixed
     */
    public function getReturnBill()
    {
        $this->setService("getReturnBill");
        return $this->PostSoapXML();
    }

    /**
     * @param $spoIds array require 退件单ID
     * @return void
     */
    public function setSpoIds(array $spoIds)
    {
        $this->params["spoIds"] = $spoIds;
    }

    /**
     * 提交审核
     * @spoIds array require 退件单ID
     * 示例：
     * {
     *  "spoIds":[1,2,3]
     * }
     * @return array|mixed
     */
    public function submitExamine()
    {
        $this->setService("submitExamine");
        return $this->PostSoapXML();
    }

    /**
     * @param $spoCodes array option 退件单code 传code就可以不需要传id，传值会转换成id，如：['code1', 'code2']
     * @return void
     */
    public function setSpoCodes(array $spoCodes)
    {
        $this->params["spoCodes"] = $spoCodes;
    }

    /**
     * @param $remark string option 备注信息
     * @return void
     */
    public function setRemark(string $remark)
    {
        $this->params["remark"] = $remark;
    }

    /**
     * 作废单据
     * @spoCodes array option 退件单code 传code就可以不需要传id，传值会转换成id，如：['code1', 'code2']
     * @spoIds array require 退件单ID数组，如：[1, 2]
     * @remark string option 备注信息
     * 示例：
     * {
     *      "spoCodes":['code1','code2'],
     *      "spoIds":[1,2,3],
     *      "remark":"备注信息"
     * }
     * @return array|mixed
     */
    public function cancelSpecial()
    {
        $this->setService("cancelSpecial");
        return $this->PostSoapXML();
    }

    /**
     * @param $spoId string require    退件ID
     * @return void
     */
    public function setSpoId(string $spoId)
    {
        $this->params["spoId"] = $spoId;
    }

    /**
     * 获取日志
     * @spoId string require    退件ID
     * 示例：{"spoId":"1"}
     * @return array|mixed
     */
    public function getReturnLog()
    {
        $this->setService("getReturnLog");
        return $this->PostSoapXML();
    }

    /**
     * @param $comments string require 日志备注信息
     * @return void
     */
    public function setComments(string $comments)
    {
        $this->params["comments"] = $comments;
    }

    /**
     * 添加日志
     * @spoId string require 退件ID
     * @comments string require 日志备注信息
     * 示例：{"spoId":"4093","comments":"C63102210200027"}
     * @return array|mixed
     */
    public function addReturnLog()
    {
        $this->setService("addReturnLog");
        return $this->PostSoapXML();
    }

    /**
     * 获取费用明细
     * @spoId string require 退件ID
     * 示例：{"spoId":"1"}
     * @return array|mixed
     */
    public function getReturnFee()
    {
        $this->setService("getReturnFee");
        return $this->PostSoapXML();
    }

    /**
     * 获取退件订单信息
     * @orderCode string require 仓库订单号
     * 示例：{"orderCode":"A406-220825-0004"}
     * @return array|mixed
     */
    public function getReturnOrders()
    {
        $this->setService("getReturnOrders");
        return $this->PostSoapXML();
    }

    /**
     * 导出退件订单信息
     * @spoIds    array    require    退件单ID数组，如：[1, 2]
     * 示例：{"spoIds":[1,2,3,4,5]}
     * @return array|mixed
     */
    public function exportReturnInfo()
    {
        $this->setService("exportReturnInfo");
        return $this->PostSoapXML();
    }

    /**
     * @param $data array require    批量数据
     * @data array require    批量数据
     * @data[0] array require 退件数据，第一个元素数组是退件所需要的参数标题，第二个元素开始是具体对应的参数值，像excel表格的行数据一样
     * @data[1] array require 退件产品数据，第一个元素数组是产品所需要的参数标题，第二个元素开始是具体对应的参数值，像excel表格的行数据一样
     * @return void
     */
    public function setData(array $data)
    {
        $this->params["data"] = $data;
    }

    /**
     * 导出退件订单信息
     * @data array require    批量数据
     * @data[0] array require 退件数据，第一个元素数组是退件所需要的参数标题，第二个元素开始是具体对应的参数值，像excel表格的行数据一样
     * @data[1] array require 退件产品数据，第一个元素数组是产品所需要的参数标题，第二个元素开始是具体对应的参数值，像excel表格的行数据一样
     * 示例：
     * { "data":[
     *      [
     *           [
     *                '参考号/ReferenceCode',
     *                '收货仓库/Warehouse',
     *                '寄件人/Sender',
     *                '联系电话/Tel',
     *                '地址1/Address 1',
     *                '国家/Country',
     *                '城市(府)/City',
     *                '州(省)/State',
     *                '邮编/Postcode',
     *                '公司/Company',
     *                '邮箱/Email',
     *                '地址2/Address 2',
     *                '运输方式/Shipping methods'
     *           ],
     *           [
     *                "code",
     *                "收货仓库",
     *                "寄件人",
     *                "33215351",
     *                "地址1",
     *                "国家简码",
     *                "城市",
     *                "州(省)",
     *                "邮编",
     *                "公司",
     *                "邮箱",
     *                "地址2",
     *                "运输方式"
     *           ],
     *           [
     *                "code",
     *                "收货仓库",
     *                "寄件人",
     *                "33215351",
     *                "地址1",
     *                "国家简码",
     *                "城市",
     *                "州(省)",
     *                "邮编",
     *                "公司",
     *                "邮箱",
     *                "地址2",
     *                "运输方式"
     *           ]
     *      ],
     *      [
     *           [
     *                '参考号/ReferenceCode',
     *                '产品编码/ProductBarcode',
     *                '数量/Number',
     *                '处理方式/DealProcess',
     *                '退件说明/SpecialDesc',
     *           ],
     *           [
     *                "参考号",
     *                "产品编码",
     *                "1",
     *                "处理方式",
     *                "退件说明"
     *           ]
     *      ]
     * ]}
     * @return array|mixed
     */
    public function importReturnInfo()
    {
        $this->setService("importReturnInfo");
        return $this->PostSoapXML();
    }

    /**
     * 批量导入退件产品数据
     * @data object require 导入退件sku数据
     * 示例：
     * { "data":[[
     *      [
     *           "SKU",
     *           "产品名称/ProductName",
     *           "数量/Qty",
     *           "处理方式/ProcessType",
     *           "备注/Note"
     *      ],
     *      [
     *           "4324",
     *           "432",
     *           "4324",
     *           "4324",
     *           "42"
     *      ]
     * ]]}
     * @return array|mixed
     */
    public function importReturnSku()
    {
        $this->setService("importReturnSku");
        return $this->PostSoapXML();
    }

    /**
     * @param $warehouseId int option 仓库ID
     * @return void
     */
    public function setWarehouseId(int $warehouseId)
    {
        $this->params["warehouseId"] = $warehouseId;
    }

    /**
     * @param $quantityType int option 数量类型 1待确认、2良品、3不良品
     * @return void
     */
    public function setQuantityType(int $quantityType)
    {
        $this->params["quantityType"] = $quantityType;
    }

    /**
     * @param $minNum int option 数量搜索区间开始值
     * @return void
     */
    public function setMinNum(int $minNum)
    {
        $this->params["minNum"] = $minNum;
    }

    /**
     * @param $maxNum int option 数量搜索区间结束值
     * @return void
     */
    public function setMaxNum(int $maxNum)
    {
        $this->params["maxNum"] = $maxNum;
    }

    /**
     * @param $productSku string option 搜索sku值
     * @return void
     */
    public function setProductSku(string $productSku)
    {
        $this->params["productSku"] = $productSku;
    }

    /**
     * 获取不良品列表
     * @pageSize int require 每页数据长度，最大值100
     * @page int require 当前页
     * @warehouseId int option 仓库ID
     * @quantityType int option 数量类型 1待确认、2良品、3不良品
     * @minNum int option 数量搜索区间开始值
     * @maxNum int option 数量搜索区间结束值
     * @productSku string option 搜索sku值
     * @searchType string option 搜索类型：0精准查询 1模糊查询
     * 示例：
     * {
     *      "page":1,
     *      "pageSize":2,
     *      "warehouseId":23,
     *      "quantityType":2,
     *      "minNum":1,
     *      "maxNum":10,
     *      "productSku":"Q-20220608-0056",
     *      "searchType":1
     * }
     * @return array|mixed
     */
    public function getRejectsList()
    {
        $this->setService("getRejectsList");
        return $this->PostSoapXML();
    }

    /**
     * @param $ra_desc string    require    备注
     * @return void
     */
    public function setRaDesc(string $ra_desc)
    {
        $this->params["ra_desc"] = $ra_desc;
    }

    /**
     * @param $type int require 操作类型（1作废 2重新上架）
     * @return void
     */
    public function setType(int $type)
    {
        $this->params["type"] = $type;
    }

    /**
     * @param $unsellableArr array require 不良品数据
     * @return void
     */
    public function setUnsellableArr(array $unsellableArr)
    {
        $this->params["unsellableArr"] = $unsellableArr;
    }

    /**
     * @param $unconfirmedArr array require 待确认数据
     * @return void
     */
    public function setUnconfirmedArr(array $unconfirmedArr)
    {
        $this->params["unconfirmedArr"] = $unconfirmedArr;
    }

    /**
     * @param $sellableArr array option 良品数据（操作类型是销毁时，必填）
     * @return void
     */
    public function setSellableArr(array $sellableArr)
    {
        $this->params["sellableArr"] = $sellableArr;
    }

    /**
     * 处理不良品
     * @warehouseId int    require    仓库ID
     * @ra_desc string    require    备注
     * @ type int require 操作类型（1作废 2重新上架）
     * @unsellableArr array require 不良品数据
     * @unconfirmedArr array require 待确认数据
     * @sellableArr array option 良品数据（操作类型是销毁时，必填）
     * 示例：
     * {
     *      "warehouseId":23,
     *      "type":1,
     *      "unsellableArr":[{
     *           "productId":47547125,
     *           "unsellable":1
     *      }],
     *      "unconfirmedArr":[{
     *           "productId":47547125,
     *           "unconfirmed":2
     *      }],
     *      "sellableArr":[{
     *           "productId":47547125,
     *           "sellable":3
     *      }]
     * }
     * @return array|mixed
     */
    public function dealRejects()
    {
        $this->setService("dealRejects");
        return $this->PostSoapXML();
    }

    /**
     * @param $status int option 处理状态 0未处理 1处理中 2处理完成 9删除
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->params["status"] = $status;
    }

    /**
     * 查看处理结果
     * @pageSize int require 每页数据长度，最大值100
     * @page int require 当前页
     * @warehouseId int option 仓库ID
     * @ type int option 处理类型 1销毁 2重新上架
     * @status int option 处理状态 0未处理 1处理中 2处理完成 9删除
     * @code string option 通知单号
     * @searchType int option 通知单号搜索类型（0精准 1模糊）
     * 示例：
     * {
     *      "page":1,
     *      "pageSize":2,
     *      "warehouseId":"",
     *      "type":"",
     *      "status":"",
     *      "code":""
     * }
     * @return array|mixed
     */
    public function getAbnormalResults()
    {
        $this->setService("getAbnormalResults");
        return $this->PostSoapXML();
    }
}
