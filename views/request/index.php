<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Linktype;
use yii\grid\ActionColumn;
use app\models\RequestType;

/** @var yii\web\View $this */
/** @var app\models\RequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Request Types';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="request-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  //echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'description',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'name',
                'format' => 'text',
                'label' => 'Type',
                'value' => function ($data) {
                    return $retVal = ($data->type === 1) ? 'Technical support' : 'Commercial support';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RequestType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>