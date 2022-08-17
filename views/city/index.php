<?php

use yii\widgets\DetailView;

/**
 * @var \yii\web\View $this
 * @var array $city
 */

$this->title = 'Weather Details';
$this->params['breadcrumbs'][] = ['label' => 'Search By City', 'url' => ['search']];
$this->params['breadcrumbs'][] = $this->title . ' For ' . $city->country_name;

?>

    <h1 style="text-align: center"><?=$city->country_name?> </h1>

<?php

$to_celsius = ($city->temp - 32) * 0.5556;

echo DetailView::widget([
    'model' => $city,
    'attributes' => [
        'title',
        [
            'label' => 'Temperature',
            'value' => floor($city->temp).' in Fahrenheit | '. floor($to_celsius).' in Celsius ',
        ],
        [
            'label' => 'Wind',
            'value' => 'Wind speed is ' . $city->wind['speed'] .' with '. $city->wind['deg'].'°',
        ],
        [
            'label' => 'Weather Status',
            'value' => $city->weather[0]['main'] . ' | '. ucwords($city->weather[0]['description']),
        ],
        [
            'label' => 'Pressure',
            'value' => floor($city->pressure).' mbar',
        ],
    ],
]);