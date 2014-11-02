<?php
class NotFoundController extends Controller
{
    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function indexAction()
    {
        $data['title'] = '404';
        $data['sidebar'] = false;
        $data['cart_counter'] = $this->model->get_cart_counter();

        $this->view->generate(null, null, $data);
    }
}