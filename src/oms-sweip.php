<?php

namespace OmsSweip;

/**
 * https://oms.sweip.com/default/svc/wsdl 接口文档地址
 */
class BasicAPI
{
    protected $appToken = ""; // String Yes	API密钥
    protected $appKey = ""; // String Yes	API标识
    protected $service = ""; // String Yes	接口方法，参考接口方法列表
    protected $language = "zh_CN"; // enum No	zh_CN、en_US (信息语言)
    protected $paramsJson = null; // String No	请求的数据内容，json格式

    protected $params = [];
    protected $pageSize = 20; // 每页数据长度，不传值表示查询所有
    protected $page = 1; // 当前页，不传值表示查询所有

    public function __construct($appToken, $appKey)
    {
        $this->appToken = $appToken;
        $this->appKey = $appKey;
    }

    /**
     * @param $key string 字段
     * @param $value object 值
     * @return void
     */
    public function set(string $key, $value)
    {
        $this->params[$key] = $value;
    }

    public function getAppToken()
    {
        return $this->appToken;
    }

    public function getAppKey()
    {
        return $this->appKey;
    }

    public function setService($service)
    {
        $this->service = $service;
    }

    public function getService()
    {
        return $this->service;
    }

    public function getLanguage(): string
    {
        return $this->language ?: "zh_CN";
    }

    public function setParamsJson($paramsJson)
    {
        $this->paramsJson = $paramsJson;
    }

    public function setPageSize($value)
    {
        $this->pageSize = $value;
        $this->params["pageSize"] = $value;
    }

    public function setPage($value)
    {
        $this->page = $value;
        $this->params["page"] = $value;
    }

    /**
     * 发起API请求
     * @return array|mixed
     */
    public function PostSoapXML()
    {
        $params = "{}";
        if ($this->params) {
            $params = json_encode($this->params);
        } else if (is_string($this->paramsJson)) {
            $params = $this->paramsJson;
        } else if (is_array($this->paramsJson)) {
            $params = json_encode($this->paramsJson);
        }

        // 定义 SOAP 请求的 XML
        $body = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://www.example.org/Ec/">
    <SOAP-ENV:Body>
        <ns1:callService>
            <paramsJson>{$params}</paramsJson>
            <appToken>{$this->getAppToken()}</appToken>
            <appKey>{$this->getAppKey()}</appKey>
            <service>{$this->getService()}</service>
            <language>{$this->getLanguage()}</language>
        </ns1:callService>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
XML;

        // SOAP 服务的 URL
        $wsdl = "http://oms.sweip.com/default/svc/wsdl";
        $wsdl = "http://oms.sweip.com/default/svc/web-service";
        $headers = [];

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $wsdl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
            ));

            $response = curl_exec($curl);

            $reference_no = $this->params['reference_no'] ?? "oms-sweip-logs";
            file_put_contents("{$reference_no}.log", date("Y-m-d H:i:s") + "\n" + $wsdl + "\n" + $body + "\n" + $response + "\n", FILE_APPEND);

            $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
            $jsonString = (string)$xml->xpath('//response')[0];

            curl_close($curl);

            // 将 JSON 字符串转换为 PHP 数组
            return json_decode($jsonString, true);
        } catch (\Exception $exception) {
            return ["Error" => $exception->getMessage()];
        }
    }
}