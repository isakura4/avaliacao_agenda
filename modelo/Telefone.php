<?php

class Telefone
{

  private $id;
  private $numero;
  private $contatoId;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNumero()
  {
    return $this->numero;
  }

  public function setNumero($numero)
  {
    $this->numero = $numero;
  }

  public function getContatoId()
  {
    return $this->contatoId;
  }

  public function setContatoId($contatoId)
  {
    $this->contatoId = $contatoId;
  }

  public function salvarTelefone()
  {
    $sql = ('INSERT INTO Telefone VALUES (:id, :numero, :contatoid)');
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $this->id);
    $stmt->bindValue(':numero', $this->numero);
    $stmt->bindValue(':contatoid', $this->contatoId);
    try {
      $stmt->execute();
      return 'Telefone salvo';
    } catch (Exception $err) {
      echo 'Erro: ' . $err->getMessage();
    }
  }

  public function alterarTelefone()
  {
    $sql = ('UPDATE Telefone SET TelNumero = :numero WHERE TelID = :id');
    $conexao = Conexao::getConnection();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':numero', $this->numero);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
    return 'Telefone alterado!';
  }
}
