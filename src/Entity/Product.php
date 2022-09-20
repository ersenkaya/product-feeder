<?php

namespace ProductFeeder\Entity;

class Product
{

    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var float */
    private $price;
    /** @var string */
    private $category;


    /**
     * @param $id
     * @param $name
     * @param $price
     * @category $category
     */

    public function __construct($id, $name, $price, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

}