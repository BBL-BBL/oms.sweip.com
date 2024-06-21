<?php

namespace OmsSweip;

// 在 BasicData.php 文件顶部添加
require_once __DIR__ . '/oms-sweip.php';

class PublicModules extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }


    /**
     * @param $file_type string    文件类型（pdf,rar,zip）
     * @return void
     */
    public function setFileType($file_type)
    {
        $this->params["file_type"] = $file_type;
    }

    /**
     * @param $file_data string 文件base64数据
     * @return void
     */
    public function setFileData(string $file_data)
    {
        $this->params["file_data"] = $file_data;
    }

    /**
     * @param $module string    支持order_attach（订单附件）和order_label （订单标签），
     *                           other_documents_carton(其它附件箱唛),
     *                           other_documents_invoice(其它附件发票),
     *                           如果是pdf格式的标签，请传order_label
     * @return void
     */
    public function setModule(string $module)
    {
        $this->params["module"] = $module;
    }

    /**
     * @param $file_note string 文件说明（0-255）
     * @return void
     */
    public function setFileNote(string $file_note)
    {
        $this->params["file_note"] = $file_note;
    }

    /**
     * @param $file_url string 文件url， 使用file_url时，file_data可不填写
     * @return void
     */
    public function setFileUrl(string $file_url)
    {
        $this->params["file_url"] = $file_url;
    }


    /**
     * @file_type string 文件类型（pdf,rar,zip）
     * @file_data string 文件base64数据
     * @module string 支持order_attach（订单附件）和order_label （订单标签），
     *                   other_documents_carton(其它附件箱唛),
     *                   other_documents_invoice(其它附件发票),
     *                   如果是pdf格式的标签，请传order_label
     * @file_note string 文件说明（0-255）
     * @file_url string 文件url， 使用file_url时，file_data可不填写
     * @return array
     */
    public function uploadFile()
    {
        $this->setService("uploadFile");
        return $this->PostSoapXML();
    }
}