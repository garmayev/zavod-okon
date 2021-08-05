<?php
namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Image;
use frontend\models\Request;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\telegram\TelegramUser;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\httpclient\Client;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            "categories" => Category::find()->all(),
            "model" => new Request(),
            "images" => Image::find()->all()
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        return $this->render("contact");
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionShow($category_id)
    {
        $this->redirect(["category/view", "id" => $category_id]);
    }

    protected function searchArea($address) {
        $client = new Client();
        $response = $client->createRequest()
            ->setFormat(Client::FORMAT_JSON)
            ->addHeaders(['content-type' => 'application/json'])
            ->addHeaders(["Authorization" => "Token 2c9418f4fdb909e7469087c681aac4dd7eca158c",])
            ->addHeaders(["X-Secret" => "1a89b2f48d84ca6374b26b36e66f601336891e51"])
            ->setMethod("POST")
            ->setData([$address])
            ->setUrl("https://cleaner.dadata.ru/api/v1/clean/address")
            ->send();
        if ( $response->isOk ) {
            return $response->data[0]["city_district"];
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $response->data;
    }

    public function actionRequest()
    {
        $model = new Request();
        if ( Yii::$app->request->isPost ) {

            if ( $model->load(Yii::$app->request->post()) && $model->save() ) {
//            	var_dump(Yii::$app->request->post()); die;
                return $this->redirect(["site/index"]);
            } else {
                Yii::error("Invalid model save", "application");
            }
        } else {
            throw new \Exception("Invalid method");
        }
    }

    /**
     * @return string
     */
    public function actionProductions(): string
    {
        return $this->render("productions", [
            "dataProvider" => new ActiveDataProvider([
                "query" => Category::find()
            ])
        ]);
    }
}
