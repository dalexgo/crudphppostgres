<?php
require_once "Animal.php";
$db = new Conexion();
$animal = new Animal($db);
$id = filter_input(INPUT_GET, 'animalid', FILTER_VALIDATE_INT);

if( $id )
{
    $animal->setId($id);
    $animal->delete();
}
//header("Location:" . Animal::baseurl() . "app/list.php");