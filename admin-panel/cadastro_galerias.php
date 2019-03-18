<?php
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}
    function cadastro_galerias(){

        $db = new db_galeria_artista_dao();

        $data_galerias = $db->get(
            'wp_galerias',
            array(
                'select' => "*"
            )
        );

        ?>
        <div class="container arteref_market_place_galerias">

            <div class="row">

                    <h2>Galerias</h2>

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
                                        <th scope="col">Data do cadastro</th>
                                        <th scope="col">Nome da galeria</th>
                                        <th scope="col">Local</th>
                                        <th scope="col">Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                foreach ($data_galerias as $key) {
                                    ?>
                                        <tr scope="row">
                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo $key['data']; ?></th>
                                            <th><?php echo $key['nome_galeria']; ?></th>
                                            <th><?php echo $key['local']; ?></th>
                                            <th><?php echo $key['descricao_galeria']; ?></th>
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
                                        <label for="input_nome_galeria">Nome</label>
                                        <input type="text" class="form-control" id="input_nome_galeria">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_local_galeria">Local</label>
                                        <input type="text" class="form-control" id="input_local_galeria">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_descricao_galeria">Descrição</label>
                                        <textarea cols="30" rows="10" class="form-control" id="input_descricao_galeria"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Logo URL</label>
                                        <input type="text" class="form-control" id="input_logo_url">
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