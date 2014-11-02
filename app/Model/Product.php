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
                $title = $field['title'];
            }
        }

        $mysqli->close();
        return $title;
    }

    public function cart_record($id) {
        $mysqli = Model::open_database_connection();

        /* cart counter */
        $cartCount = 0;
        $inCart = $mysqli->query('SELECT in_cart FROM product WHERE id=' . $id);
        while ($cartInfo = $inCart->fetch_assoc()) {
            $cartCount = $cartInfo['in_cart'];
        }
        $cartCount++;

        $mysqli->query('UPDATE product SET in_cart = ' . $cartCount . ' WHERE id = ' . $id);

        /* user cart */
        $userCartQuery = $mysqli->query('SELECT id, items FROM cart WHERE id = "' . session_id() . '"');

        if($userCartQuery->num_rows > 0) {
            $userCartInfo = mysqli_fetch_assoc($userCartQuery);
            $userCartInfo['items'] .= $id . ';';
            $mysqli->query('UPDATE cart SET items = "' .  $userCartInfo['items'] . '" WHERE id = "' . session_id() . '"');
            $mysqli->close();
            $itemArr = explode(";", $userCartInfo['items']);
            return count($itemArr);
        } else {
            $mysqli->query('INSERT INTO cart (id, items) VALUES ("' . session_id() . '", "' . $id . '")');
            $mysqli->close();
            return 1;
        }
    }

    public function get_cart_counter()
    {
        $mysqli = Model::open_database_connection();
        $userCartQuery = $mysqli->query('SELECT items FROM cart WHERE id = "' . session_id() . '"');

        if($userCartQuery->num_rows > 0) {
            $userCartInfo = mysqli_fetch_assoc($userCartQuery);
            $mysqli->close();
            $itemArr = explode(";", $userCartInfo['items']);
            return count($itemArr) - 1;
        }
        $mysqli->close();
        return false;
    }

    public function get_cart_items()
    {
        $mysqli = Model::open_database_connection();
        $userCartQuery = $mysqli->query('SELECT items FROM cart WHERE id = "' . session_id() . '"');

        $cartContent = array();
        $totalPrice = 0;
        if($userCartQuery->num_rows > 0) {
            $userCartInfo = mysqli_fetch_assoc($userCartQuery);
            $itemArr = explode(";", $userCartInfo['items']);

            $cleanArr = array_count_values($itemArr);
            unset($cleanArr['']);

            foreach ($cleanArr as $key=>$count) {
                $result = $mysqli->query('SELECT id, sku, title, image, price FROM product WHERE id=' . $key);
                while ($row = $result->fetch_assoc()) {
                    $row['price'] = $row['price'] * $count;
                    $row['count'] = $count;
                    $cartContent[] = $row;
                    $totalPrice = $totalPrice + $row['price'];
                }
            }
            $mysqli->close();
            $cartContent['total_price'] = $totalPrice;
            return $cartContent;
        }
        $mysqli->close();
        return false;
    }
}
