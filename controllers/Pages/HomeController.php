<?php

class HomeController
{
    public static function getHome()
    {
        return View::renderizar('pages/index', ['teste' => 'Funcionou!']);
    }
}
