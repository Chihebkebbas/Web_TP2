<?php

namespace app\models;

use yii\base\Model;

class Produit
{
    public $produits;
    public function __construct()
    {
        $this->produits = [
            '1' => [
                'id' => 1,
                'produit' => 'Rose',
            ],
            '2' => [
                'id' => 2,
                'produit' => 'Tulipe',
            ],
            '3' => [
                'id' => 3,
                'produit' => 'Jasmine',
            ],
            '4' => [
                'id' => 4,
                'produit' => 'Laurier Rose',
            ],
            '5' => [
                'id' => 5,
                'produit' => 'Orchidée',
            ]
        ];
    }

}