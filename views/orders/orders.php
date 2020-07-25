<?php use yii\helpers\Url;
use yii\helpers\Html;

?>
<h1>Заказы</h1>
<?php foreach ($orders as $order): ?>
    <li>
        <a href="<?= URL::to(['/order','id_offer'=> Html::encode("{$order->id_offer}")]) ?>">
           Номер заказа <?= Html::encode("{$order->id}. Цена ({$order->total_price}.р)") ?>:

        </a>
    </li>
<?php endforeach; ?>
</ul>

<a href=""></a>
