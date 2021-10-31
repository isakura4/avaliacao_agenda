<?php

class Contato
{

  private $id;
  private $nome;
  private $usuario;
  private $emails;
  private $telefones;

  function __construct($usuario)
  {
    $this->usuario = $usuario;
    $this->emails = [];
    $this->telefones = [];
  }

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

  public function getUsuario()
  {
    return $this->usuario;
  }

  public function getEmails()
  {
    return $this->emails;
  }

  public function setEmails(Email $emails)
  {
    $this->emails = $emails;
  }

  public function adicionarEmail(Email $email)
  {
    $this->emails[] = $email;
  }

  public function getTelefones()
  {
    return $this->telefones;
  }

  public function setTelefones(Telefone $telefones)
  {
    $this->telefones = $telefones;
  }

  public function adicionarTelefone(Telefone $telefone)
  {
    $this->telefones[] = $telefone;
  }

  public function salvarContato()
  {
    $sql = 'INSERT INTO Contato VALUES (:id, :nome, :usuario)';
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $this->id);
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':usuario', $this->usuario);
    $stmt->execute();
    return 'Contato adicionado!';
  }

  public function excluirContato()
  {
    $sql = 'DELETE FROM Contato WHERE (ContatoID = :id)';
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
    return "Contato $this->nome apagado!";
  }

  public function salvarEmails()
  {
    foreach ($this->emails as $email) {
      $email->salvarEmail();
    }
  }

  public function salvarTelefones()
  {
    foreach ($this->telefones as $telefone) {
      $telefone->salvarTelefone();
    }
  }

  public function listarTelefones()
  {
    $sql = 'SELECT TelNumero FROM Telefone WHERE ContatoID=:id';
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
    $telefones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $telefones;
  }

  public function listarEmails()
  {
    $sql = 'SELECT EmailEnd FROM Email WHERE ContatoID=:id';
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
    $emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $emails;
  }
}
