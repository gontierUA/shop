<?php foreach ($data['products'] as $product) : ?>
    <img src="<?php echo $product['image'] ?>" alt="<?php echo  $product['title'] ?>" />
    <p>
<!-- TODO: /products/item/ - в идеале, здесь нужно больше абстракции. возможно это нужно описать в Route.php -->
        <a href="/products/item/<?php echo $product['id'] ?>"><?php echo $product['title'] ?></a>
    </p>
<?php endforeach; ?>

<?php
var_dump($data);
?>