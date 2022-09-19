<?php

namespace ProductFeeder\Adapter\PlatformAdapter;

use ProductFeeder\Entity\Product;

class Facebook implements IPlatform
{

    /** @var array */
    private $items = array();

    public function normalize(array $items)
    {
        /** @var Product $item */
        foreach ($items as $item) {
            $this->items[] = array(
                'id' => $item->getId(),
                'title' => $item->getName(),
                'price' => $item->getPrice(),
                'product_type' => $item->getCategory()
            );
       }
    }

    public function getItems(): array
    {
        return $this->items;
    }

}