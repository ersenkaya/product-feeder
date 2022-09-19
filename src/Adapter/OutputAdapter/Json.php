<?php

namespace ProductFeeder\Adapter\OutputAdapter;

class Json implements IOutput
{

    public function render(array $data)
    {
        return json_encode($data);
    }

}