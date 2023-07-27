<?php

namespace app\modules\dungchung\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\modules\user\models\User;

class DungChung
{
    public static function xoaThamChieu($loai, $idthamchieu){
        HinhAnh::xoaHinhAnhThamChieu($loai, $idthamchieu);
        History::xoaHistoryThamChieu($loai, $idthamchieu);
        TaiLieu::xoaTaiLieuThamChieu($loai, $idthamchieu);
    }
}