<div class="sidebar" id="user-menu">
        <div class="py-4 text-center" data-backround-image="<?=  base_url() ?>/application/assets/assets/media/image/image1.jpg">
            <figure class="avatar avatar-lg mb-3 border-0">
                
            </figure>
            <h5 class="d-flex align-items-center justify-content-center"><?= $_SESSION['nombre']." ".$_SESSION['apellido'] ?></h5>
            <div>
            
            </div>
        </div>
        <div class="card mb-0 card-body shadow-none">
            <div class="mb-4">
                <div class="list-group list-group-flush">
                    <a href="<?= base_url();  ?>es/logout" class="list-group-item p-l-r-0">logout</a>
                    
                </div>
            </div>
            
        </div>
    </div>