<label for="">Busquedas </label><br>
<?php for ($i=0; $i < count($criterios) ; $i++) { ?>
   
<div class="form-check">
    <input class="form-check-input" type="radio"  name="criterio"
             value="<?=  $criterios[$i]->Criterio  ?>-<?=  $criterios[$i]->Etiqueta  ?>"  <?php  echo  ($i == 0) ? "checked" : "";  ?>  >
    <label class="form-check-label" for="criterio">
    <?=  $criterios[$i]->Etiqueta  ?>
    </label>
</div> 
<?php ?>


<?php   }   ?>