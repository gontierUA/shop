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
        $this->view->generate('cart.php', null, $data);
    }

    function addToCartAction()
    {
        if (isset($_POST['item']) && is_numeric($_POST['item'])) {
            $itemID = $_POST['item'];
            $toCart = $this->model->card_record($itemID);

            if ($toCart) {
                print json_encode('success');
            }
            die();
        }
        return false;
    }
}