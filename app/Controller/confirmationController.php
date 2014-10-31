<?php

class ConfirmationController extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function indexAction()
    {
        $data['title'] = 'Спасибо за покупку!';
        $data['sidebar'] = false;
        $this->view->generate(null, null, $data);
    }
}