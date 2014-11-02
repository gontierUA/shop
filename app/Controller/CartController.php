<?php

include 'app/Model/Product.php';

class CartController extends Controller
{
    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function indexAction()
    {
        $data['title'] = 'Ваш заказ';
        $data['sidebar'] = false;
        $data['cart_counter'] = $this->model->get_cart_counter();
        $data['cart_items'] = $this->model->get_cart_items();
        $this->view->generate('cart.php', null, $data);
    }

    function addToCartAction()
    {
        if (isset($_POST['item']) && is_numeric($_POST['item'])) {
            $itemID = $_POST['item'];

            print json_encode($this->model->cart_record($itemID));
            die();
        }
        return false;
    }
}