<?php
function galeria_menu(){
?>
    <nav class="navbar navbar-expand-lg galeria_nav_menu">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url( get_page_link( 42614 ) ); ?>">Sobre</a>
                </li>
                <li><span>|</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="galeria/trabalhos-galeria">Trabalhos</a>
                </li>
                <li><span>|</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="galeria/artistas-galeria">Artistas</a>
                </li>
                <li><span>|</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="galeria/contato-galeria">Contato</a>
                </li>
            </ul>
        </div>
    </nav>

<?php
}
?>