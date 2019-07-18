<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <br>
            <a href="guardar" class="btn btn-success">Guardar</a>
            <br><br>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Edad</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php foreach ($personas as $key => $p) :?>
            <th scope="row"><?php echo $p->persona_id ?></th>
            <td><?php echo $p->nombre?></td>
            <td><?php echo $p->apellido?></td>
            <td><?php echo $p->edad?></td>
            <td>
                <!--funciones que estan en la carpeta controller -->
                <a href="guardar/<?php echo $p->persona_id ?>">Editar</a>
                <br>
                <a href="ver/<?php echo $p->persona_id ?>">Ver</a>
                <br>
                <a href="borrar/<?php echo $p->persona_id ?>">Borrar</a>
            </td>

            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
</div>
    </body>
</html>