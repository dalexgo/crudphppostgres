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
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Add animal</h2>
            <form action="Guardar.php" method="POST">
                <div class="form-group">
                    <label for="nombre">nombre</label>
                    <input type="text" name="nombre" value="" class="form-control" id="nombre" placeholder="nombre">
                </div>
                <div class="form-group">
                    <label for="edad">edad</label>
                    <input type="edad" name="edad" value="" class="form-control" id="edad" placeholder="edad">
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Guardar animal" />
            </form>
        </div>
    </div>
</body>
</html>