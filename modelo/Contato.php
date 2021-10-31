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

  public function setEmails($emails) //vetor de emails
  {
    $this->emails = $emails;
  }

  public function adicionarEmail($email)
  { //adicionar unitário
    $this->emails[] = $email;
  }

  public function getTelefones()
  {
    return $this->telefones;
  }

  public function setTelefones($telefones)
  {
    $this->telefones = $telefones;
  }

  public function adicionarTelefone($telefone)
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
}
