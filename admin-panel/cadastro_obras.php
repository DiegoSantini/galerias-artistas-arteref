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
            'select'=>"*",
            // 'campo'=>"estilo_obra",
            // 'id'=>$id
        )
    );
    $data_artistas = $db->get(
        'wp_galeria_artista',
        array(
            'select' => "*",
        )
);

    // $data_estilos = $db->get(
    //     'wp_galeria_artista_obras_estilos',
    //     array(
    //         'select' => "*"
    //     )
    //     );
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $db = new db_galeria_artista_dao();
            $data_obra = $db->get(
                'wp_galeria_artista_obras',
                array(
                    'select' => '*',
                    'campo'  => 'id',
                    'id'     => $id
                     )   
                );  
                $data_estilo = $db->get(
                'wp_galeria_artista_obras_estilos',
                array(
                    'select' => "*",
                )
            );
            $data_artista = $db->get(
                'wp_galeria_artista',
                array(
                    'select' => "*",
                )
        );
                aba_edicao_obras($data_obra, $data_estilo,$data_artista);
            }else{
                aba_cadastro_obras($data_obras,$data_estilos,$data_artistas);
            }
        }

        function exibe_nome($id_estilo){ 
        $epi=new recupera_nome_estilo_por_id();
        $nome_estilo=$epi->init($id_estilo);
        // var_dump($nome_estilo);
        foreach ($nome_estilo as $key ) {
            echo $key . " - " ;
        }
        }

        function exibe_nome_artista($id_artista){
            $api= new recupera_nome_artista_por_id();
            $nome_artista=$api->init($id_artista);
          //   var_dump($nome_obra);
          foreach ($nome_artista as $key ) {
              echo $key . " ";
          } 
        }

        function exibe_imagem_obra($id_imagem){
            $ipi=new recupera_imagem_por_id();
            $imagem_url=$ipi->init($id_imagem, 'thumbnail');
            return $imagem_url;
        } 
    

    function aba_cadastro_obras($data_obras,$data_estilos,$data_artistas){
        ?>
    <div class="container">

    <div class="row">

    <h2>Obras</h2>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Obras cadastradas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Adicionar obras</a>
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
                        <th scope="col">Imagem</th>
                        <th scope="col">Descrição da obra</th>
                        <th scope="col">Acabamento da obra</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Estilos</th>
                        <th scope="col">Opções</th>
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
                            <th><?php echo exibe_nome_artista($key ['id_artista'] ); ?></th>
                            <th><img src="<?php  print_r( exibe_imagem_obra($key['imagem_url'])[0] ); ?>" alt=""></th> 
                            <!-- <th><img src=" <?php //echo $key['imagem_url']; ?>" alt="#" width="100px"></th> -->
                            <th><?php echo $key['descricao_obra']; ?></th>
                            <th><?php echo $key['acabamento_obra']; ?></th>
                            <th><?php echo $key['preco']; ?></th>
                            <th><?php echo exibe_nome($key ['estilo_obra'] );?></th>
                            <th><a class="btn btn-primary" href="admin.php?page=galerias_obras&id=<?php echo $key['id']; ?>" role="button">Editar</a></th> 
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
                <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_obras" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input_nome_obras">Nome</label>
                        <input name="cadastro_obras_nome" type="text" class="form-control" id="input_nome_obras" required>
                    </div>
                    <div class="form-group">
                        <label for="input_artista_obras">Artista</label>
                        <select name="cadastro_obras_artista" class="form-control" id="exampleFormControlSelect1">
                            <?php
                                foreach ($data_artistas as $key) {
                                   ?>
                                    <option value="<?php echo $key['id']; ?>"><?php echo $key['nome_artista']; ?></option>
                                   <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_descricao_obras">Descrição</label>
                        <textarea cols="30" rows="10" name= "cadastro_obras_descricao" class="form-control" id="input_descricao_obras" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_obras_url">Obra img</label>
                        <!-- <input name="cadastro_obras_img" type="text" class="form-control" id="input_obras_url"> -->
                        <input type="file" name="file" accept="image/*"> 
                    </div>
                    <div class="form-group">
                        <label for="input_acabamento_obras">Acabamento</label>
                        <input type="text" name="cadastro_obras_acabamento" class="form-control" id="input_acabamento_obras">
                    </div>

                    <div class="form-group">
                        <label for="input_preco_obras">Preço</label>
                        <input type="text" name="cadastro_obras_preco" class="form-control" id="input_preco_obras" >
                    </div>
                    <div class="form-group">
                        <label for="input_estilo_obras">Estilo da Obra</label>
                        <select name="cadastro_obras_estilo" class="form-control" id="exampleFormControlSelect1">
                        <?php
                            foreach ($data_estilos as $key) {
                                ?>
                                    <option value="<?php echo $key['id'] ?>"><?php echo $key['estilo_obra'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="upload">Add</button>
                </form>

            </div>
        </div>
        </div>
        <?php
    }
    function aba_edicao_obras($data_obra, $data_estilo, $data_artista){
        ?>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <div class="col-lg-6">
        <?php require_once "handle_form.php"; ?>     
            <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_obras" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input_nome_obras">Nome</label>
                    <input name="editar_obras_nome" type="text" class="form-control" id="input_nome_obras" value="<?php echo $data_obra[0]['nome_obra']?>" required>
                </div>
                <div class="form-group">
                    <label for="input_artista_obras">Artista</label>
                    <!-- <input name="editar_obras_artista" type="text" class="form-control" id="input_nome_obras" value="<?php echo exibe_nome_artista($datat_obra ['id_artista'] ); ?>"> -->
                    <!-- <select name="editar_obras_artista[]" class="form-control" id="exampleFormControlSelect1"> -->
                    <select name="editar_obras_artista" class="form-control" id="exampleFormControlSelect1">
                         <?php
                            foreach ($data_artista as $key) {
                                ?>
                                    <!-- <option value="<?php //echo $key['id']?>"><?php echo $key['nome_artista'] ?></option> -->
                                    <option value="<?php echo $key['id']?>"><?php echo $key['nome_artista'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input_descricao_obras">Descrição</label>
                    <textarea cols="30" rows="10" name= "editar_obras_descricao" class="form-control" id="input_descricao_obras" value="<?php echo $data_obra[0]['descricao_obra']?>"><?php echo $data_obra[0]['descricao_obra']?></textarea>
                </div>
                <div class="form-group">
                    <label for="input_acabamento_obras">Acabamento</label>
                    <input type="text" name="editar_obras_acabamento" class="form-control" id="input_acabamento_obras"value="<?php echo $data_obra[0]['acabamento_obra']?>">
                </div>

                <div class="form-group">
                    <label for="input_preco_obras">Preço</label>
                    <input type="text" name="editar_obras_preco" class="form-control" id="input_preco_obras"value="<?php echo $data_obra[0]['preco']?>">
                </div>
                <div class="form-group">
                    <label for="input_estilo_obras">Estilo da Obra</label>
                    <!-- <select multiple name="editar_obras_estilo[]" class="form-control" id="exampleFormControlSelect1"> -->
                    <select name="editar_obras_estilo" class="form-control" id="exampleFormControlSelect1">
                        <?php
                            foreach ($data_estilo as $key) {
                                ?>
                                    <option value="<?php echo $key['id'] ?>"><?php echo $key['estilo_obra'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
        <div class="form-group">
            <label for="input_obras_url">Imagem Obra</label>
                    <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                         <input type="file" name="file" accept="image/*"> 
                         <button type="submit" class="btn btn-primary" name="upload">Salvar</button>
                    </form>     
        </div>
        </form>
        </div>
            <!-- <button type="submit" class="btn btn-primary" >Salvar</button> -->
    </div>
    <?
}
?>