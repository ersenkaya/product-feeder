<?php

namespace ProductFeeder;

use ProductFeeder\Factory\OutputFactory;
use ProductFeeder\Factory\PlatformFactory;

class ProductFeeder
{
    /** @var PlatformFactory */
    private $platformFactory;

    /** @var OutputFactory */
    private $outputFactory;

    public function __construct()
    {
        $this->platformFactory = new PlatformFactory();
        $this->outputFactory = new OutputFactory();
    }

    public function response(array $items, $platformTitle = null, $output = 'json')
    {
        if(!$platformTitle) {
            throw new \Exception("Platform is not specify, you can use google, facebook or cimri");
        }

        $platformTitle = ucfirst(strtolower($platformTitle));

        if(!class_exists("ProductFeeder\\Adapter\\PlatformAdapter\\$platformTitle")) {
            throw new \Exception("Platform class not found");
        }

        $platform = $this->platformFactory->provide($platformTitle);
        $platform->normalize($items);
        $normalized = $platform->getItems();

        $type = $this->outputFactory->output($output);

        return $type->render($normalized);
    }
}