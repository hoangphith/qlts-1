<?php

namespace app\modules\dungchung\models;

use Yii;
use app\widgets\views\HistoryWidget;

class History extends HistoryBase
{
    public static function showHistory($modelID,$thamChieuID){
        $his = History::find()->where([
            'loai'=>$modelID,
            'id_tham_chieu'=>$thamChieuID
        ])->all();
        echo HistoryWidget::widget([
            'data'=>$his
        ]);
    }
    
}
