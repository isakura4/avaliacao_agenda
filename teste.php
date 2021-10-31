<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "configuracao.php";

// $conexao = null;

// try {
//   $conexao = Conexao::getConnection();
//   echo "Conexão com banco de dados realizado com sucesso!";
// } catch (\Throwable $th) {
//   //throw $th;
//   echo "Erro ao abrir conexão com banco de dados: " . $th->getMessage();
// }


// $contatoTeste = new Contato(1);
// $contatoTeste->setNome('Teste');
// $contatoTeste->setId(1);

// $emailTeste = new Email;
// $emailTeste->setId(1);
// $emailTeste->setEndereco('teste@teste.com');
// $emailTeste->setContatoId(1);

// $contatoTeste->setEmails($emailTeste);

// $contatoTeste->salvarContato();

// echo $emailTeste->salvarEmail();

// $ana = Utils::criarUsuario(2, 'Ana', 'ana', 'ana@teste.com', '1234');

// echo '<pre>';
// print_r($ana);
// echo '</pre>';

// $ana->salvarUsuario();

// $pedroEmail = Utils::criarEmail(2, 'pedro@teste.com', 2);
// $pedroTelefone = Utils::criarTelefone(1, '123', 2);
// $pedroContato = Utils::criarContato(2, 'Pedro', 2);

// // $pedroContato->adicionarEmail($pedroEmail);
// // $pedroContato->adicionarTelefone($pedroTelefone);
// // $pedroContato->salvarContato();
// // $pedroContato->salvarEmails();
// // $pedroContato->salvarTelefones();

// echo '<pre>';
// print_r($ana->listarContatos());
// echo '</pre>';

// echo '<pre>';
// print_r($pedroContato->listarTelefones());
// echo '</pre>';

// echo '<pre>';
// print_r($pedroContato->listarEmails());
// echo '</pre>';


echo HomeController::getHome();

// // print_r(UsuarioController::getContatos(2));
// echo '<table class="table">
//   <thead>
//     <tr>
//       <th scope="col">#</th>
//       <th scope="col">First</th>
//       <th scope="col">Last</th>
//       <th scope="col">Handle</th>
//     </tr>
//   </thead>
//   <tbody>';
// UsuarioController::montarTabela(2);
// echo '</tbody>';

echo UsuarioContatosController::getTabelaDeContatos(2);
