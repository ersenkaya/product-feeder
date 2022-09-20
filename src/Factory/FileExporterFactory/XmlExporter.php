<?php

namespace ProductFeeder\Factory\FileExporterFactory;

class XmlExporter implements IFileExporter
{
    function export(string $provider, string $content): string
    {
        $path = "Feeds/$provider/";

        if (!is_dir($path)) mkdir($path, 0777, true);

        $fileName = "$provider-feed.xml";

        $file = fopen("$path$fileName", 'w');
        fwrite($file, $content);
        fclose($file);

        return "File is created! Please check $path$fileName";
    }
}