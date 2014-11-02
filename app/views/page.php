<?php
$routes = explode('/', $_SERVER['REQUEST_URI']);
?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/web/js/libs/selectric/selectric.css">
    <link rel="stylesheet" href="/web/js/libs/ion.rangeSlider/css/ion.rangeSlider.css"/>
    <link rel="stylesheet" href="/web/js/libs/ion.rangeSlider/css/ion.rangeSlider.skinNice.css"/>
    <link rel="stylesheet" href="/web/css/common.css"/>
    <title>Shop</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/web/js/libs/selectric/jquery.selectric.min.js"></script>
    <script src="/web/js/libs/ion.rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="/web/js/common.js"></script>
</head>
<body class="<?php echo ($routes[1] == '') ? 'home': 'separate_goods_page' ?>">
<div class="wraper">
    <ul class="navigation cf">
        <li class="nav_item active">
            <a href="/">Каталог товаров</a>
        </li>
        <li class="nav_item">
            <a href="/cart">Корзина<span id="cartCounter"><?php echo ($data['cart_counter']) ? ' (' . $data['cart_counter'] . ')' : '' ?></span></a>
        </li>
    </ul>
    <header class="content_header cf">
        <ul class="breadcrumbs cf">
            <li><a href="/">Каталог товаров</a></li>
        </ul>
        <h1 class="headline">
            <?php echo $data['title']; ?>
        </h1>
    </header>
    <aside>
        <?php if ($data['sidebar'] == true) : ?>

        <?php endif; ?>
    </aside>
    <section class="content cf">
        <?php (!is_null($CONTENT_TEMPLATE)) ? include 'app/views/content-templates/' . $CONTENT_TEMPLATE : false ?>
    </section>
</div>
</body>
</html>