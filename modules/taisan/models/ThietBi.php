<?php

namespace app\modules\taisan\models;

use Yii;

class ThietBi extends ThietBiBase{
    /**
     * hien thi url cua qr code
     * @return string
     */
    public function getQrCode(){
        return Yii::getAlias('@web') . $this::QR_FOLDER . $this->autoid . '.png';
    }
}