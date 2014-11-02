<?php

include 'app/Model/Product.php';

class ProductsController extends Controller
{
    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function itemAction($params)
    {
        $item_id = $params[3];
        $data['get_with_products'] = $this->model->get_with_products($item_id);
        $data['sidebar'] = false;
        $data['cart_counter'] = $this->model->get_cart_counter();

        if ($this->model->get_product_title($item_id) != '') {
            $data['title'] = $this->model->get_product_title($item_id);
            $data['product'] = $this->model->get_product($item_id);
        } else {
            $data['title'] = 'Такого браслета нет :(';
            $data['product'] = false;
        }

        $this->view->generate('product.php', null, $data);
    }
}