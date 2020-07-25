
<h1>Заказ № <?= $number ?></h1>
<?php foreach ($objects as $object): ?>
<li>
    <?= $object->prod_name ?>,Колличество: <?= $object->count ?>
    <a class="js-add-btn" id="<?= $object->prod_id ?>" href="#"> Добавить снова</a>
    <a class="js-del-btn" href="#" id="<?= $object->prod_id ?>"> Удалить</a>
</li>
   <?php endforeach; ?>
