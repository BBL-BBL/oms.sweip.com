<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/BasicData.php';


use OmsSweip\BasicData;
use OmsSweip\ProductModule;
use OmsSweip\PublicModules;

//use OmsSweip\ApiClient;
//$client = new ApiClient();
//
//$url = 'https://oms.sweip.com/api-doc/index.php';
//$html = $client->fetchPageContent($url);
//
//$title = $client->parseTitle($html);
//echo "页面标题: " . $title . PHP_EOL;
//
//$links = $client->parseLinks($html);
//echo "页面链接: " . PHP_EOL;
//foreach ($links as $link) {
//    echo $link . PHP_EOL;
//}
//

$appToken = "";
$appKey = "";
$client = new BasicData($appToken, $appKey);
var_dump($client->getWarehouse());
//$client->uploadFile("zip","11323123","order_attach","备注","");

//$client = new ProductModule($appToken, $appKey);
//$pageSize = 1;//  Int
//$page = 1; //  Int
//$product_sku = ""; //  string
//$product_sku_arr = []; //  array
//$warehouse_code = "";//  string
//$warehouse_code_arr = []; //  array
//$update_start_time = ""; //  String
//$is_warning = 0; //  int
//$product_title = ""; //  String
//$search_type = 0; //  int
//$client->getProductInventory();