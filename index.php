<?php
  $loader = require __DIR__ . '/vendor/autoload.php';

  use LojaAgua\entidades\Usuario;
  use LojaAgua\entidades\Pedido;
  use LojaAgua\persistencia\UsuarioDAO;
  use LojaAgua\persistencia\PedidoDAO;


$app = new \Slim\Slim();

$usuarioDAO = new UsuarioDAO();

$app->get('/', function(){
  echo json_encode([
    "api" => "Venda de Agua",
    "version" => "1.0.0"
  ]);
});

$app->get('/usuario(/(:id))', function($id = null) use ($usuarioDAO){
  echo json_encode($usuarioDAO->findAll()) ;
});

$app->post('/usuario(/)', function(){
  echo "POST\n" ;
});

$app->put('/usuario(/)', function(){
  echo "PUT\n" ;
});

$app->delete('/usuario/:id', function(){
  echo "DELETE\n" ;
});

$app->run();

/*
  $user = new Usuario(0, "joaopaulo7@outlook.com", "123456", "Rua Rui Barbosa");
  $dao = new UsuarioDAO();

  $dao->insert($user);


  $time = new DateTime('now');
  $pedido = new Pedido(0, $time, $user, array());
  $dao2 = new PedidoDAO();

  $dao2->insert($pedido);
  */

 ?>
