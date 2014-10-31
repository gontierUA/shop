<?php

include 'app/Model/Product.php';

class IndexController extends Controller
{
    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function indexAction()
    {
        $data['products'] = $this->model->get_products();
        $data['title'] = 'Браслеты и украшения';
        $data['sidebar'] = true;
        $this->view->generate('index.php', null, $data);
    }
}