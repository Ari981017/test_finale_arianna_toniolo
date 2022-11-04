<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ContactRequest $model */

$this->title = 'Update Contact Request: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contact Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
