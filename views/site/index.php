<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Task';

?>
<div class="search">
    <form action="/search" method="get">
        <input type="text" name="search_str" placeholder="Поиск">
        <button type="submit">Найти</button>
    </form>
</div>
<h1>Товары</h1>

<?php foreach ($products as $product): ?>
    <li>
        <a href="<?= URL::to(['/product','alias'=> Html::encode("{$product->alias}")]) ?>">
        <?= Html::encode("{$product->name} ({$product->price}.р)") ?>:

        </a>
    </li>
<?php endforeach; ?>
</ul>

<div class="new-product">
    <?php $form = ActiveForm::begin( ['action' => '/create']); ?>

    <?= $form->field($model, 'name')->label('Название') ?>
    <?= $form->field($model, 'price')->label('Цена') ?>
    <?= $form->field($model, 'articul')->label('Артикул') ?>
    <?= $form->field($model, 'count')->label('Кол-во товаров') ?>
    <?= Html::submitButton('Сохранить',['class'=>'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>
</div>