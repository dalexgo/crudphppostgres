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
        $db = new Conexion();
        $animal = new Animal($db);
        $animal = $animal->get();
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">animal List</h2>
                <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
                    <a class="btn btn-info" href="Nuevo.php">Add animal</a>
                </div>
                <?php
                if( ! empty( $animal ) )
                {
                ?>
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>nombre</th>
                        <th>edad</th>
                     
                        <th>Actions</th>
                    </tr>
                    <?php foreach( $animal as $animal )
                    {
                    ?>
                        <tr>
                            <td><?php echo $animal->id ?></td>
                            <td><?php echo $animal->nombre ?></td>
                            <td><?php echo $animal->edad ?></td>
                          
                            <td>
                                <a class="btn btn-info" href="Editar.php">Edit</a> 
                                <a class="btn btn-info" href="Eliminar.php?animalid=<?php echo $animal->id ?>" >Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <?php
                }
                else
                {
                ?>
                <div class="alert alert-danger" style="margin-top: 100px">Any animal has been registered</div>
                <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>