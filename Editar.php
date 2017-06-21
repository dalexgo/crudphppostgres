<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "Animal.php";
    $id = filter_input(INPUT_GET, 'animal', FILTER_VALIDATE_INT);
    if( ! $id )
    {
        header("Location:" . animal::baseurl() . "Listar.php");
    }
    $db = new Conexion;
    $newanimal = new Animal($db);
    $newanimal->setId($id);
    $animal = $newanimal->get();
    $newanimal->checkanimal($animal);
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Edit animal <?php echo $animal->nombre ?></h2>
            <form action="<?php echo Animal::baseurl() ?>Update.php" method="POST">
                <div class="form-group">
                    <label for="nombre">nombre</label>
                    <input type="text" name="nombre" value="<?php echo $animal->nombre ?>" class="form-control" id="nombre" placeholder="nombre">
                </div>
                <div class="form-group">
                    <label for="edad">edad</label>
                    <input type="edad" name="edad" value="<?php echo $animal->edad ?>" class="form-control" id="edad" placeholder="edad">
                </div>
                <input type="hidden" name="id" value="<?php echo $animal->id ?>" />
                <input type="submit" name="submit" class="btn btn-default" value="Update animal" />
            </form>
        </div>
    </div>
</body>
</html>