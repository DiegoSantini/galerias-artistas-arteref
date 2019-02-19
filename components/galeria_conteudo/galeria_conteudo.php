<?php
    function galeria_conteudo($data_galeria){
        
        if ($data_galeria != null) {
            $descricao_galeria = $data_galeria[0]['descricao_galeria'];
        }else{
            $descricao_galeria = 'Photoarts possui um conhecimento único na seleção e curadoria de imagens em alta qualidade que mostram o trabalho artístico de cada um de seus fotógrafos. Este serviço de excelência está voltado a resolver as necessidades do cliente desde a escolha até a colocação das obras de arte. Com um laboratório próprio a Photoarts produz impressões e acabamentos de alta qualidade usada pelas mais prestigiadas galerias e museus por um preço acessível.';
        }
        ?>
        <div class='galeria_conteudo'>

            <div class="col-lg-6">
                <div class='galeria_conteudo_titulo'>
                    <h4>Sobre</h4>
                </div>
                <p>
                    <?php echo $descricao_galeria; ?>
                </p>
            </div>
            <!--
            <div class="col-lg-6 galeria_conteudo_estilos">
                <div class='galeria_conteudo_titulo'>
                    <h4>Estilos</h4>
                </div>
                <ul>
                        <li>Abstrato</li>
                        <li>Natureza</li>
                    
                        <li>Arquitetura</li>
                </ul>
            </div>
            -->
        </div>
        <?php
    }
?>