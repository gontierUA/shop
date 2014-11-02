<?php if ($data['product'] !== false) : ?>
<div class="goods_wraper cf">
    <div class="goods_info f_left">
        <div class="goods_icon_wraper">
            <img class="goods_icon" src="<?php echo $data['product'][0]['image']; ?>" alt="<?php echo $data['product'][0]['title']; ?>"/>
        </div>
        <p class="price f_left"><?php echo $data['product'][0]['price']; ?> <sub>грн.</sub></p>
        <a class="add_to_card f_left js-add-cart" data-item-id="<?php echo $data['product'][0]['id']; ?>" href="#">В корзину</a>
    </div>
    <div class="goods_info f_left">
        <div class="tabs cf">
            <a class="tab__switcher active" href="#" rel="characteristics">
                Характеристики
            </a>
            <a class="tab__switcher" href="#" rel="description">
                Описание
            </a>
        </div>
        <div class="tabs__content shown" id="characteristics">
            <ul class="goods_add_info">
                <li class="cf">
                    <span class="f_left name_field"><b>Артикул</b></span>
                    <span class="f_left value_field"><?php echo $data['product'][0]['sku']; ?></span>
                </li>
                <li class="cf">
                    <span class="f_left name_field"><b>Код</b></span>
                    <span class="f_left value_field"><?php echo $data['product'][0]['code']; ?></span>
                </li>
                <li class="cf">
                    <span class="f_left name_field"><b>Торговая марка </b></span>
                    <span class="f_left value_field"><?php echo $data['product'][0]['trade_mark']; ?></span>
                </li>
                <li class="cf">
                    <span class="f_left name_field"><b>Материал </b></span>
                    <span  class="f_left value_field"><?php echo $data['product'][0]['material']; ?></span>
                </li>
                <li class="cf">
                    <span class="f_left name_field"><b>Кол-во в упаковке </b></span>
                    <span class="f_left value_field"><?php echo $data['product'][0]['package']; ?></span>
                </li>
            </ul>
        </div>
        <div class="tabs__content" id="description">
            <p>
                <?php echo $data['product'][0]['description']; ?>
            </p>
        </div>
    </div>
</div>

<div class="more_goods cf">
    <h2>С этим товаром выбирают:</h2>
    <div class="goods_b">
        <div class="goods_icon_wraper">
            <img class="goods_icon" src="imgs/goods.jpg" alt="goods"/>
        </div>
        <p class="goods_code">75054</p>
        <p class="goods_description">Кожаный браслет с замком из серебра Pandora </p>
        <p class="price">7 199 руб.</p>
        <a class="add_to_card" href="goods.html">Смотреть</a>
    </div>
    <div class="goods_b">
        <div class="goods_icon_wraper">
            <img class="goods_icon" src="imgs/goods.jpg" alt="goods"/>
        </div>
        <p class="goods_code">75054</p>
        <p class="goods_description">Кожаный браслет с замком из серебра Pandora </p>
        <p class="price">7 199 руб.</p>
        <a class="add_to_card" href="goods.html">Смотреть</a>
    </div>
    <div class="goods_b">
        <div class="goods_icon_wraper">
            <img class="goods_icon" src="imgs/goods.jpg" alt="goods"/>
        </div>
        <p class="goods_code">75054</p>
        <p class="goods_description">Кожаный браслет с замком из серебра Pandora </p>
        <p class="price">7 199 руб.</p>
        <a class="add_to_card" href="goods.html">Смотреть</a>
    </div>
    <div class="goods_b">
        <div class="goods_icon_wraper">
            <img class="goods_icon" src="imgs/goods.jpg" alt="goods"/>
        </div>
        <p class="goods_code">75054</p>
        <p class="goods_description">Кожаный браслет с замком из серебра Pandora </p>
        <p class="price">7 199 руб.</p>
        <a class="add_to_card" href="goods.html">Смотреть</a>
    </div>
</div>
<?php endif; ?>