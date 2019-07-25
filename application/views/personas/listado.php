<form method="get">
    <div class="input-group mb-3">
        <input name="name" type="text" class="form-control" placeholder="Recipient's username" aria-label="Filtrar"
            aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
        </div>
    </div>
</form>
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
                <a href="#" data-toggle="modal" data-target="#DeletePerson" data-id="<?php echo $p->persona_id ?>"
                    data-name="<?php echo $p->nombre ?>">Borrar</a>
            </td>

        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div class="modal fade" id="DeletePerson" tabindex="-1" role="dialog" aria-labelledby="DeletePersonLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeletePersonLabel">
                    ¿Seguro que deseas borrar el registro seleccionado?
                    <span></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                <button type="button" class="btn btn-primary" id="b-borrar">Borrar</button>
            </div>
        </div>
    </div>
</div>