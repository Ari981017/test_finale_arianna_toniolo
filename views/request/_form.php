<?php

use yii\helpers\Html;
use app\models\Linktype;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\RequestType $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropdownList(ArrayHelper::map(Linktype::find()
                ->all(), 'id', 'type'), [
                'prompt' => [
                    'text' => 'Select the type of request',
                    'options' => ['disabled' => true, 'selected' => true]
                ]
            ]); ?>

    <div class="form-group  my-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
