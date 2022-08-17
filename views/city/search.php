<?php

use yii\widgets\ActiveForm;

/**
 * @var \yii\web\View $this
 * @var \app\models\City $model
 */

$this->params['breadcrumbs']= [];
$this->title = 'Weather Search By City';
$this->params['breadcrumbs'][] = $this->title;


$form = ActiveForm::begin([
    'id' => 'transfer-form',
    'action' => ['city/index'],
]);

?>

    <h1 style="text-align: center">Welcome to Weather API</h1>
    </br>
<?php
echo $form->field($model, 'country_name')->textInput()->hint('Example: Jordan');

ActiveForm::end();