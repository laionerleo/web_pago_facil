<center>
<div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">
                        Datos del usuario
                    </h6>
                    <div class="row">
                        <div class="col-md-8">
                            <form id="form_login">
                            <div class="form-group">
                                    <label for="exampleInputPassword1">Nombre </label>
                                    <input type="text" class="form-control" name="inpnombre" id="inpnombre"
                                           placeholder="Nombre" value="<?= $nombre ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Apellido</label>
                                    <input type="text" class="form-control" id="inpapellido" name="inpapellido"
                                           placeholder="" value="<?= $apellido ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Direccion</label>
                                    <input type="text" class="form-control" id="inpdireccion" name="inpdireccion"
                                           placeholder="" value="<?= $direccion ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nro de celular de cuenta de usuario</label>
                                    <input type="number" class="form-control" id="inpnumero" name="inpnumero"
                                           placeholder="" pattern="^[0-9]+" min="0"  value="<?= $telefono ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">C.I o N.I.T de cliente </label>
                                    <input type="number" class="form-control" id="inpcinit" name="inpcinit"
                                           placeholder="" value="<?= $cinit ?>" >
                                </div>
                                <div class="form-group">
                                    <label for=""> Nombre o Razòn social  </label>
                                    <input type="text" class="form-control" id="inprazon" name="inprazon"
                                           placeholder="" value="<?= $facturaa ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="">Nro de celular de pago </label>
                                    <input type="number" class="form-control" id="inpnumeropago" name="inpnumeropago"
                                           placeholder=""  pattern="^[0-9]+" min="0" value="<?= $telefonoDePago ?>" >
                                </div>
                                <input type="hidden" id="url" name="url" value="<?= $url ?>">
                                    <p style="color: red;"><?= @$mensajetelefono  ?></p>
                                    <br>

                                <button type="button" onclick="actualizardatos()" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
        </div>
</div>                    
</center>
<script>
    function actualizardatos()
    {
            var datos=$("#form_login").serialize();
			var urlajax=$("#url").val()+"actualizardatos";   
            
            $.ajax({                    
                url: urlajax,
                data: {datos},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {   
                    //$("#waitLoadinglogin").fadeIn(1000);
                },                    
                success:function(response) {
                
                console.log(response);
                if(response.tipo==10)
                        {
                            swal("Mensaje", response.mensaje , "success");
                            vistaprepararpago();
                            
                        }
                        if(response.tipo==1)
                        {
                            swal("Mensaje", response.mensaje , "error");
                         
                            //$("#confirmarpago").click();
                        }
                    
                },
                error: function (data) {
                    console.log(data);
                    alert(data.responseText);
                    //$("#mensaje").text('usuario o contraseña incorrectos');
                  
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                },
            }
            ); 
    }
</script>