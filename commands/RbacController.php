<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;

        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Administrator';
        Yii::$app->authManager->add($role);
        $authManager->assign($role, 5);

        $role = Yii::$app->authManager->createRole('moderator');
        $role->description = 'Moderator';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('user');
        $role->description = 'User';
        Yii::$app->authManager->add($role);
    }
}