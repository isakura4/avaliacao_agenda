<?php

class ContatoController
{
    public static function listarTelefones($contatoId, $usuario)
    {
        $contato = new Contato($usuario);
        $contato->setId($contatoId);
        $telefones = [];
        foreach ($contato->listarTelefones() as $tel) {
            $telefones[] = $tel['TelNumero'];
        }
        return $telefones;
    }

    public static function montarTelefones($contatoId, $usuario)
    {
        $telefones = self::listarTelefones($contatoId, $usuario);
        if (sizeof($telefones) > 0) {
            $maisTelefones = sizeof($telefones) > 1 ? '<a href="#"> +' . sizeof($telefones) - 1 . '</a>' : '';
            $telefoneString = $telefones[0] . $maisTelefones;
            return $telefoneString;
        } else {
            return 'Nenhum telefone salvo';
        }
    }

    public static function listarEmails($contatoId, $usuario)
    {
        $contato = new Contato($usuario);
        $contato->setId($contatoId);
        $emails = [];
        foreach ($contato->listarEmails() as $mail) {
            $emails[] = $mail['EmailEnd'];
        }
        return $emails;
    }

    public static function montarEmails($contatoId, $usuario)
    {
        $emails = self::listarEmails($contatoId, $usuario);
        if (sizeof($emails) > 0) {
            $maisEmails = sizeof($emails) > 1 ? '<a href="#"> +' . sizeof($emails) - 1 . '</a>' : '';
            $emailString = $emails[0] . $maisEmails;
            return $emailString;
        } else {
            return 'Nenhum e-mail salvo';
        }
    }
}
