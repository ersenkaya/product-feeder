<?php

namespace ProductFeeder\Adapter\PlatformAdapter;

interface IPlatform
{
    public function normalize(array $items): array;

    public function getItems(): array;
}