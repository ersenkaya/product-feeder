<?php

namespace ProductFeeder\Helper;

class DataHelper
{

    public function fileWalker($path)
    {
        $data = "";

        if (!file_exists($path)) {
            die('File not found! Please check.');
        }

        $file = fopen($path, 'r') or die('Unable to open file!');

        while (!feof($file)) {
            $data .= fgets($file);
        }

        fclose($file);

        return json_decode($data);

    }

    public function createFile($data, $ext, $provider)
    {
        $path = "Feeds/$provider/";

        if (!is_dir($path)) mkdir($path, 0777, true);

        $fileName = "$provider-feed.$ext";

        $file = fopen("$path$fileName", 'w');
        fwrite($file, $data);
        fclose($file);

        echo "File is created! Please check $path$fileName";

    }
}