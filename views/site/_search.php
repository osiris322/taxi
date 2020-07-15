<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">
    <div class="row">
        <div class="col-sm-5">
            <?php 
            $params = ['prompt' => '-Выберите-'];
            $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($model, 'title') ?>

            <?= $form->field($model, 'status')->dropDownList([0 => 'Нет', 1 => 'Да'], $params) ?>

            <?= $form->field($model, 'priority')->dropDownList($model::listPriority(), $params) ?>

            <div class="form-group">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Сбросить', ['/site/index'], ['class' => 'btn btn-default']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
