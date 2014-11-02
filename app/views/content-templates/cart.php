<div class="goods_wraper cf">
    <table class="checkout_table">
        <tr>
            <th class="first">Фото</th>
            <th class="second">Наименование</th>
            <th class="third">Количество</th>
            <th class="fourth">Стоимость</th>
            <th class="fifth"></th>
        </tr>
        <?php foreach ($data['cart_items'] as $item) : ?>
            <?php if ($item === end($data['cart_items'])) { break; } ?>
            <tr class="item">
                <td class="first">
                    <div class="goods_icon_wraper">
                        <img class="goods_icon" src="<?php echo $item['image'] ?>" alt="<?php echo $item['title'] ?>"/>
                    </div>
                </td>
                <td class="second">
                    <p class="goods_code"><?php echo $item['sku'] ?></p>
                    <p class="goods_description"><?php echo $item['title'] ?></p>
                </td>
                <td class="third">
                    <input class="counter" type="number" value="<?php echo $item['count'] ?>"/>
                </td>
                <td class="fourth">
                    <p class="price"><span class="price_number"><?php echo $item['price'] ?></span><sub> грн.</sub></p>
                </td>
                <td class="fifth">
                    <a class="add_to_card remove_from_checkout" href="#">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="amount">
        Стоимость <span class="amout_summ"><?php echo $data['cart_items']['total_price'] ?></span><sub> грн.</sub>
    </div>
</div>