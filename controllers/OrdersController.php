<?php


namespace app\controllers;



use app\models\Product;
use yii\web\Controller;
use app\models\Orders;
use Yii;

class OrdersController extends Controller
{
    public function actionIndex()
    {

        $query = Orders::find();
        $orders = $query->all();
        return $this->render('orders', ['orders' => $orders]);
    }
}