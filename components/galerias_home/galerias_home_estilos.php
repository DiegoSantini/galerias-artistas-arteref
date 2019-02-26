<?php
    function galerias_home_estilos(){

    $estilo = get_page_by_title('estilo', ARRAY_A);
    $estilo = $estilo['guid'];

        ?>
            <div class="col-lg-12 galerias_home_estilos">
                <h4>Encontre obras por estilo</h4>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Pessoas'; ?>">
                        <button>
                            Pessoas 
                        </button>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Paisagem'; ?>">
                    <button>
                        Paisagem 
                    </button>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Cidades'; ?>">
                    <button>
                        Cidades 
                    </button>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Abstrato'; ?>">
                    <button>
                        Abstrato 
                    </button>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Natureza'; ?>">
                    <button>
                        Natureza 
                    </button>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Folclore'; ?>">
                    <button>
                        Folclore 
                    </button>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Surrealismo'; ?>">
                    <button>
                        Surrealismo 
                    </button>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo $estilo . '&estilo=Colagem'; ?>">
                    <button>
                        Colagem 
                    </button>
                    </a>
                </div>
            </div>
        <?php
    }
?>