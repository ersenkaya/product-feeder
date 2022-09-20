<?php

namespace ProductFeeder\Factory;

use ProductFeeder\Adapter\OutputAdapter\Json;
use ProductFeeder\Adapter\OutputAdapter\IOutput;
use ProductFeeder\Adapter\OutputAdapter\Xml;
use ProductFeeder\Type\FileType;

class OutputFactory
{
    /**
     * @throws \Exception
     */
    public static function instance($output): IOutput {
        switch ($output) {
            case FileType::JSON: return new Json();
            case FileType::XML: return new Xml();
            default: throw new \Exception("Unsupported output! $output");
        }
    }
}