<?php

namespace LojaAgua\persistencia;

use LojaAgua\entidades\Usuario;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

use LojaAgua\persistencia\AbstractDAO;

class UsuarioDAO extends AbstractDAO {

  public function __construct(){
    parent::__construct('LojaAgua\entidades\Usuario');
  }
}

 ?>
