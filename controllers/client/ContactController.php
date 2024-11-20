<?php

class ContactController
{
    public function index() 
    {
        $view = 'contact';
        require_once PATH_VIEW_CLIENT_MAIN;
    }
}