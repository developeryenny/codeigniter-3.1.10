<?php
function list_person(){
   
    $CI =& get_instance();/**Once you’ve assigned the object to a variable, you’ll use that variable instead of $this: */
    $personas = $CI->Persona->findAll();

    $ul = "<ul>";
    foreach($personas as $key => $persona){
        $ul .= "<li>$persona->nombre $persona->apellido</li>";
    }
    $ul .= "</ul>";
    //$ul = $ul . "</ul>"; signific lo mismo que está arriba
   return $ul;
  
}