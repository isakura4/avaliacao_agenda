<?php

class Utils
{
  static public function listarUsuarios()
  {
    $sql = 'SELECT * FROM Usuario';
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contatos;
  }

  static public function criarUsuario($id, $nome, $login, $email, $senha)
  {
    $usuario = new Usuario;
    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setLogin($login);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    return $usuario;
  }

  static public function criarContato($id, $nome, $usuario)
  {
    $contato = new Contato($usuario);
    $contato->setId($id);
    $contato->setNome($nome);
    return $contato;
  }

  static public function criarTelefone($id, $numero, $contatoId)
  {
    $telefone = new Telefone;
    $telefone->setId($id);
    $telefone->setNumero($numero);
    $telefone->setContatoId($contatoId);
    return $telefone;
  }

  static public function criarEmail($id, $endereco, $contatoId)
  {
    $email = new Email;
    $email->setId($id);
    $email->setEndereco($endereco);
    $email->setContatoId($contatoId);
    return $email;
  }
}
