<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use ProductFeeder\Entity\Product;
use ProductFeeder\Helper\DataHelper;
use ProductFeeder\ProductFeeder;

try {

    $platform = $_GET['platform'];
    $output = $_GET['output'];
    $type = $_GET['type'];

    $dataHelper = new DataHelper();

    $data = $dataHelper->fileWalker("data/products.json");
    $items = array();

    foreach ($data as $item) {
        $items[] = new Product($item->id, $item->name, $item->price, $item->category);
    }

    $feeder = new ProductFeeder();

    $response = $feeder->response($items, $platform, $output);

    if($output == 'xml') {

        $xml = $response->asXML();

        if(isset($type) && $type == 'file') {
            $dataHelper->createFile($xml, $output, $platform);
        } else {
            if ($xml === false) {
                echo "Failed loading XML: ";
                foreach(libxml_get_errors() as $error) {
                    echo "<br>", $error->message;
                }
            } else {
                header('Content-Type: text/xml; charset=UTF-8');
                print_r($xml);
            }
        }

    } else {
        if(isset($type) && $type == 'file') {
            $dataHelper->createFile($response, $output, $platform);
        } else {
            print_r($response);
        }
    }


} catch (\Exception $exception) {
    error_log($exception->getMessage(), LOG_ERR, $exception->getFile());
    print_r($exception->getMessage());
}

