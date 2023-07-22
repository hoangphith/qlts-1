<?php

namespace app\modules\kholuutru\models;

use Yii;
use yii\helpers\ArrayHelper;

class KhoLuuTru extends KhoLuuTruBase
{
    public static function getList(){
        $list = KhoLuuTru::find()->all();
        return ArrayHelper::map($list, 'id', 'ten_kho');
    }
}