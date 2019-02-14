<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Html as HB;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Project[] */

$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss('
    .td-none, .td-none:hover, .td-none:active {
        text-decoration: none;
    }
    .ml-10{
        margin-left: 10px;
    }
');
?>
<div class="plan-index">

    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-lg-6 flex-right vertical-align">
            <p>
                <?= Html::a('Создать проект', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <div class="row">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        /** @var \app\models\Task $model */
                        return $model->name . ' ' . Html::a('+', ['/task/create', 'project_id' => $model->id],
                                [
                                    'class' => 'btn-sm btn-success pull-right td-none ml-10',
                                    'title' => 'Создать задачу',
                                ]
                            )
                            .
                            Html::a('Задачи', ['/task/index', 'project_id' => $model->id],
                                [
                                    'class' => 'btn-sm btn-primary pull-right td-none',
                                    'title' => 'Все задачи',
                                ]
                            );
                    },
                ],
                [
                    'attribute' => 'Количество задач',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return count($model->task);
                    }
                ],
                'created_at:date',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a(
                                HB::icon('glyphicon glyphicon-eye-open'),
                                Url::to([
                                        'view',
                                        'id' => $model->id,
                                    ]
                                ),
                                [
                                    'class' => 'btn btn-default btn-hover-success',
                                ]
                            );
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a(
                                HB::icon('glyphicon glyphicon-pencil'),
                                Url::to([
                                        'update',
                                        'id' => $model->id,
                                    ]
                                ),
                                [
                                    'class' => 'btn btn-default btn-hover-info',
                                ]
                            );
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a(
                                HB::icon('glyphicon glyphicon-trash'),
                                Url::to([
                                        'delete',
                                        'id' => $model->id,
                                    ]
                                ),
                                [
                                    'class' => 'btn btn-default btn-hover-danger',
                                    'onclick' => 'return confirm("Вы уверены, что хотите удалить задачу #' . $model->id . ' ?");',
                                    'pjax' => '0',
                                    'data-method' => 'POST',
                                ]
                            );
                        },
                    ]
                ]
            ],
        ]); ?>
    </div>
</div>