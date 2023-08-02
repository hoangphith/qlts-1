<?php

namespace app\modules\baotri\controllers;

use app\modules\baotri\models\KeHoachBaoTri;
use app\modules\baotri\models\KeHoachBaoTriSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * KeHoachBaoTriController implements the CRUD actions for KeHoachBaoTri model.
 */
class LichBaoTriController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function beforeAction($action)
    {
        Yii::$app->params['moduleID'] = 'Module Quản lý Bảo trì-Bảo dưỡng';
        Yii::$app->params['modelID'] = 'Quản lý Kế hoạch bảo trì';
        return parent::beforeAction($action);
    }
    
    public function actionIndex(){
        return $this->render('index');
    }
    
}