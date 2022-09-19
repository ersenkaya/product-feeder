<?php

namespace ProductFeeder\Adapter\OutputAdapter;

interface IOutput
{
    public function render(array $data);
}