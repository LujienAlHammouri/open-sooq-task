<?php

namespace app\models;

use yii\base\Model;

class City extends Model
{
    public $title = 'City Weather Status';

    public $country_name;
    public $wind;
    public $weather;
    public $pressure;
    public $temp;

}