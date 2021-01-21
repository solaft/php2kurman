<style>
    * {
        font-size: 14px;
    }

    .product {
        float: left;
        width: 100px;
        margin: 0 6px;
        height: 75px;
        border: 1px solid black;
    }
</style>
<div class="container">
    <?php foreach ($products as $product): ?>
        <a href="/product.php?id=<?=$product['id']?>">
            <div class="product">
                <h1><?= $product['name'] ?></h1>
                <p><?= $product['description'] ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>