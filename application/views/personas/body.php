<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <h1> Datos de Personas</h1>
        <?php echo $view ?>
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
   
    <?php if($this->session->flashdata('message') != null) : ?>
            <script>
                $.toaster({ message : '<?php echo $this->session->flashdata('message')?>', title : ' Personas' });
            </script>
    <?php endif;?>

</body>

</html>