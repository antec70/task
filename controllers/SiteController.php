<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Product;
use yii\web\Request;
use yii\db\Query;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $model = new Product();
        $query = Product::find();
        $products = $query->orderBy('name')->all();
        return $this->render('index',['products'=>$products,'model'=>$model]);
    }

    public function actionProduct()
    {
        $request = Yii::$app->request;
        $model = new Product();

        $object = Product::find()->where(['alias'=> $request->get('alias')])->one();
        if ($object !== null ){
            $model->name = $object->name;
            $model->price = $object->price;
            $model->articul = $object->articul;
            $model->count = $object->count;
            return $this->render('product',['model'=>$model,'object'=>$object]);
        }else{
            echo "<a href='/'>Страница не найдена! На главную</a>";

        }

    }
    public function actionSearch(){
        $request = Yii::$app->request;
        $result = null;
        $str = $request->get('search_str');

        $str = trim($str);
        $str = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $str);
        $str = substr($str, 0, 32);

        $model = new Product();
        $result = $model->search($str);
        return $this->render('search',['result'=>$result]);


    }

    public function actionUpdate(){
        $model = new Product();
        $id = Yii::$app->request->post('prod_id');
        $change = Product::findOne($id);
        $trans = Yii::$app->request->post('Product')['name'];
        $alias = $model->stringTranslit($trans);
        $change->name = Yii::$app->request->post('Product')['name'];;
        $change->alias = $alias;
        $change->price = Yii::$app->request->post('Product')['price'];
        $change->articul = Yii::$app->request->post('Product')['articul'];
        $change->count = Yii::$app->request->post('Product')['count'];
        $change->save();
        Yii::$app->session->setFlash('success','Данные успешно сохранены');
        return $this->redirect('/');



    }

    public function actionCreate(){
        $model = new Product();
        if ($model->load(Yii::$app->request->post())) {
            $trans = Yii::$app->request->post('Product')['name'];
            $alias = $model->stringTranslit($trans);
            $model->alias = $alias;
            $model->save();
            Yii::$app->session->setFlash('success','Данные успешно сохранены');
            return $this->redirect('/');

        } else {

            Yii::$app->session->setFlash('error','Ошибка');
        }

    }


}
