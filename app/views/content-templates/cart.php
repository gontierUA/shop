<div class="goods_wraper cf">
    <?php if (!empty($data['cart_items'])) : ?>
    <form action="/confirmation" method="post" class="checkout_form" name="checkout">
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
                        <input class="counter" type="number" min="1" max="99" value="<?php echo $item['count'] ?>"/>
                    </td>
                    <td class="fourth">
                        <p class="price"><span class="price_number"><?php echo $item['price'] ?></span><sub> грн.</sub></p>
                    </td>
                    <td class="fifth">
                        <a class="add_to_card remove_from_checkout" href="#">Удалить</a>
                    </td>
                    <input type="hidden" name="item[<?php echo $item['id'] ?>]" value="<?php echo $item['id'] ?>">
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="amount">
            Стоимость <span class="total_amount"><?php echo $data['cart_items']['total_price'] ?></span><sub> грн.</sub>
        </div>
        <div class="checkout_form_wraper">
            <div class="field_wraper">
                <label for="name">
                    Имя
                </label>
                <input id="name" type="text" name="name"/>
                <p>как к вам обращаться?</p>
            </div>
            <div class="field_wraper">
                <label for="email">
                    Email
                </label>
                <input id="email" type="text" name="email"/>
                <p>для отправки деталей заказа</p>
            </div>
            <div class="field_wraper">
                <label for="tel">
                    Телефон'
                </label>
                <input id="tel" type="text" name="tel"/>
                <p>для связи с курьером</p>
            </div>
            <button type="submit" class="submit">Заказать и уточнить детали</button>
        </div>
    </form>
    <?php endif; ?>
</div>