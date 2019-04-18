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
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $db = new db_galeria_artista_dao();
            $data_galeria = $db->get(
                'wp_galerias',
                array(
                    'select' => '*',
                    'campo'  => 'id',
                    'id'     => $id
                     )   
                );  

                aba_edicao($data_galeria);
            }else{
                aba_cadastro($data_galerias);
            }
        
    }
    function exibe_imagem_logo($id_imagem){
        $lpi=new recupera_imagem_por_id();
        $logo_url=$lpi->init($id_imagem, 'Medium size');
        return $logo_url;
    } 

function aba_cadastro($data_galerias){
    ?>
    <div class="container arteref_market_place_galerias">

        <div class="row">

                <h2>Galerias</h2>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Galerias cadastradas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Adicionar galerias</a>
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
                    <th scope="col">Logo</th>
                    <th scope="col">Opções</th>
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
                            <th><img src="<?php  print_r( exibe_imagem_logo($key['logo_url'])[0] ); ?>" alt=""></th>
                            <th><a  class="btn btn-primary" href="admin.php?page=galerias_artistas&id=<?php echo $key['id'];?>" role="button" >Editar</a></th>  
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
                            <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_galeria" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="input_nome_galeria">Nome</label>
                                    <input name="cadastro_galeria_nome" type="text" class="form-control" id="input_nome_galeria" required>
                                </div>
                                <div class="form-group">
                                    <label for="input_local_galeria">Local</label>
                                    <input name="cadastro_galeria_local" type="text" class="form-control" id="input_local_galeria" required>
                                </div>
                                <div class="form-group">
                                    <label for="input_descricao_galeria">Descrição</label>
                                    <textarea cols="30" rows="10" name="cadastro_galeria_descricao" class="form-control" id="input_descricao_galeria" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="input_logo_url">Logo</label>
                                    <!-- <input name="cadastro_galeria_logo" type="text" class="form-control" id="input_logo_url"> -->
                                    <input type="file" name="file" accept="image/*"> 
                                </div>
                                <button type="submit" class="btn btn-primary" name="upload">Add</button>
                            </form>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                </div>
                </div>
        </div>
        
    </div>
<?php
}
function aba_edicao($data_galeria){
    ?>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <div class="col-lg-6">
            <?php require_once "handle_form.php"; ?>
            <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_galeria" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input_nome_galeria">Nome</label>
                    <input name="editar_galeria_nome" type="text" class="form-control" id="input_nome_galeria" value="<?php echo $data_galeria[0]['nome_galeria']?>">
                </div>
                <div class="form-group">
                    <label for="input_local_galeria">Local</label>
                    <input name="editar_galeria_local" type="text" class="form-control" id="input_local_galeria" value="<?php echo $data_galeria[0]['local']?>">
                </div>
                <div class="form-group">
                    <label for="input_descricao_galeria">Descrição</label>
                    <textarea cols="30" rows="10" name="editar_galeria_descricao" class="form-control" id="input_descricao_galeria" ><?php echo $data_galeria[0]['descricao_galeria']?>
                    </textarea>
                </div>
                <div class="form-group">
                <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                    <label for="input_logo_url">Logo</label>
                    <input type="file" name="file" accept="image/*"> 
                    <button type="submit" class="btn btn-primary" name="upload">Salvar</button>
               </form>
                </div>
                <!-- <button type="submit" class="btn btn-primary" name="upload">Salvar</button> -->
            </form>
        </div>

    </div>
<?php
}
?>