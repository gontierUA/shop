<?php

include 'app/Model/Product.php';

class ConfirmationController extends Controller
{
    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function indexAction()
    {
        $data['title'] = 'Спасибо за покупку!';
        $data['sidebar'] = false;
        $data['cart_counter'] = $this->model->get_cart_counter();

        if (isset($_POST['item'])) {
            $this->model->save_items($_POST['item']);
            $this->view->generate(null, null, $data);
        }
        return false;
    }
}