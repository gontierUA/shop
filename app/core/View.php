<?php
class View
{
    function generate($CONTENT_TEMPLATE = null, $PAGE_TEMPLATE = null, $data = null)
    {
        if (is_null($PAGE_TEMPLATE)) {
            $PAGE_TEMPLATE = 'page.php';
        }
        include 'app/views/' . $PAGE_TEMPLATE;
    }
}