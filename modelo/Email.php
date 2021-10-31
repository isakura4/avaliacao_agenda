<?php

class Email
{
  private $id;
  private $endereco;
  private $contatoId;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function setEndereco($endereco)
  {
    $this->endereco = $endereco;
  }

  public function getContatoId()
  {
    return $this->contatoId;
  }

  public function setContatoId($contatoId)
  {
    $this->contatoId = $contatoId;
  }

  public function salvarEmail()
  {
    $sql = ('INSERT INTO Email VALUES (:id, :endereco, :contatoid)');
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $this->id);
    $stmt->bindValue(':endereco', $this->endereco);
    $stmt->bindValue(':contatoid', $this->contatoId);
    try {
      $stmt->execute();
      return 'E-mail salvo';
    } catch (Exception $err) {
      echo 'Erro: ' . $err->getMessage();
    }
  }

  public function alterarEmail()
  {
    $sql = ('UPDATE Email SET EmailEnd = :endereco WHERE EmailID = :id');
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':endereco', $this->endereco);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
    return 'Email alterado!';
  }
}
