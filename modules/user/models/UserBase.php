<?php
namespace app\modules\user\models;

use app\modules\dungchung\models\History;

class UserBase extends \webvimark\modules\UserManagement\models\User{
    const MODEL_ID = 'taikhoan';
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'                 => 'ID',
            'username'           => 'Tên tài khoản',
            'superadmin'         => 'Là super admin',
            'confirmation_token' => 'Confirmation Token',
            'registration_ip'    => 'Registration IP',
            'bind_to_ip'         => 'Liên kết với địa chỉ IP',
            'status'             => 'Trạng thái',
            'gridRoleSearch'     => 'Roles',
            'created_at'         => 'Created',
            'updated_at'         => 'Updated',
            'password'           => 'Mật khẩu',
            'repeat_password'    => 'Nhắc lại mật khẩu',
            'email_confirmed'    => 'E-mail confirmed',
            'email'              => 'Tài khoản Email',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function afterSave( $insert, $changedAttributes ){
        parent::afterSave($insert, $changedAttributes);
        History::addHistory($this::MODEL_ID, $changedAttributes, $this, $insert);
    }
}

?>