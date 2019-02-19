<?php
    function galeria_menu_interno(){
        $sobre_galeria = get_page_by_title('galeria', ARRAY_A);
        $sobre_galeria_url = $sobre_galeria['guid'];

        $eventos_galeria = get_page_by_title('eventos', ARRAY_A);
        $eventos_galeria_url = $eventos_galeria['guid'];

        $artistas_galeria = get_page_by_title('artistas-galeria', ARRAY_A);
        $artistas_galeria_url = $artistas_galeria['guid'];

        $obras_galeria = get_page_by_title('trabalhos-galeria', ARRAY_A);
        $obras_galeria_url = $obras_galeria['guid'];

        $contato_galeria = get_page_by_title('contato-galeria', ARRAY_A);
        $contato_galeria_url = $contato_galeria['guid'];

        ?>

            <nav class="navbar navbar-expand-lg galeria_nav_menu_interno">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="<?php //echo esc_url( get_page_link( 45161 ) ); ?>">Sobre</a>
                        </li>
                        -->
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $sobre_galeria_url . '&id=1'; ?>">Sobre</a>
                        </li>

                        <li>
                            |
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $eventos_galeria_url; ?>">Eventos</a>
                        </li>

                        <li>
                            |
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $artistas_galeria_url; ?>">Artistas</a>
                        </li>

                        <li>
                            |
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $obras_galeria_url; ?>">Obras</a>
                        </li>
                        
                        <li>
                            |
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $contato_galeria_url; ?>">Contato</a>
                        </li>
                    </ul>
                </div>
            </nav>

        <?php
    }
?>