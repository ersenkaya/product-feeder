<?php

namespace ProductFeeder\Adapter\OutputAdapter;

use SimpleXMLElement;

class Xml implements IOutput
{

    public function render(array $data)
    {
        $xml = new SimpleXMLElement("<products/>");
        $this->handle($xml, $data);
        return $xml;

    }

    private function handle(SimpleXMLElement $xml, array $products)
    {
        foreach ($products as $key => $value) {
            if(is_array($value)) {
                $child = $xml->addChild('product');
                $this->handle($child, $value);
            } else {
                if(is_int($key)) {
                    $key = "key_$key";
                }

                $xml->addChild($key, $value);
            }
        }
    }

}