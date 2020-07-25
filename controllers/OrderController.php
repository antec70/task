<?php


namespace app\controllers;



use app\models\Product;
use yii\web\Controller;
use app\models\Order;
use Yii;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $model = new Order();
        $query = Order::find();
        $orders = $query->orderBy('name')->all();
        return $this->render('index',['products'=>$products,'model'=>$model]);
    }

    public function actionAdd(){

        $order = new Order();
        $id_prod = Yii::$app->request->post('prod_id');
        $product = Product::findOne($id_prod);
        if ($product->count > '1'){
            $order->prod_name = $product->name;
            $order->prod_price = $product->price;
            $order->prod_id = $id_prod;
            $order->prod_count = '1';
            $order->save();
            Yii::$app->session->setFlash('success','Товар успешно добавлен к заказу');
            return $this->redirect('/');
        }else{
            Yii::$app->session->setFlash('error','Товар отсутствует');
            return $this->redirect('/');
        }








    }
}