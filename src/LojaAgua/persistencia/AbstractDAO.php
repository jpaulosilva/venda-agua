<?php

namespace LojaAgua\persistencia;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

abstract class AbstractDAO{

  public $entityManager;
  private $entityPath;


  public function __construct($entityPath){
    $this->$entityPath = $entityPath;
    $this->entityManager = $this->createEntityManager();
  }

  public function createEntityManager(){

    $path = array('LojaAgua/entidades');

    $isDevMode = true;
    $config = Setup::createAnnotationMetadataConfiguration($path, $isDevMode);

    $conn = array(
        'dbname' => 'vendaagua',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql'
    );

    // obtaining the entity manager
    return EntityManager::create($conn, $config);

  }

  public function insert($user){

    $this->entityManager->persist($user);
    $this->entityManager->flush();

  }

  public function delete(){

    $this->entityManager->remove($user);
    $this->entityManager->flush();

  }

  public function update(){

    $this->entityManager->merge($user);
    $this->entityManager->flush();

  }

  public function findById($id){

    return $this->entityManager -> find($entityPath, $id);

  }

  public function findAll(){

    $collection = $this->entityManager -> getRepository($this->entityPath)->findAll();

    $data = array();
    foreach ($collection as $obj) {
      $data[] = $obj;

    }
    return $data;
  }

}

 ?>
