<?php
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}
function cadastro_obras(){

    $db = new db_galeria_artista_dao();

    $data_obras = $db->get(
        'wp_galeria_artista_obras',
        array(
            'select' => "*"
        )
    );

    $data_estilos = $db->get(
        'wp_galeria_artista_obras_estilos',
        array(
            'select' => "*"
        )
    )

    ?>
    <div class="container">

    <div class="row">

    <h2>Obras</h2>

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
                        <th scope="col">Nome da obra</th>
                        <th scope="col">Artista</th>
                        <th scope="col">imagem</th>
                        <th scope="col">Descrição da obra</th>
                        <th scope="col">Acabamento da obra</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Estilos</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php
                foreach ($data_obras as $key) {
                    ?>
                        <tr scope="row">
                            <th><?php echo $key['id']; ?></th>
                            <th><?php echo $key['data']; ?></th>
                            <th><?php echo $key['nome_obra']; ?></th>
                            <th><?php echo $key['id_artista']; ?></th>
                            <th><?php echo $key['imagem_url']; ?></th>
                            <th><?php echo $key['descricao_obra']; ?></th>
                            <th><?php echo $key['acabamento_obra']; ?></th>
                            <th><?php echo $key['preco']; ?></th>
                            <th><?php echo $key['estilo_obra']; ?></th>
                        </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <div class="col-lg-6">
            <?php require_once "handle_form.php"; ?>     
                <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_obras">
                    <div class="form-group">
                        <label for="input_nome_obras">Nome</label>
                        <input name="cadastro_obras_nome" type="text" class="form-control" id="input_nome_obras" required>
                    </div>
                    <div class="form-group">
                        <label for="input_artista_obras">Artista</label>
                        <input name="cadastro_obras_artista" type="text" class="form-control" id="input_artista_obras">
                    </div>
                    <div class="form-group">
                        <label for="input_descricao_obras">Descrição</label>
                        <textarea cols="30" rows="10" name= "cadastro_obras_descricao" class="form-control" id="input_descricao_obras" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_obras_url">Obra img</label>
                        <input type="text" class="form-control" id="input_obras_url">
                    </div>
                    <div class="form-group">
                        <label for="input_acabamento_obras">Acabamento</label>
                        <input type="text" name="cadastro_obras_acabamento" class="form-control" id="input_acabamento_obras">
                    </div>

                    <div class="form-group">
                        <label for="input_preco_obras">Preço</label>
                        <input type="text" name="cadastro_obras_preco" class="form-control" id="input_preco_obras">
                    </div>
                    <div class="form-group">
                        <label for="input_estilo_obras">Estilo da Obra</label>
                        <select name="cadastro_obras_estilo" class="form-control" id="exampleFormControlSelect1">
                            <?php
                                foreach ($data_estilos as $key) {
                                   ?>
                                    <option value="<?php echo $key['estilo_obra']; ?>"><?php echo $key['estilo_obra']; ?></option>
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
    <?
}
?>