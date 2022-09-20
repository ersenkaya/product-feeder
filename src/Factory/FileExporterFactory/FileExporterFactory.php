<?php

namespace ProductFeeder\Factory\FileExporterFactory;

use ProductFeeder\Type\FileType;

class FileExporterFactory
{
    /**
     * @throws \Exception
     */
    public static function instance($fileType): IFileExporter {
       switch ($fileType) {
           case FileType::JSON: return new JsonExporter();
           case FileType::XML: return new XmlExporter();
           default: throw new \Exception('Unsupported File Type!');
       }
    }
}