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
        $request = Yii::$app->request;
        $objects = Order::find()->where(['offer'=> $request->get('offer')])->all();

        if ($objects != null){
            return $this->render('order',['objects'=>$objects,'number'=>$request->get('offer')]);
        }else{
            echo "<a href='/'>Страница не найдена! На главную</a>";
        }

    }


    public function actionAdd()
    {
        $request = Yii::$app->request;
        $id_prod = $request->post('prod_id');
        $product = Product::findOne($id_prod);
        if($request->isAjax){
            $order = Order::find()->where(['prod_id'=>$id_prod])->one();
            $order->count += '1';
            $order->save();
        }else {
            $order = new Order();
            $order->prod_name = $product->name;
            $order->prod_price = $product->price;
            $order->prod_id = $id_prod;
            $order->save();

            Yii::$app->session->setFlash('success', 'Товар успешно добавлен к заказу');

            return $this->redirect('/');
        }
    }
    public function actionDelete()
    {
        $request = Yii::$app->request;
        $id_prod = $request->post('prod_id');
        $order = Order::find()->where(['prod_id'=>$id_prod])->one();
        if ($order->count > '1'){
            $order->count -= '1';
            $order->save();
        }else{
            $order->delete();
        }

        Yii::$app->session->setFlash('success', 'Товар успешно удален');
        return $this->redirect('/');
    }











}