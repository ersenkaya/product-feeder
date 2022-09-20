<?php

namespace ProductFeeder\Helper;

use ProductFeeder\Entity\Product;
use ProductFeeder\ProductFeeder;

class DataHelper
{

    public function readFile($path)
    {
        $data = "";

        if (!file_exists($path)) {
            die("File not found! Please check. $path");
        }

        $file = fopen($path, 'r') or die('Unable to open file!');

        while (!feof($file)) {
            $data .= fgets($file);
        }

        fclose($file);

        return json_decode($data);

    }

    /**
     * @throws \Exception
     */
    public function exportFile($path, $platform, $output): string
    {
        $data = self::readFile($path);

        $items = array();

        foreach ($data as $item) {
            $items[] = new Product($item->id, $item->name, $item->price, $item->category);
        }

        $feeder = new ProductFeeder();

        $response = $feeder->response($items, $platform, $output);

        return $feeder->exportFile($response, $platform, $output);

    }

    public function getItems($path): array
    {
        $data = self::readFile($path);

        $items = array();

        foreach ($data as $item) {
            $items[] = new Product($item->id, $item->name, $item->price, $item->category);
        }

        return $items;

    }

}