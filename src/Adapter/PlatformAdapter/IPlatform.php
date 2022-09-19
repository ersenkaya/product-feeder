<?php

namespace ProductFeeder\Adapter\PlatformAdapter;

interface IPlatform
{
    public function normalize(array $items);

    public function getItems(): array;
}