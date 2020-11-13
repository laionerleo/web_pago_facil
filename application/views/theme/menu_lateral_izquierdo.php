<div class="navigation">
            <div class="navigation-menu-tab">
                <ul>
                 
                    <li>
                        <a href=""  data-toggle="tooltip" data-placement="right" title="Pago Rapido"
                           data-nav-target="#pago_rapido">
                            <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/pago_rapido.png"  alt="">
                            
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="cargarempresaspagadas()" data-toggle="tooltip"
                           data-placement="right" title="Pagos realizados" data-nav-target="#pagos_realizados">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/pagadas_y_frecuentes.png"  alt="">
                           
                        </a>
                    </li>
                    
                    <li>
                        <a href="#" data-toggle="tooltip"
                           data-placement="right" title="recargas telefonicas" data-nav-target="#recargas_realizadas">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/recarga.png"  alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="cargarallempresas()" data-toggle="tooltip"
                           data-placement="right" title="Empresas afiliadas" data-nav-target="#Empresas_afiliadas">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/empresas_afiliadas.png"  alt="">
                        </a>
                    </li>
                    
                    <li>
                        <a href="#" data-toggle="tooltip"
                           data-placement="right" title="Puntos de cobranza" data-nav-target="#puntos_de_cobranza">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/punto_de_cobranza.png"  alt="">
                        </a>
                    </li>
                    
                    <li>
                        <a href="#" data-toggle="tooltip"
                           data-placement="right" title="Atencion al cliente" data-nav-target="#Atencion_al_cliente">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/atencion_al_cliente.png"  alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="cargarmetodosdepago()" data-toggle="tooltip"
                           data-placement="right" title="metodos de pago" data-nav-target="#Metodos_de_pago">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/metodos_pago.png"  alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="cargarpagofacilentubarrio()" data-toggle="tooltip"
                           data-placement="right" title="Pago facil en tu barrio" data-nav-target="#pago_facil_tu_barrio">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/punto_pago_facil.png"  alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip"
                           data-placement="right" title="Sugerir empresas" data-nav-target="#sugerir_empresas">
                           <img style="width:45px" src="<?=  base_url() ?>/application/assets/assets/media/logomenu/sugerencia_empresas.png"  alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navigation-menu-body">
                <div class="navigation-menu-group">
                   
                    <div id="pago_rapido">
                        <ul>
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> Pago rapido
                            </li>
                            <li>
                                <a class="active" href="<?=$url?>pagorapido">Pago rapido </a>
                            </li>
                       
                        </ul>
                    </div>
                    <div id="pagos_realizados">
                        <ul id="listarubros">
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> pagos realizados
                            </li>
                            <li>
                                    <div id="spinerrealizados" class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                            </li>
                            
                          

                       
                        </ul>
                    </div>
                    <div id="recarga_telefonica">
                        <ul>
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> Pago rapido
                            </li>
                            <li>
                                <a  href="<?=$url?>endesarrollo" >Pago rapido </a>
                            </li>
                       
                        </ul>
                    </div>
                    <div id="Empresas_afiliadas">
                      
                        <ul id="listarubrosempresasafiliadas">
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> Empresas Afiliadas
                            </li>
                            <li>
                            <div id="spinerafiliadas" class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>

                            </li>
                            
                       
                        </ul>
                    </div>
                    <div id="puntos_de_cobranza">
                        <ul>
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> Puntos de cobranza
                            </li>
                            <li>
                                <a  href="<?=$url?>puntosdecobranza">Puntos de Cobranza </a>
                            </li>
                       
                        </ul>
                    </div>
                    <div id="Atencion_al_cliente">
                        <ul>
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> Atencion al cliente
                            </li>
                            <li>
                                <a  href="<?=$url?>atencionmetodopago">Atencion al cliente metodos de pago </a>
                            </li>
                            <li>
                                <a  href="<?=$url?>endesarrollo">Atencion al cliente empresa de servicio  </a>
                            </li>
                            <li>
                            <a href="#">Atencion al cliente App pago facil bolivia</a>
                                <ul>
                                    <li>
                                        <a href="<?=$url?>endesarrollo">Sugerir Cambios</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>endesarrollo">Sugerir empresa</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>endesarrollo">  Reclamos/ quejas /Consulta</a>
                                    </li>
                                </ul>

                            </li>
                       


                            <li>
                                <a  href="<?=$url?>endesarrollo" >Mis reclamos y sugerencia</a>
                            </li>

                       
                       
                        </ul>
                    </div>
                    <div id="Metodos_de_pago">
                        <ul  id="listametodosdepago">
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> Metodos de pago
                            </li>
                            <li>
                                    <div id="spinermetodosdepago" class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                            </li>
                            
                       
                        </ul>
                      
                    </div>
                    <div id="pago_facil_tu_barrio">
                        <ul id="listapuntosdecobranza">
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> PagoFacil en tu barrio
                            </li>
                            <center>
                                <div id="spinerpagofacil" class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                            </center>   

                            </li>
                            
                            
                           
                        </ul>
                    </div>
                    <div id="sugerir_empresa">
                        <ul>
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="mr-2" data-feather="copy"></i> Sugerir empresas
                            </li>
                            <li>
                                <a  href="<?=$url?>endesarrollo"> Sugerir empresas </a>
                            </li>
                       
                        </ul>
                    </div>





                </div>
            </div>
        </div>
        <script>
   
        </script>