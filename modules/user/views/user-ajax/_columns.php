<?php
use yii\helpers\Url;
use app\modules\user\models\User;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use app\modules\user\UserModule;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use webvimark\modules\UserManagement\components\GhostHtml;

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
        'class'=>'webvimark\components\StatusColumn',
        'attribute'=>'superadmin',
        'visible'=>Yii::$app->user->isSuperadmin,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'username',
    ],
    [
        'attribute'=>'email',
        'format'=>'raw',
        'visible'=>User::hasPermission('viewUserEmail'),
    ],
    [
        'class'=>'webvimark\components\StatusColumn',
        'attribute'=>'email_confirmed',
        'visible'=>User::hasPermission('viewUserEmail'),
    ],
   [
        'attribute'=>'gridRoleSearch',
        'filter'=>ArrayHelper::map(Role::getAvailableRoles(Yii::$app->user->isSuperAdmin),'name', 'description'),
        'value'=>function(User $model){
                return implode(', ', ArrayHelper::map($model->roles, 'name', 'description'));
            },
        'format'=>'raw',
        'visible'=>User::hasPermission('viewUserRoles'),
    ],
    [
        'attribute'=>'registration_ip',
        'value'=>function(User $model){
                return Html::a($model->registration_ip, "http://ipinfo.io/" . $model->registration_ip, ["target"=>"_blank"]);
            },
        'format'=>'raw',
        'visible'=>User::hasPermission('viewRegistrationIp'),
    ],
    [
        'value'=>function(User $model){
                return GhostHtml::a(
                    UserModule::t('back', 'Roles and permissions'),
                    //['/user/user-permission/set', 'id'=>$model->id],
                    ['/user/user-permission/set', 'id'=>$model->id],
                    ['class'=>'btn btn-sm btn-primary', 'data-pjax'=>1, 'role'=>'modal-remote']);
            },
        'format'=>'raw',
        'visible'=>User::canRoute('/user/user-permission/set'),
        'options'=>[
            'width'=>'10px',
        ],
    ],
    [
        'value'=>function(User $model){
                return GhostHtml::a(
                    UserModule::t('back', 'Change password'),
                    ['change-password', 'id'=>$model->id],
                    ['class'=>'btn btn-sm btn-default', 'data-pjax'=>1, 'role'=>'modal-remote']);
            },
        'format'=>'raw',
        'options'=>[
            'width'=>'10px',
        ],
    ],
    [
        'class'=>'webvimark\components\StatusColumn',
        'attribute'=>'status',
        'optionsArray'=>[
            [User::STATUS_ACTIVE, UserModule::t('back', 'Active'), 'success'],
            [User::STATUS_INACTIVE, UserModule::t('back', 'Inactive'), 'warning'],
            [User::STATUS_BANNED, UserModule::t('back', 'Banned'), 'danger'],
        ],
    ],    
    
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Confirm delete?',
                          'data-confirm-message'=>'Are you sure delete?'], 
    ],

];   