<?php

class Usuario
{

  private $id;
  private $nome;
  private $login;
  private $senha;
  private $email;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getLogin()
  {
    return $this->login;
  }

  public function setLogin($login)
  {
    $this->login = $login;
  }

  public function getSenha()
  {
    return $this->senha;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function salvarUsuario()
  {
    $sql = "INSERT INTO Usuario VALUES(:id, :usernome, :useremail , :userlogin, :senha)";
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $this->id);
    $stmt->bindValue(':usernome', $this->nome);
    $stmt->bindValue(':useremail', $this->email);
    $stmt->bindValue(':userlogin', $this->login);
    $stmt->bindValue(':senha', $this->senha);
    $stmt->execute();
    return 'Usuário salvo!';
  }

  public function listarContatos()
  {
    $conexao = Conexao::getConnection();
    $sql = "SELECT * FROM Contato WHERE (UserID = :userid)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':userid', $this->id);
    $stmt->execute();
    $contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contatos;
  }
}
