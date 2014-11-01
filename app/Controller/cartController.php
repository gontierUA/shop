<?php

class CartController extends Controller
{
    function __construct()
    {
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
            $id = $_POST['item'];

            print json_encode($id);
            die();
        }
        return false;
    }
}