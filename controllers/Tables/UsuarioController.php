<?php

class UsuarioController
{
    private $nome;
    private $id;

    public function __construct($id, $nome)
    {
        $this->nome = $nome;
        $this->id = $id;
    }

    public static function getContatos($usuarioId)
    {
        $usuario = new Usuario;
        $usuario->setId($usuarioId);
        $contatos = $usuario->listarContatos();
        return $contatos;
    }

    public static function montarTabela($usuario)
    {
        $contatos = self::getContatos($usuario);
        $infos = [];
        $infoArray = [];
        foreach ($contatos as $contato) {
            $infos = [];
            $infos['id'] = $contato['ContatoID'];
            $infos['nome'] = $contato['ContatoNome'];
            $infoArray[] = $infos;
        }
        foreach ($infoArray as $info) {
            echo View::renderizar('tables/tableRow', $info);
        }

        // return $linhas;
    }
}
