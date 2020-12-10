<?php /** @var \app\models\Product $model */?>
<h1><?=$model->name?></h1>
<h1><?=$model->description?></h1>
<p><?=$model->price?></p>

<form action="/add_to_basket.php" method="post">
<input type="hidden" value="<?=$product['id']?>" name="id">
<input type="number" value="0" name="qty">
<input type="submit" value="Добавить">
</form>
