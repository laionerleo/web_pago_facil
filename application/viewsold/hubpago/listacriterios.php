<label for="">Busquedas </label><br>
<?php for ($i=0; $i < count($criterios) ; $i++) { ?>
   
<div class="form-check">
    <input class="form-check-input" type="radio"  onclick="cambiartipodedatoimput('<?=  $criterios[$i]->Tipo  ?>' , '<?=  $criterios[$i]->Etiqueta  ?>' )"  name="criterio"
             value="<?=  $criterios[$i]->Criterio  ?>-<?=  $criterios[$i]->Etiqueta  ?>"  <?php  echo  ($i == 0) ? "checked" : "";  ?>  >
    <label class="form-check-label" for="criterio">
    <?=  $criterios[$i]->Etiqueta  ?>
    </label>
</div> 
<?php ?>


<?php   }   ?>


<script>

<?php  if (count($criterios) > 0) { ?>
        cambiartipodedatoimput('<?=  $criterios[0]->Tipo  ?>' ,'<?=  $criterios[0]->Etiqueta  ?>' )
<?php   }   ?>
    function cambiartipodedatoimput(tipodato ,Etiqueta ){
        $("#inp_dato").get(0).type = 'text';
//        $('#inp_dato').attr('placeholder', Etiqueta);
        $('#inp_dato').attr('placeholder', 'Introducir '+ Etiqueta);
        $('#lblcodigo').text(Etiqueta); 
        console.log(tipodato) ; 
        if(tipodato=="C")
        {
            $("#inp_dato").get(0).type = 'text';
        }
        else{
            $("#inp_dato").get(0).type = 'number';
        }
    }
</script>

