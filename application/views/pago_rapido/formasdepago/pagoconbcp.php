
                <div class="content" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                
                                    <div class="card">
                                        <img src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_soli.png" class="card-img-top" alt="...">
                                        <div class="card-body text-center m-t-70-minus">
                                    
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Monto:</div>
                                            <div class="col-6">28366 </div>
                                        </div>
                                        <div class="row mb-2">
                                        <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                            id="exampleRadios4" value="option1" >
                                                    <label class="form-check-label" for="exampleRadios4">
                                                    <img  id="img-<?=  $metodospago[$i]->url_icon ?>" style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/bcp_pago_debito.png" class="img-fluid" alt="<?=  $metodospago[$i]->nombreMetodoPago ?>">    
                                                    </label>
                                                </div>

                                        </div>
                                            <p class="text-muted">Web Developer</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repudiandae eveniet
                                                harum.</p>
                                            <a href="#" class="btn btn-outline-primary">
                                                <i class="mr-2" data-feather="edit-2"></i> Edit Profile
                                            </a>
                                        </div>
                                        <hr class="m-0">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-4 text-info">
                                                    <h4 class="font-weight-bold">291</h4>
                                                    <span>Post</span>
                                                </div>
                                                <div class="col-4 text-success">
                                                    <h4 class="font-weight-bold">10.596</h4>
                                                    <span>Followers</span>
                                                </div>
                                                <div class="col-4 text-warning">
                                                    <h4 class="font-weight-bold">7.896</h4>
                                                    <span>Likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <center><button class="btn btn-primary"  onclick="vistaconfirmacion()"> Siguiente</button></center>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
<!-- begin::footer -->

    <?php $this->load->view('theme/footer');  ?>
<!-- end::footer -->
      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>


 