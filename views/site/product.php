<?php use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1><?php echo $object->name ;
   ?></h1>

<div class="update-product">
    <?php $form = ActiveForm::begin( ['action' => '/update']); ?>

    <?= $form->field($model, 'name')->label('Название') ?>
    <?= $form->field($model, 'price')->label('Цена') ?>
    <?= $form->field($model, 'articul')->label('Артикул') ?>
    <?= $form->field($model, 'count')->label('Кол-во товаров') ?>
    <?= Html::hiddenInput('prod_id',$object->id) ?>


    <?= Html::submitButton('Изменить',['class'=>'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>
<div class="add-to-order">

    <?php $form = ActiveForm::begin( ['action' => 'order/add']); ?>
    <?= Html::hiddenInput('prod_id',$object->id) ?>
    <?= Html::submitButton('Добавить в заказ',['class'=>'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>


