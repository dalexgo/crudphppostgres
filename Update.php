Conexion.php<?php
require_once "Animal.php";
if (empty($_POST['submit']))
{
      header("Location:" . animal::baseurl() . "Listar.php");
      exit;
}
$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'nombre'  => FILTER_SANITIZE_STRING,
    'edad'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . animal::baseurl() . "Listar.php");
}

$db = new Conexion;
$animal = new Animal($db);
$animal->setId($post->id);
$animal->setnombre($post->nombre);
$animal->setedad($post->edad);
$animal->update();
header("Location:" . Animal::baseurl() . "Listar.php");