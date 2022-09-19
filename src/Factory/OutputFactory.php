<?php

namespace ProductFeeder\Factory;

use ProductFeeder\Adapter\OutputAdapter\Json;
use ProductFeeder\Adapter\OutputAdapter\IOutput;
use ProductFeeder\Adapter\OutputAdapter\Xml;

class OutputFactory
{
    public function output($output):?IOutput
    {
        $response = null;

        if($output == 'xml') {
            $response = new Xml();
        }

        if($output == 'json') {
            $response = new Json();
        }

        return $response;
    }
}