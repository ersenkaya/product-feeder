<?php

declare(strict_types=1);

use ProductFeeder\Entity\Product;
use ProductFeeder\Helper\DataHelper;
use ProductFeeder\ProductFeeder;

require_once dirname(__DIR__) . '/vendor/autoload.php';

try {

    $platform = $_GET['platform'];

    $output = $_GET['output'];

    $dataHelper = new DataHelper();

    $items = $dataHelper->getItems("data/products.json");

    $feeder = new ProductFeeder();

    $response = $feeder->response($items, $platform, $output);

    if($output == 'xml') {
        if ($response === false) {
            echo "Failed loading XML: ";
            foreach(libxml_get_errors() as $error) {
                echo "<br>", $error->message;
            }
        } else {
            header('Content-Type: text/xml; charset=UTF-8');

        }
    }

    print_r($response);

} catch (\Exception $exception) {
    print_r($exception->getMessage());
}

