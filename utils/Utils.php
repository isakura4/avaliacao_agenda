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
}
