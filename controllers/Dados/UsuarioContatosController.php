<?php

class UsuarioContatosController
{

    private static function buscarContatos($usuarioId)
    {
        $usuario = new Usuario;
        $usuario->setId($usuarioId);
        $contatos = $usuario->listarContatos();
        return $contatos;
    }

    private static function montarLinhas($usuario)
    {
        $contatos = self::buscarContatos($usuario);
        $infos = [];
        $infoArray = [];
        foreach ($contatos as $contato) {
            $infos = [];
            $infos['id'] = $contato['ContatoID'];
            $infos['nome'] = $contato['ContatoNome'];
            $infos['telefone'] = ContatoController::montarTelefones($contato['ContatoID'], $usuario);
            $infos['email'] = ContatoController::montarEmails($contato['ContatoID'], $usuario);
            $infoArray[] = $infos;
        }
        $linhas = [];
        foreach ($infoArray as $info) {
            $linhas[] = View::renderizar('tables/tableRow', $info);
        }

        return $linhas;
    }

    private static function montarTabela($usuario)
    {
        $linhas = self::montarLinhas($usuario);
        $linhasString = '';
        foreach ($linhas as $linha) {
            $linhasString = $linhasString . $linha;
        }
        $tabela = View::renderizar('tables/table', ['tabela' => $linhasString]);
        return $tabela;
    }

    public static function getTabelaDeContatos($usuario)
    {
        return self::montarTabela($usuario);
    }
}
