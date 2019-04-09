<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\entities\Task */

$this->title = "Обновление задачи: #{$model->id}";
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index', 'project_id' => Yii::$app->request->get('project_id')]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
