<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class InboundOrderModule extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $value Int(11)    Option    入库单ID
     * @return void
     */
    public function setReceivingId(int $value)
    {
        $this->params["receiving_id"] = $value;
    }

    /**
     * @param $value string(32)    Option    入库单号
     * @return void
     */
    public function setReceivingCode(string $value)
    {
        $this->params["receiving_code"] = $value;
    }

    /**
     * @param $value array    Option    多个入库单号,数组格式
     * @return void
     */
    public function setReceivingCodeArr(array $value)
    {
        $this->params["receiving_code_arr"] = $value;
    }

    /**
     * @param $value string(255)    Option    参考号
     * @return void
     */
    public function setReferenceNo(string $value)
    {
        $this->params["reference_no"] = $value;
    }

    /**
     * @param $value array    Option    多个参考号,数组格式
     * @return void
     */
    public function setReferenceNoArr(array $value)
    {
        $this->params["reference_no_arr"] = $value;
    }

    /**
     * @param $value String(19)    Option    起始时间(创建时间,有入库单号的时候此参数失效)
     * @return void
     */
    public function setCreateDateFrom(string $value)
    {
        $this->params["create_date_from"] = $value;
    }

    /**
     * @param $value String(19)    Option    结束时间(创建时间,有入库单号的时候此参数失效)
     * @return void
     */
    public function setCreateDateTo(string $value)
    {
        $this->params["create_date_to"] = $value;
    }

    /**
     * @param $value String(19)    Option    起始时间(修改时间,有入库单号的时候此参数失效)
     * @return void
     */
    public function setModifyDateFrom(string $value)
    {
        $this->params["modify_date_from"] = $value;
    }

    /**
     * @param $value String(19)    Option    结束时间(修改时间,有入库单号的时候此参数失效)
     * @return void
     */
    public function setModifyDateTo(string $value)
    {
        $this->params["modify_date_to"] = $value;
    }

    /**
     * @param $value Int(1)    Option    保税用户填1,其它可不填
     * @return void
     */
    public function setBusinessType(int $value)
    {
        $this->params["business_type"] = $value;
    }

    /**
     * @param $value Int(1)    Option    是否返回库存批次号字段；0否，1是；默认0
     * @return void
     */
    public function setIsGetInventoryCode(int $value)
    {
        $this->params["is_get_inventory_code"] = $value;
    }


    /**
     * @param $reference_no String(255)    Require    入库单参考号
     * @return void
     */
    public function setReference_no(string $reference_no)
    {
        $this->params['reference_no'] = $reference_no;
    }

    /**
     * @param $income_type Int(1)    Option    交货方式，0自送，1揽收
     * @return void
     */
    public function setIncome_type(int $income_type)
    {
        $this->params['income_type'] = $income_type;
    }

    /**
     * @param $receiving_type Int(1)    Option    入库单类型：D:自发头程,T中转代发
     * @return void
     */
    public function setReceiving_type(int $receiving_type)
    {
        $this->params['receiving_type'] = $receiving_type;
    }

    /**
     * @param $warehouse_code string(30)    Require    目的仓
     * @return void
     */
    public function setWarehouse_code(string $warehouse_code)
    {
        $this->params['warehouse_code'] = $warehouse_code;
    }

    /**
     * @param $transit_warehouse_code string(30)    Option    中转仓库，中转代发时，必填
     * @return void
     */
    public function setTransit_warehouse_code(string $transit_warehouse_code)
    {
        $this->params['transit_warehouse_code'] = $transit_warehouse_code;
    }

    /**
     * @param $sm_code string(32)    Option    物流产品，中转代发时，必填
     * @return void
     */
    public function setSm_code(string $sm_code)
    {
        $this->params['sm_code'] = $sm_code;
    }

    /**
     * @param $shipping_method string(100)    Option    到仓方式
     * @return void
     */
    public function setShipping_method(string $shipping_method)
    {
        $this->params['shipping_method'] = $shipping_method;
    }

    /**
     * @param $entiry_code string(255)    Option    entiry号
     * @return void
     */
    public function setEntiry_code(string $entiry_code)
    {
        $this->params['entiry_code'] = $entiry_code;
    }

    /**
     * @param $tracking_number string(200)    Option    跟踪号(可传多个以英文逗号隔开，需开启 BATCH_TRACKING_NUMBER 这个配置)
     * @return void
     */
    public function setTracking_number(string $tracking_number)
    {
        $this->params['tracking_number'] = $tracking_number;
    }

    /**
     * @param $receiving_desc string(255)    Option    入库单描述
     * @return void
     */
    public function setReceiving_desc(string $receiving_desc)
    {
        $this->params['receiving_desc'] = $receiving_desc;
    }

    /**
     * @param $eta_date date    Option    预计到达日期
     * @return void
     */
    public function setEta_date(date $eta_date)
    {
        $this->params['eta_date'] = $eta_date;
    }

    /**
     * @param $contacter string(32)    Option    联系人，交货方式为揽收时，必填
     * @return void
     */
    public function setContacter(string $contacter)
    {
        $this->params['contacter'] = $contacter;
    }

    /**
     * @param $contact_phone string(32)    Option    联系电话，交货方式为揽收时，必填
     * @return void
     */
    public function setContact_phone(string $contact_phone)
    {
        $this->params['contact_phone'] = $contact_phone;
    }

    /**
     * @param $region_id_level0 Int(10)    Option    揽收支持的省ID，交货方式为揽收时，必填，参考getRegionForReceiving
     * @return void
     */
    public function setRegion_id_level0(int $region_id_level0)
    {
        $this->params['region_id_level0'] = $region_id_level0;
    }

    /**
     * @param $region_id_level1 Int(10)    Option    揽收支持的市ID，交货方式为揽收时，必填，参考getRegionForReceiving
     * @return void
     */
    public function setRegion_id_level1(int $region_id_level1)
    {
        $this->params['region_id_level1'] = $region_id_level1;
    }

    /**
     * @param $region_id_level2 Int(10)    Option    揽收支持的区ID，交货方式为揽收时，必填，参考getRegionForReceiving
     * @return void
     */
    public function setRegion_id_level2(int $region_id_level2)
    {
        $this->params['region_id_level2'] = $region_id_level2;
    }

    /**
     * @param $street string(300)    Option    揽收地址，交货方式为揽收时，必填
     * @return void
     */
    public function setStreet(string $street)
    {
        $this->params['street'] = $street;
    }

    /**
     * @param $verify Int(1)    Option    是否审核,0新建不审核(草稿状态)，1新建并审核， 默认为0， 审核通过之后，不可编辑
     * @return void
     */
    public function setVerify(int $verify)
    {
        $this->params['verify'] = $verify;
    }

    /**
     * @param $verify_source string(30)    Option    审核来源（区分系统） 默认为WMS，
     * @return void
     */
    public function setVerify_source(string $verify_source)
    {
        $this->params['verify_source'] = $verify_source;
    }

    /**
     * @param $contract_no string(64)    Option    入库单合同号(选填)
     * @return void
     */
    public function setContract_no(string $contract_no)
    {
        $this->params['contract_no'] = $contract_no;
    }

    /**
     * @param $receiving_attachment string(255)    Option    入库单附件oss地址(单文件)
     * @return void
     */
    public function setReceiving_attachment(string $receiving_attachment)
    {
        $this->params['receiving_attachment'] = $receiving_attachment;
    }

    /**
     * @param $vat_tax_code string(64)    Option    VAT税号
     * @return void
     */
    public function setVat_tax_code(string $vat_tax_code)
    {
        $this->params['vat_tax_code'] = $vat_tax_code;
    }

    /**
     * @param $incoming_order_goods_type int(1)    Option    入库单货物类型：1:整柜;2:散柜,3:退货,默认为0(定制接口参数：如无忧达客户在使用)
     * @return void
     */
    public function setIncoming_order_goods_type(int $incoming_order_goods_type)
    {
        $this->params['incoming_order_goods_type'] = $incoming_order_goods_type;
    }

    /**
     * @param $spontaneous_head_cheng_type int(1)    Option    自发头程类型：1:无忧达自发;2:客户自发,默认为0(自发头程时必填12中一项)(定制接口参数：如无忧达客户在使用)
     * @return void
     */
    public function setSpontaneous_head_cheng_type(int $spontaneous_head_cheng_type)
    {
        $this->params['spontaneous_head_cheng_type'] = $spontaneous_head_cheng_type;
    }

    /**
     * @param $tax_type string(32)    Option    关税类型：P：实报实销；默认为空
     * @return void
     */
    public function setTax_type(string $tax_type)
    {
        $this->params['tax_type'] = $tax_type;
    }

    /**
     * @param $customer_type string(32)    Option    报关类型：Y：单独退税报关；N：无退税报关；;默认为空
     * @return void
     */
    public function setCustomer_type(string $customer_type)
    {
        $this->params['customer_type'] = $customer_type;
    }

    /**
     * @param $container_type Int(1)    Option    货柜类型：1:20GP;2:40GP；3:40HQ；4:45GP；5:45HQ；6:53HQ；7:20HQ；默认为0(定制接口参数)
     * @return void
     */
    public function setContainer_type(int $container_type)
    {
        $this->params['container_type'] = $container_type;
    }

    /**
     * @param $bulk_cargo_type Int(1)    Option    散货类型（托）：0:否;1:是；默认为0(定制接口参数，若开启相关配置与container_type参数二选一)
     * @return void
     */
    public function setBulk_cargo_type(int $bulk_cargo_type)
    {
        $this->params['bulk_cargo_type'] = $bulk_cargo_type;
    }

    /**
     * @param $pallet_cnt Int(11)    Option    托数量
     * @return void
     */
    public function setPallet_cnt(int $pallet_cnt)
    {
        $this->params['pallet_cnt'] = $pallet_cnt;
    }

    /**
     * @param $is_save_inventory_code Int(1)    Option    是否生成批次库存；0否，1是；默认0
     * @return void
     */
    public function setIs_save_inventory_code(int $is_save_inventory_code)
    {
        $this->params['is_save_inventory_code'] = $is_save_inventory_code;
    }

    /**
     * @param $bulk_cargo_type_piece Int(1)    Option    散货类型（件）：0:否;1:是；默认为0(定制接口参数，若开启相关配置：PS_IS_OPEN_CONTAINER与container_type和bulk_cargo_type参数三选一)
     * @return void
     */
    public function setBulk_cargo_type_piece(int $bulk_cargo_type_piece)
    {
        $this->params['bulk_cargo_type_piece'] = $bulk_cargo_type_piece;
    }

    /**
     * @param $stock_type Int(1)    Option    入库单库存类型：默认0=以仓库为准,1=标准区,2=暂存区,5=以箱为准(注意前三种库存类型是按单维度，所有箱都是同种库存类型；以箱为准库存类型,是与item.inventory_type参数组合使用)
     * @return void
     */
    public function setStock_type(int $stock_type)
    {
        $this->params['stock_type'] = $stock_type;
    }

    /**
     * @param $items array    Require
     * $items = [{
     *      "product_sku":"EA140509201610", // string(80)    Require    SKU
     *      "quantity":10, // int(11)    Require    数量
     *      "box_no":1, // int(64)    Require    箱号
     *      "product_price":1.00, // decimal(10,3)    Option    产品单价（此为转换为客户币种后的产品单价）
     *      "currency_code":"RMB", // string(32)    Option    产品币种（ 此币种将转换为客户币种）
     *      "associated_barcode":"sdgv554561", // string(100)    Option    关联条码,非必传,一个入库单相同SKU只能传同一个关联条码,不同的SKU必须传不同的关联条码
     *      "product_date":"2024-03-19", // date    Option    产品生产日期
     *      "inventory_type":"1" // int(1)    Option    箱维度库存类型：0 = 按仓库确认，1 = 标准，2 = 暂存(传值stock_type=5时，注意相同箱号必须保持库存类型一致，箱维度未传默认=仓库确认；stock_type其他值时，箱维度保持stock_type值一致)
     * }]
     * @return void
     */
    public function setItems(array $items)
    {
        $this->params['items'] = $items;
    }

    /**
     * @param $pdf_type String    Require    list清单, box箱唛, box-qr热敏纸(100x100)(二维码)箱唛
     * @return void
     */
    public function setPdfType(string $pdf_type)
    {
        $this->params["pdf_type"] = $pdf_type;
    }

    /**
     * @param $pdf_size String    NO pdf_type等于list可选值:
     *                              A4、
     *                              216*279、
     *                              A4-SKU;
     *
     *                              pdf_type等于box可选值:
     *                              100*100-WPT(代表100*100(无产品名称))、
     *                              100*150-WPT(代表100*150(无产品名称))、
     *                              100*100-PT(代表100*100(有产品名称))、
     *                              100*150-PT(代表100*150(有产品名称))、
     *                              100*100-QC(代表100*100(二维码))、
     *                              70*30-B(代表70*30(显示条码))、
     *                              70*30-WB(代表70*30(无条码))、
     *                              A4-SKU(代表A4(按SKU))、
     *                              A4-BOX(代表A4(按箱))
     *                              只针对箱唛;
     *
     *                              当pdf_type类型为box-qr的时候这里应填写且只能填写一个箱号(例如：1)，不填的话默认为取箱号1
     * @return void
     */
    public function setPdfSize(string $pdf_size)
    {
        $this->params["pdf_size"] = $pdf_size;
    }

    /**
     * @param $sku_barcode Int    NO    箱唛要显示SKU条形码时传1,
     *                                  pdf_size传以下值时该参数有效:
     *                                  100*100-WPT
     *                                  100*150-WPT
     *                                  100*100-PT
     *                                  100*150-PT
     *                                  A4-SKU
     * @return void
     */
    public function setSkuBarcode(int $sku_barcode)
    {
        $this->params['sku_barcode'] = $sku_barcode;
    }

    /**
     * @param $warehouse_show Int    NO    箱唛显示报关类型和目的仓名称时传1,
     *                                      pdf_size传以下值时该参数有效:
     *                                      100*100-WPT
     *                                      100*150-WPT
     *                                      100*100-PT
     *                                      100*150-PT
     * @return void
     */
    public function setWarehouseShow(int $warehouse_show)
    {
        $this->params['warehouse_show'] = $warehouse_show;
    }

    /**
     * @param $content_type String    NO    PDF返回类型，可选值 url、base64，默认为 base64。
     * @return void
     */
    public function setContentType(string $content_type)
    {
        $this->params['content_type'] = $content_type;
    }

    /**
     * @param $made_in_china Int    NO    是否显示 made in china；0：不显示，1：显示
     *      pdf_size传以下值时该参数有效:
     *          100*100-WPT(代表100*100(无产品名称))、
     *          100*150-WPT(代表100*150(无产品名称))、
     *          100*100-PT(代表100*100(有产品名称))、
     *          100*150-PT(代表100*150(有产品名称))、
     *          100*100-QC(代表100*100(二维码))
     * @return void
     */
    public function setMadeInChina(int $made_in_china)
    {
        $this->params['made_in_china'] = $made_in_china;
    }

    /**
     * @param $file_type    string    Require    附件类型，只支持：zip
     * @return void
     */
    public function setFileType(string $file_type)
    {
        $this->params["file_type"] = $file_type;
    }

    /**
     * @param $file_data    string    Require    附件base64数据
     * @return void
     */
    public function setFileData(string $file_data)
    {
        $this->params["file_data"] = $file_data;
    }

    /**
     * 获取入库单
     * @return void
     */
    public function getAsnList()
    {
        $this->setService("getAsnList");
        return $this->PostSoapXML();
    }

    /**
     * 创建入库单
     * @return void
     */
    public function createAsn()
    {
        $this->setService("createAsn");
        return $this->PostSoapXML();
    }

    /**
     * 修改入库单
     * @return void
     */
    public function modifyAsn()
    {
        $this->setService("modifyAsn");
        return $this->PostSoapXML();
    }

    /**
     * 取消入库单
     * @return void
     */
    public function cancelAsn()
    {
        $this->setService("cancelAsn");
        return $this->PostSoapXML();
    }

    /**
     * 获取入库单PDF文件
     * @return void
     */
    public function getReceivingBoxPdfByCode()
    {
        $this->setService("getReceivingBoxPdfByCode");
        return $this->PostSoapXML();
    }

    /**
     * 更新入库单跟踪号
     * @return void
     */
    public function updateAsnTracking()
    {
        $this->setService("updateAsnTracking");
        return $this->PostSoapXML();
    }

    /**
     * 上传附件
     * @return void
     */
    public function uploadAsnAttach()
    {
        $this->setService("uploadAsnAttach");
        return $this->PostSoapXML();
    }
}