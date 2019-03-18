<?php
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}
    function cadastro_estilo(){

        $db = new db_galeria_artista_dao();

        $data_estilos = $db->get(
            'wp_galeria_artista_obras_estilos',
            array(
                'select' => "*"
            )
        );

        ?>
        <div class="container arteref_market_place_galerias">

            <div class="row">

                    <h2>Estilos</h2>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Galerias cadastradas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Estilo</th>
                                        <th scope="col">Destaque na página principal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                foreach ($data_estilos as $key) {
                                    ?>
                                        <tr scope="row">
                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo $key['estilo_obra']; ?></th>
                                            <th><?php echo $key['obra_destaque']; ?></th>
                                        </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <div class="col-lg-6">
                                    
                                <form action="#">
                                    <div class="form-group">
                                        <label for="input_nome_galeria">Nome do estilo</label>
                                        <input type="text" class="form-control" id="input_nome_galeria">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_local_galeria">Estilo deve ficar em destaque na página principal?</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Sim</option>
                                            <option>Não</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>

                            </div>

                        </div>
                    
                    </div>
            </div>
            
        </div>
        <?php
    }
?>