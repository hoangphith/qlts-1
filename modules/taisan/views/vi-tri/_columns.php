<?php
use yii\helpers\Url;
return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ma_vi_tri',
        'width' => '50px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_vi_tri',
        'width' => '300px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'mo_ta',
        'width' => '300px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'truc_thuoc',
        'value'=>'viTriCha.ten_vi_tri',
        'width' => '180px',
    ],
    [
        
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'da_ngung_hoat_dong',
        'value'=>function($data){
            if($data["da_ngung_hoat_dong"]=="0") return "Ngưng";
            else return "Hoạt động";
        },
        'width' => '50px',
        //'value'=>'data_ngung_hoat_dong',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ngay_ngung_hoat_dong',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_layout',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'toa_do_x',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'toa_do_y',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'thoi_gian_tao',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'nguoi_tao',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Lihat','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Hapus', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Anda Yakin?',
                          'data-confirm-message'=>'Apakah Anda yakin akan menghapus data ini?'], 
    ],

];   