<?php
class NotFoundController extends Controller
{
    function indexAction()
    {
        $data['title'] = '404';
        $data['sidebar'] = false;
        $this->view->generate(null, null, $data);
    }
}