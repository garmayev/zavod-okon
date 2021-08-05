<?php

namespace frontend\modules\shop\controllers;

use frontend\modules\shop\models\Client;
use frontend\modules\shop\models\Product;
use pantera\yii2\pay\sberbank\models\Invoice;
use Yii;
use frontend\modules\shop\models\Order;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $client = Client::find()->where(["user_id" => Yii::$app->user->id])->one();
        if ( is_null($client) ) {
            $client = new Client();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->where(["client_id" => $client->id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'client' => Client::findOne(["user_id" => Yii::$app->user->id]),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function actionPreview()
    {
        $model = new Order();

        if ( !Yii::$app->user->isGuest ) {
            if ( $client = Client::find()->where(["user_id" => Yii::$app->user->id])->one() ) {
                return $this->render('view', [
                    'client' => $client,
                    'model' => $model,
                ]);
            } else {
                $client = new Client();
                if ( Yii::$app->request->isPost ) {
                    if ( $client->load(Yii::$app->request->post()) && $client->save()) {
                        return $this->render("view", [
                            "model" => $model,
                            'client' => $client,
                        ]);
                    }
                }
                return $this->render("create", [
                    'model' => $model,
                    'client' => $client
                ]);
            }
        }
        Yii::$app->session->set("referrer", Yii::$app->request->getUrl());
        Yii::$app->session->setFlash("error", "You can`t access while you guest");
        $this->redirect(["/user/login"]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCreate()
    {
        $model = new Order();
        $client = Client::find()->where(["user_id" => Yii::$app->user->id])->one();
        if ( Yii::$app->request->isPost ) {
        	$model->price = Yii::$app->cart->getTotalCost();
            if  ( $model->load(Yii::$app->request->post()) && $model->save() ) {
                $invoice = Invoice::addSberbank($model->id, $model->price);
                $telegramText = "Заказ #{$model->id}\n";
                foreach ( $model->orderProducts as $op ) {
                    $product = Product::findOne($op->product_id);
                    $telegramText .= "Продукт: {$product->title}; Количество: $op->count; Цена: $product->price\n";
                }
                $telegramText .= "Total: {$model->price}\n";
	            Yii::$app->cart->clear();
                Yii::$app->telegram->sendMessage(["chat_id" => "443353023", "text" => $telegramText]);
//                return $this->redirect(['/sberbank/default/create', 'id' => $invoice->id]);
            }
        }
        return $this->render("create", [
            "model" => $model,
            'client' => $client,
        ]);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDuplicate($id): bool
    {
        $model = Order::findOne($id);
        $model->id = null;
        $model->isNewRecord = true;
        return $model->save();
    }
}
