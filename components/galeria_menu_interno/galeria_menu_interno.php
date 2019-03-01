<?php
    function galeria_menu_interno($page_index = null){

        $sobre_galeria_url = new link_factory('galeria', array('id' => 1));
        $eventos_galeria_url = new link_factory('eventos', array('id' => 1));
        $artistas_galeria_url = new link_factory('artistas-galeria', array('id' => 1));
        $obras_galeria_url = new link_factory('trabalhos-galeria', array('id' => 1));
        $contato_galeria_url = new link_factory('contato-galeria', array('id' => 1));

        ?>

            <nav class="navbar navbar-expand-lg galeria_nav_menu_interno">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link 
                                <?php
                                    if (isset($page_index)) {
                                        if ($page_index === 'galeria') {
                                            echo 'galeria_menu_active';
                                        }
                                    }
                                ?>
                            " href="<?php echo $sobre_galeria_url->create(); ?>">
                                Sobre
                            </a>
                        </li>

                        <li>
                            |
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link
                            
                            <?php
                                if (isset($page_index)) {
                                    if ($page_index === 'eventos') {
                                        echo 'galeria_menu_active';
                                    }
                                }
                            ?>
                            " href="<?php echo $eventos_galeria_url->create(); ?>">Eventos</a>
                        </li>

                        <li>
                            |
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link
                                
                                <?php
                                    if (isset($page_index)) {
                                        if ($page_index === 'artistas') {
                                            echo 'galeria_menu_active';
                                        }
                                    }
                                ?>

                            " href="<?php echo $artistas_galeria_url->create(); ?>">Artistas</a>
                        </li>

                        <li>
                            |
                        </li>

                        <li class="nav-item">
                            <a class="nav-link
                                    
                                <?php
                                    if (isset($page_index)) {
                                        if ($page_index === 'obras') {
                                            echo 'galeria_menu_active';
                                        }
                                    }
                                ?>

                            " href="<?php echo $obras_galeria_url->create(); ?>">Obras</a>
                        </li>
                        
                        <li>
                            |
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link 
                                    
                                <?php
                                    if (isset($page_index)) {
                                        if ($page_index === 'contato') {
                                            echo 'galeria_menu_active';
                                        }
                                    }
                                ?>

                            " href="<?php echo $contato_galeria_url->create(); ?>">Contato</a>
                        </li>
                    </ul>
                </div>
            </nav>

        <?php
    }
?>