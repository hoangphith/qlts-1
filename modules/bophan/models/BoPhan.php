<?php

namespace app\modules\bophan\models;

use Yii;
use yii\helpers\ArrayHelper;

class BoPhan extends BoPhanBase
{
    public static function getList(){
        $list = BoPhan::find()->all();
        return ArrayHelper::map($list, 'id', 'ten_bo_phan');
    }
}