<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;
use app\models\ContactRequest;
use app\models\RequestType;

/** @var yii\web\View $this */
/** @var app\models\ContactRequest $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contact Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


?>
<div class="contact-request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th scope="row">Name Surname</th>
                <td><?= $model->name ?></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><?= $model->email ?></td>
            </tr>
            <tr>
                <th scope="row">Request Body</th>
                <td><?= $model->request_body ?></td>
            </tr>
            <tr>
                <th scope="row">Request Detail</th>
                <td><?php
                    $type = RequestType::find()
                        ->select('description')
                        ->where(['id' => $model->request_type_id])
                        ->one();

                    foreach ($type as $key => $value) {
                        echo $value;
                    }; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">Request Date</th>
                <td><?= $model->request_date ?></td>
            </tr>
        </tbody>
    </table>
</div>