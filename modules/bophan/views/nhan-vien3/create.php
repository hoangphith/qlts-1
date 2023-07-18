<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\bophan\models\NhanVien $model */

$this->title = 'Create Nhan Vien';
$this->params['breadcrumbs'][] = ['label' => 'Nhan Viens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-vien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
