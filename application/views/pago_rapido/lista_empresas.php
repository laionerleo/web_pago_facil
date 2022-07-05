
   <style>
        .flotante {
            display:scroll;
            position:fixed;

            right:0px;
        }
    </style>



<?php   foreach ($empresasaccesodirecto as $key => $value) {  ?>
        <a  onclick="cambiar_empresa(<?= $value->Empresa ?> , '#emp-<?= $key ?>'  ,null,'<?=  $value->Url_Icon ?>', '<?=  $value->Descripcion ?>' )" class='flotante' style=" top:  <?= ( $key +1) *80 ?>px;" href="#" ><img onmouseover="bigImg(this ,  '<?= $value->Descripcion ?>' , <?= $key ?> )" onmouseout="normalImg(this ,'<?= $value->Descripcion ?>' , <?= $key ?> )"  style=" object-fit: contain;  border-radius: 100px;" width="60px"  height="70px"  src='<?= $value->Url_Icon ?>' /> <br> <label id="btnflotante<?= $key ?>"  for=""></label> </a>
<?php  
 }

?>
    
<script>
    
    function bigImg(x , nombreempresa , Position) {
        x.style.height = "80px";
        x.style.width = "90px";
        console.log(nombreempresa);
        $("#btnflotante"+Position).text(nombreempresa);
    }

    function normalImg(x ,nombreempresa , Position ) {
        x.style.height = "60px";
        x.style.width = "70px";
        $("#btnflotante"+Position).text("");
    } 

    $(document).ready( function () {
        
//      var  myTable =  $('#example1').DataTable();
     

        
          // 2d array is converted to 1D array
        // structure the actions are 
        // implemented on EACH column
        /*
      
     myTable
          .columns()
          .flatten()
          .each(function (colID) {
  
            // Create the select list in the
            // header column header
            // On change of the list values,
            // perfom search oper/ation
            console.log(colID);
            
  
            // Get the search cached data for the
            // first column add to the select list
            // usinh append() method
            // sort the data to display to user
            // all steps are done for EACH column
              if(colID==2)
              {
                var mySelectList = $("<select class=' form-control selectbusquedatipo'  />")
              .appendTo(myTable.column(colID).header())
              .on("change", function () {
                myTable.column(colID).search($(this).val());
  
                // update the changes using draw() method
                myTable.column(colID).draw();
              });
              var laTipoEmpresa = new Array();
              mySelectList.append(
                        $('<option   value="">  Todos  </option>"')
                        );
                myTable
                .column(colID)
                .cache("search")
                .sort()
                .each(function (param) {
                    if(laTipoEmpresa.indexOf( param ) <0 )
                    {

                        mySelectList.append(
                        $('<option   value="' + param + '">'
                            + param + "</option>")
                        );
                        laTipoEmpresa.push(param);
                    }
                  

                });
              }

          });
          */
          
     

    } );
</script>



    