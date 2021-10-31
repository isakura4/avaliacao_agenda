<?php

spl_autoload_register(function ($class_name) {
  $modelo = __DIR__ . '/modelo/';
  $dao = __DIR__ . '/dao/';
  $utils = __DIR__ . '/utils/';
  $Dados = __DIR__ . '/controllers/Dados/';
  $Pages = __DIR__ . '/controllers/Pages/';
  $pastas = [$modelo, $dao, $utils, $Dados, $Pages];
  foreach ($pastas as $pasta) {
    $arquivo = $pasta . $class_name . '.php';
    if (file_exists($arquivo)) {
      require_once $arquivo;
    }
  }
});
