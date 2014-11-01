<?php

class Product extends Model
{
    public function get_products()
    {
        $mysqli = Product::open_database_connection();

        $products = array();
        if ($result = $mysqli->query('SELECT id, sku, title, image, price FROM product ORDER BY watched DESC')) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            $result->close();
        }
        $mysqli->close();
        return $products;
    }

    /* TODO сейчас тупо продукты выводятся, анализа нет :( */
    public function get_with_products($id) {
        $mysqli = Product::open_database_connection();

        $products = array();
        if ($result = $mysqli->query('SELECT id, sku, title, image, price FROM product ORDER BY id LIMIT 4')) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            $result->close();
        }
        $mysqli->close();
        return $products;
    }

    public function get_product($id)
    {
        $mysqli = Product::open_database_connection();

        $product = array();
        if ($result = $mysqli->query('SELECT id, sku, title, image, price, code, trade_mark, material, package, description FROM product WHERE id=' . $id)) {
            while ($row = $result->fetch_assoc()) {
                if (!isset($field['id'])) {
                    /* TODO если такого продукта нет, нужно перенаправить на 404. хм..а заголовки уже отправлены. печаль :( */
                }
                $product[] = $row;
            }
            $result->close();
        }

        $mysqli->close();
        return $product;
    }

    public function get_product_title($id)
    {
        $mysqli = Product::open_database_connection();

        $title = '';
        if ($result = $mysqli->query('SELECT id, title FROM product WHERE id=' . $id)) {
            while ($field = $result->fetch_assoc()) {
                if (!isset($field['id'])) {
                    /* TODO если такого продукта нет, нужно перенаправить на 404. хм..а заголовки уже отправлены. печаль :( */
                }
                $title = $field['title'];
            }
        }

        $mysqli->close();
        return $title;
    }

    public function card_record($id) {
        $mysqli = Product::open_database_connection();

        $cartCount = 0;
        $inCart = $mysqli->query('SELECT in_cart FROM product WHERE id=' . $id);
        while ($cartInfo = $inCart->fetch_assoc()) {
            $cartCount = $cartInfo['in_cart'];
        }
        $cartCount++;

        $isInserted = $mysqli->query('UPDATE product SET in_cart = ' . $cartCount . ' WHERE id = ' . $id);

        $mysqli->close();
        if($isInserted){
            return true;
        }else{
            return false;
        }
    }
}
