<?php

namespace app\modules\dungchung\models;

use Yii;
use app\widgets\views\HistoryWidget;

class History extends HistoryBase
{
    /**
    * get lich su thuoc id tham chieu
    * @param string $loai
    * @param int $idthamchieu
    * @return \yii\db\ActiveRecord[]
    */
    public static function getHistoryThamChieu($loai, $idthamchieu){
        return History::find()->where([
            'loai'=>$loai,
            'id_tham_chieu'=>$idthamchieu
        ])->orderBy('id DESC')->all();
    }
    
    /**
     * Hien thi lich su cho view cua cac module co cau hinh luu lich su
     * @param string $loai
     * @param int $idthamchieu
     */
    public static function showHistory($loai,$idthamchieu){
        $his = History::getHistoryThamChieu($loai, $idthamchieu);
        echo HistoryWidget::widget([
            'data'=>$his
        ]);
    }
    
    /**
     * xoa tat ca lich su thuoc id tham chieu(khi xoa tham chieu)
     * @param string $loai
     * @param int $idthamchieu
     */
    public static function xoaHistoryThamChieu($loai, $idthamchieu){
        $models = History::getHistoryThamChieu($loai, $idthamchieu);
        foreach ($models as $indexMod=>$model){
            $model->delete();
        }
    }
    
}
