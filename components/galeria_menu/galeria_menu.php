<?php
function galeria_menu(){

    $galerias_url = new link_factory('galerias');
    $revista_url = new link_factory('home');

?>
    <div class="col-lg-12">

        <div class="col-lg-6 galeria_artista_nav_img">
            <img src="https://arteref.com/wp-content/uploads/2018/06/arteref.jpg" alt="">
        </div>

        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg galeria_nav_menu">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $galerias_url->create(); ?>">Galerias</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $revista_url->create(); ?>">Revista</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Museus</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    </div>

<?php
}
?>