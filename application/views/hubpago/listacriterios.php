<label for="">Busquedas HubDepago</label><br>
<?php for ($i=0; $i < count($criterios) ; $i++) { ?>
    
<div class="form-check">
    <input class="form-check-input" type="radio" onclick="cambiar_tipo_switch()" name="exampleRadios"
            id="exampleRadios4" value=" <?=  $criterios[$i]->Etiqueta  ?>" checked >
    <label class="form-check-label" for="exampleRadios4">
    <?=  $criterios[$i]->Etiqueta  ?>
    
   
    </label>
</div> 
<?php   }   ?>