<?php
namespace app\modules\user\models;

use app\modules\dungchung\models\History;
use yii\helpers\ArrayHelper;
use PhpParser\Node\Stmt\Expression;
use app\modules\bophan\models\NhanVien;

class User extends UserBase{
    public function getListUnused($tenMacDinh=NULL){
        
        $query = NhanVien::find()->select(['ten_truy_cap'])->where('ten_truy_cap IS NOT NULL');
        if($tenMacDinh != NULL){
            $query = $query->andWhere(['<>','ten_truy_cap',$tenMacDinh]);
        }
        $query = $query->asArray()->all();
        
        $listUsed = ArrayHelper::getColumn($query,'ten_truy_cap');
        $list = User::find()->where(['NOT IN','username',$listUsed])->all();
        return ArrayHelper::map($list, 'username', 'username');
    }
}