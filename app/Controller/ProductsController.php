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
        $data['product'] = $this->model->get_product($item_id);
        /* TODO: get_with_products - скудоумие. нужно другое название.*/
        $data['get_with_products'] = $this->model->get_with_products($item_id);
        $data['title'] = $this->model->get_product_title($item_id);
        $data['sidebar'] = false;
        $this->view->generate('product.php', null, $data);
    }
}