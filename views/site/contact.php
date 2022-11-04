<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use app\models\Linktype;
use yii\bootstrap5\ActiveForm;


$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>



    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'requestType', ['inputOptions' => ['id' => 'contactform-requesttype']])->dropdownList(ArrayHelper::map(Linktype::find()
                ->all(), 'id', 'type'), [
                'prompt' => [
                    'text' => 'Select the type of request',
                    'options' => ['disabled' => true, 'selected' => true]
                ]
            ]); ?>

            <?= $form->field($model, 'requestDetail', ['inputOptions' => ['id' => 'contactform-requtdetail']])->dropDownList(array()); ?>

            <?= $form->field($model, 'date')->input('date'); ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<?php

$script = <<< JS

$(document).ready(function() {
        $("#contactform-requesttype").on('change.yii', function(v) {
            // all'interno di "v" c'è il valore scelto ("Technical support" o "Commercial support" - proprietà v.target.value
            // eseguire quindi una chiamata Ajax usando jQuery
            $.ajax({
                url: 'http://localhost:8080/index.php/site/get-requests-by-type',
                type: 'GET',
                data: {
                    list: v.target.value
                },
                success: function(data) {
                    console.log(data);
                    $("#contactform-requtdetail").empty();
                    $.each(data, function(key, value) {
                        $("#contactform-requtdetail").append($("<option></option>").attr("value", value).text(key));
                    });
                },
                error: function(jqXHR, errMsg) {
                    alert(errMsg);
                }
            });
            console.log(v.target.value);
        });
    });


JS;

$this->registerJs($script);

?>