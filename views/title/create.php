<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Title */

$this->title = 'Создать Задачу';
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index', 'project_id' => Yii::$app->request->get('project_id')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
