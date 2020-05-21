

<?php   if(count($empresas->values)>0){?>
<div class="slick-multiple  avatar-group ml-3" >
    <?php  for ($i=0; $i < count($empresas->values) ; $i++) { ?>
                
                    <figure id="emp-<?= $i ?>" class="avatar avatar-sm"  style="background-color: #FFFF;border-color:black" onclick="cambiar_empresa(<?= $empresas->values[$i]->nEmpresa  ?> , '#emp-<?= $i ?>')" >
                                <a href="#" title="<?= $empresas->values[$i]->cDescripcion ?>" data-toggle="tooltip" >
                                    <img src="<?= $empresas->values[$i]->cUrl_icon ?>" class="rounded-circle"
                                        alt="avatar">
                                </a>
                    </figure>
                
    <?php }  ?>
 </div>
 

 <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>

    <?php  }else{

    echo "No hay datos";
}    
    ?>


    
