<?php

namespace app\modules\dungchung\models;

use Yii;

class HinhAnh extends HinhAnhBase
{
    /**
     * get hinh anh thuoc id tham chieu
     * @param string $loai
     * @param int $idthamchieu
     * @return \yii\db\ActiveRecord[]
     */
    public static function getHinhAnhThamChieu($loai, $idthamchieu){
        return HinhAnh::find()->where([
            'loai' => $loai,
            'id_tham_chieu' => $idthamchieu
        ])->orderBy('ID DESC')->all();
    }
    
    /**
     * get hinh anh url
     * @return string
     */
    public function getHinhAnhUrl(){
        return Yii::getAlias('@web') . $this::FOLDER_IMAGES . $this->ten_file_luu;
    }
}
