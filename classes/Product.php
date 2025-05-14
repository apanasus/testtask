<?php
class Product {
    public $title;
    public $price;
    public $dateTime;

    public function __construct($title, $price, $dateTime) {
        $this->title = $title;
        $this->price = $price;
        $this->dateTime = $dateTime;
    }

    public function toArray() {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'dateTime' => $this->dateTime->format('d.m.Y H:i:s'),
        ];
    }
}
