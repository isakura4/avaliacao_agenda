<?php

class HomeController
{
    public static function getHome($usuario)
    {
        return View::renderizar('pages/index', ['tabela' => UsuarioContatosController::getTabelaDeContatos($usuario)]);
    }
}
