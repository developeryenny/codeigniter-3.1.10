<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <?php echo form_open('');?>
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
        <?php
            echo form_submit('mysubmit', 'Enviar', "class='btn btn-success'");
        ?>
        <?php echo form_close();?>
        </div>
    </body>
</html>