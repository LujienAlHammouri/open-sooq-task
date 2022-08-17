<?php

use yii\web\NotFoundHttpException;
use yii\widgets\DetailView;

/**
 * @var \yii\web\View $this
 * @var array $message
 */

$this->title = 'Weather Details';
$this->params['breadcrumbs'][] = ['label' => 'Search By City', 'url' => ['search']];
$this->params['breadcrumbs'][] = $this->title ;

throw new NotFoundHttpException(ucwords($message));

?>



