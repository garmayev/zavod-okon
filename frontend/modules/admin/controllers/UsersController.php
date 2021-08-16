<?php


namespace frontend\modules\admin\controllers;


use dektrium\rbac\models\Assignment;
use dektrium\user\models\User;
use frontend\models\Profile;
use Yii;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\httpclient\Client;
use yii\web\Response;

class UsersController extends DefaultController
{
    public function actionIndex(): string
    {
        return $this->render("index", [
            "dataProvider" => new ActiveDataProvider([
                "query" => User::find(),
            ])
        ]);
    }

    public function actionShow($id): string
    {
        $user = User::findOne($id);
        return $this->render("user", [
            "model" => $user
        ]);
    }

    public function actionInfo($id): \yii\web\Response
    {
        $user = User::findOne($id);
        if ( \Yii::$app->request->isPost ) {
            if ( $user->load(\Yii::$app->request->post()) && $user->save() ) {
                return $this->redirect(["/admin/users/index"]);
            }
        }
    }

    public function actionProfile($id)
    {
        $profile = Profile::findOne($id);
        if ( \Yii::$app->request->isPost ) {
            if ( $profile->load(\Yii::$app->request->post()) && $profile->save() ) {
                return $this->redirect(["users/index"]);
            }
        }
    }

    public function actionState($name, $user_id) {
        if ( \Yii::$app->request->isAjax ) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $manager = Yii::$app->authManager;
            $roles = $manager->getRolesByUser($user_id);
//            return $role["items"][0];
            foreach ( $roles as $role ) {
                Yii::$app->authManager->revoke($role, $user_id);
            }
            return Yii::$app->authManager->assign(Yii::$app->authManager->getRole($name), $user_id);
        }
    }
}