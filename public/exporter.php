<?php

declare(strict_types=1);

use ProductFeeder\Helper\DataHelper;

require_once dirname(__DIR__) . '/vendor/autoload.php';

if($argc != 3) {
    die(
        'You must send 2 arguments!'.PHP_EOL
        .'First one is platform name: google, facebook, cimri'.PHP_EOL
        .'Second one is output type: xml, json'
    );
}

$platform = $argv[1];
$output = $argv[2];

try {
    print("starting...".PHP_EOL);

    $dataHelper = new DataHelper();
    $filePath = "data/products.json";
    print($dataHelper->exportFile($filePath, $platform, $output).PHP_EOL);

    print("finished!".PHP_EOL);
} catch (Exception $e) {
    print_r($e->getMessage());
}
