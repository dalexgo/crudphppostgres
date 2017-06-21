<?php
require_once "Animal.php";

if (empty($_POST['submit']))
{
      header("Listar.php");
      exit;
}

$args = array(
    'nombre'  => FILTER_SANITIZE_STRING,
    'edad'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

$db = new Conexion();
$animal = new Animal($db);
$animal->setnombre($post->nombre);
$animal->setedad($post->edad);
$animal->save();
header("Location: Listar.php");

?>