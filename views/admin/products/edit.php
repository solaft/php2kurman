<form action="" method="post">
    <? if (!is_null($product)): ?>
        <input type="hidden" value="<?= $product['id'] ?>" name="product[id]">
    <? endif; ?>
    <div>
        <label for="">Название</label>
        <input type="text" value="<?= $product['name'] ?? ''?>" name="product[name]">
    </div>
    <div>
        <label for="">Описание</label>
        <input type="text" value="<?= $product['description'] ?? ''?>" name="product[description]">
    </div>
    <div>
        <label for="">Цена</label>
        <input type="text" value="<?= $product['price'] ?? 0?>" name="product[price]">
    </div>
    <input type="submit" value="<?=is_null($product)? 'Создать' : 'Редактировать'?>">
</form>

<?php foreach ($product['images'] as $image):?>
    <img width="200"  src="/img/small/<?=$image['path']?>" alt="">
<?php endforeach;?>

<form action="/admin/products/add_image.php" method="post" enctype="multipart/form-data">
    <? if (!is_null($product)): ?>
        <input type="hidden" value="<?= $product['id'] ?>" name="id">
    <? endif; ?>
    <input type="file" name="image">
    <input type="submit">
</form>