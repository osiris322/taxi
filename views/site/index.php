<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'date_finish',
            'priority',
            [
                'attribute' => 'priority',
                'value' => function ($model) {
                    return $model->getNamePriority($model->priority);
                },
            ],
            'status:boolean',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' =>
                [
                    'update' => function ($model) {
                        return ($model->status) ? false : true;
                    },
                    'delete' => function ($model) {
                        return ($model->status) ? false : true;
                    },
                ]
                
            ],
        ],
    ]); ?>


</div>
