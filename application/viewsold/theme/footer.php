<footer class="content-footer">
                <div>© PagoFacil Bolivia - <a href="http://laborasyon.com/" target="_blank"></a></div>
                <div>
                    <nav class="nav">
                       
                        <?php
                            if(isset($metodosdepago)){
                        for ($i=0; $i < count($metodosdepago) ; $i++) {?>
                            <a href="#" class="nav-link"><img style=" height:25px; width:45px; position: relative;" src="<?=  @$metodosdepago[$i]->url_icon ?>" alt=""><a>
                        <?php  }}
                         ?>
                    </nav>
                </div>
    
</footer>