<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .img-small {
        width: 180px;
        display: block;
        border: 1px solid #CCC;
        margin: 4px 0;
    }
    </style>

</head>

<body>
    <div class="container">
        <br>
        <a href="<?php echo base_url()?>index.php/personas/listado" class="btn btn-success">Regresar</a>
        <br><br>

        
        <?php if(validation_errors() != ""):?>
        <div class="alert alert-danger" role="alert">
            <?php echo validation_errors();?>
        </div>
        <?php endif;?>
        <?php if($error != ""):?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error;?>
        </div>
        <?php endif;?>
        <?php echo form_open_multipart('');?>
        <!--subir archivos, imágenes-->
        <div class="form-group">
            <?php 
            echo form_label('Nombre', 'nombre');/**texto label y atributo form */
            $input =array(
                'name'=> 'nombre',
                'value'=> $nombre, /**nombre de las variables de la vista así recupero los datos */
                'class'=> 'form-control input-lg'
                
            );
            echo form_input($input);
        ?>
        </div>
        <div class="form-group">
            <?php 
            echo form_label('Apellido', 'apellido');/**texto label y atributo form */
            $input =array(
                'name'=> 'apellido',
                'value'=> $apellido,
                'class'=> 'form-control input-lg'
                
            );
            echo form_input($input);
        ?>
        </div>
        <div class="form-group">
            <?php 
            echo form_label('Edad', 'edad');/**texto label y atributo form */
            $input =array(
                'name'=> 'edad',
                'type'=> 'number',
                'value'=> $edad,
                'class'=> 'form-control input-lg'
                
            );
            echo form_input($input);
        ?>
        </div>
        <div class="form-group">
            <?php 
            echo form_label('Imagen', 'image');/**texto label y atributo form */
            $input =array(
                'name'=> 'image',
                'type'=> 'file',
                'value'=> "",
                'class'=> 'form-control input-lg'
                
            );
            echo form_input($input);
        ?>
        </div>
        <?php if ($image != ""): ?>
        <img class="img-small" src="<?php echo base_url() ?>uploads/<?php echo $image ?>">
        <?php endif; ?>

        <?php
            echo form_submit('mysubmit', 'Enviar', "class='btn btn-success'");
        ?>
        <?php echo form_close();?>
    </div>
</body>

</html>