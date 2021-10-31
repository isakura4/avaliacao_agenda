<?php

class View
{
    private static function resgatarConteudo($view)
    {
        $arquivo = __DIR__ . '/../views/' . $view . '.html';
        return (file_exists($arquivo) ? file_get_contents($arquivo) : '');
    }

    public static function renderizar($view, $vars = [])
    {
        $conteudo = self::resgatarConteudo($view);

        $chaves = array_keys($vars);
        $chaves = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $chaves);

        return str_replace($chaves, array_values($vars), $conteudo);
    }
}
