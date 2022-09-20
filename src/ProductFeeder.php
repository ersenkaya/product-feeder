<?php

namespace ProductFeeder;

use ProductFeeder\Factory\OutputFactory;
use ProductFeeder\Factory\PlatformFactory;
use ProductFeeder\Factory\FileExporterFactory\FileExporterFactory;
use ProductFeeder\Type\FileType;

class ProductFeeder
{

    private $types = ['xml', 'json'];

    public function __construct()
    {

    }

    /**
     * @throws \Exception
     */
    public function response(array $items, $platformTitle = null, $output = 'json')
    {
        if (!$platformTitle) {
            throw new \Exception("Platform is not specify, you can use google, facebook or cimri");
        }

        $normalized = PlatformFactory::instance($platformTitle)->normalize($items);

        return OutputFactory::instance($output)->render($normalized);

    }

    /**
     * @throws \Exception
     */
    public function exportFile($content, $provider = 'google', $output = 'xml'): string
    {
        if (!in_array($output, $this->types)) {
            throw new \Exception('Type is not specify! Please just use: xml or json');
        }

        $fileType = FileType::JSON;

        if($output === 'xml') {
            $content = $content->asXML();
            $fileType = FileType::XML;
        }

        return FileExporterFactory::instance($fileType)->export($provider, $content);

    }
}
