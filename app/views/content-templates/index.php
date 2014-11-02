<div class="goods_wraper cf">
    <?php foreach ($data['products'] as $product) : ?>
        <div class="goods_b">
            <div class="goods_icon_wraper">
                <img class="goods_icon" src="<?php echo $product['image'] ?>" alt="<?php echo  $product['title'] ?>"/>
            </div>
            <p class="goods_code"><?php echo  $product['sku'] ?></p>
            <p class="goods_description"><?php echo  $product['title'] ?></p>
            <p class="price"><?php echo  $product['price'] ?> грн.</p>
            <a class="add_to_card" href="/products/item/<?php echo $product['id'] ?>">Смотреть</a>
        </div>
    <?php endforeach; ?>
</div>