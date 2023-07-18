<?php

use app\modules\bophan\models\NhanVien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\bophan\models\NhanVien3Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nhan Viens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-vien-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nhan Vien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ma_nhan_vien',
            'ten_nhan_vien',
            'ngay_sinh',
            'gioi_tinh',
            //'ten_truy_cap',
            //'da_thoi_viec',
            //'dien_thoai',
            //'email:email',
            //'dia_chi:ntext',
            //'thoi_gian_tao',
            //'nguoi_tao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NhanVien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
