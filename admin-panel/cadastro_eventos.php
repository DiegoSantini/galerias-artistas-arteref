<?php
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}
    function cadastro_eventos(){

        $db = new db_galeria_artista_dao();

        $data_eventos = $db->get(
            'wp_galeria_eventos',
            array(
                'select' => "*"
            )
        );

        $data_obras = $db->get(
            'wp_galeria_artista_obras',
            array(
                'select' => "*"
            )
        );

        $data_galerias = $db->get(
            'wp_galerias',
            array(
                'select' => "*"
            )
        );

        ?>
        <div class="container arteref_market_place_galerias">

            <div class="row">

                    <h2>Eventos</h2>

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
                                        <th scope="col">Galeria</th>
                                        <th scope="col">Nome do evento</th>
                                        <th scope="col">Data do cadastro</th>
                                        <th scope="col">Imagem destaque</th>
                                        <th scope="col">Local</th>
                                        <th scope="col">Data de incio</th>
                                        <th scope="col">Data do término</th>
                                        <th scope="col">Descrição resumida</th>
                                        <th scope="col">Descrição completa</th>
                                        <th scope="col">Obras em exposição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                foreach ($data_eventos as $key) {
                                    ?>
                                        <tr scope="row">
                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo $key['id_galeria']; ?></th>
                                            <th><?php echo $key['nome_evento']; ?></th>
                                            <th><?php echo $key['data']; ?></th>
                                            <th><?php echo $key['url_img_destaque']; ?></th>
                                            <th><?php echo $key['local']; ?></th>
                                            <th><?php echo $key['data_inicio']; ?></th>
                                            <th><?php echo $key['data_termino']; ?></th>
                                            <th><?php echo $key['descricao_resumida']; ?></th>
                                            <th><?php echo $key['descricao_completa']; ?></th>
                                            <th><?php echo $key['obras']; ?></th>
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
                                        <label for="input_nome_galeria">Nome do evento</label>
                                        <input type="text" class="form-control" id="input_nome_galeria">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_local_galeria">Imagem destaque</label>
                                        <input type="text" class="form-control" id="input_local_galeria">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_descricao_galeria">Local</label>
                                        <textarea cols="30" rows="10" class="form-control" id="input_descricao_galeria"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Data do inicio</label>
                                        <input type="text" class="form-control" id="input_logo_url">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Data do termino</label>
                                        <input type="text" class="form-control" id="input_logo_url">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Descricao resumida</label>
                                        <textarea cols="30" rows="10" class="form-control" id="input_descricao_galeria"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Descricao completa</label>
                                        <textarea cols="30" rows="10" class="form-control" id="input_descricao_galeria"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Obras</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                                foreach ($data_obras as $key) {
                                                   ?>
                                                        <option value="<?php echo $key['nome_obra']; ?>"><?php echo $key['nome_obra']; ?></option>
                                                   <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Galeria</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                                foreach ($data_galerias as $key) {
                                                   ?>
                                                        <option value="<?php echo $key['nome_galeria']; ?>"><?php echo $key['nome_galeria']; ?></option>
                                                   <?php
                                                }
                                            ?>
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