<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                        <a href="#" data-toggle="modal" data-target="#DeletePerson"
                            data-id="<?php echo $p->persona_id ?>" data-name="<?php echo $p->nombre ?>">Borrar</a>
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
        <script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.toaster.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script>
        var id;
        var link;
        $('#DeletePerson').on('show.bs.modal', function(event) {
            link = $(event.relatedTarget)
            id = link.data('id') // Extract info from data-* attributes
            var name = link.data('name')
            console.log(id)
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title span').text(name);

        })
        $("#b-borrar").click(function() {
            /**console.log("cick" + id) */
            $.ajax({
                url: "../personas/borrar_ajax/" + id,
                context: document.body
            }).done(function(res) {
                console.log(res)
                $("#DeletePerson").modal("hide")
                $(link).parent().parent().remove()
            });


        });
        </script>
    </div>
    <?php if($this->session->flashdata('message') != null) : ?>
            <script>
                $.toaster({ message : '<?php echo $this->session->flashdata('message')?>', title : ' Personas' });
            </script>
    <?php endif;?>

</body>

</html>