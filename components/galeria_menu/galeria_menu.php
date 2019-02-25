<?php
function galeria_menu(){

    $galeria = get_page_by_title('galeria', ARRAY_A);
    $galeria_url = $galeria['guid'];
    

    $galerias = get_page_by_title('galerias', ARRAY_A);
    $galerias_url = $galerias['guid'];

    $revista_url = get_home_url();

    $museus = get_page_by_title('museus', ARRAY_A);
    $museus_url = $galerias['guid'];
?>
    <nav class="navbar navbar-expand-lg galeria_nav_menu">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $galerias_url; ?>">Galerias</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $revista_url; ?>">Revista</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#" unable>Museus</a>
                </li>
            </ul>
        </div>
    </nav>

<?php
}
?>