<?php
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}
function cadastro_artistas(){

        $db = new db_galeria_artista_dao();

        $data_artistas = $db->get(
            'wp_galeria_artista',
            array(
                'select' => "*"
            )
        );
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $db = new db_galeria_artista_dao();
            $data_artista = $db->get(
                'wp_galeria_artista',
                array(
                    'select' => '*',
                    'campo'  => 'id',
                    'id'     => $id
                     )   
                );  

                aba_edicao_artista($data_artista);
            }else{
                aba_cadastro_artista($data_artistas);
            }    
    }
    function sim_nao($status){
     if($status == "1"){
         return 'Ativo';
     }else{
         return 'Inativo';
     }   
    }
function aba_cadastro_artista($data_artistas){
    ?>
    <div class="container arteref_market_place_galerias">

        <div class="row">

                <h2>Galerias</h2>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Artistas cadastrados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Adicionar artistas</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Data do cadastro</th>
                                    <th scope="col">Nome do artista</th>
                                    <th scope="col">Biografia</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php
                            foreach ($data_artistas as $key) {
                                ?>
                                    <tr scope="row">
                                   
                                        <th><?php echo $key['id']; ?></th>
                                        <th><?php echo $key['data']; ?></th>
                                        <th><?php echo $key['nome_artista']; ?></th>
                                        <th><?php echo $key['biografia']; ?></th>
                                        <th><?php echo sim_nao($key['ativo']); ?></th>
                                        <th><a class="btn btn-primary" href="admin.php?page=paginas_artistas&id=<?php echo $key['id'];?>&ativo=<?php echo $key['ativo'];?>" role="button" >Editar</a></th> 
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
                            <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_artista">
                                <div class="form-group">
                                    <label for="input_nome_galeria">Nome</label>
                                    <input name="cadastro_artista_nome" type="text" class="form-control" id="input_nome_artista">
                                </div>
                                <div class="form-group">
                                    <label for="input_local_galeria">Biografia</label>
                                    <textarea name="cadastro_artista_biografia" cols="30" rows="10" class="form-control" id="input_local_galeria"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="input_descricao_galeria">Status</label>
                                    <select name="cadastro_artista_ativo" class="form-control" id="exampleFormControlSelect1">
                                            <option value = "1">Ativo</option>
                                            <option>Inativo</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
                </div>
        </div>
        
    </div>
<?php
}
function aba_edicao_artista($data_artista){
    ?>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

    <div class="col-lg-6">
    <?php require_once "handle_form.php"; ?> 
    <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_artista"> 
        <div class="form-group">
            <label for="input_nome_galeria">Nome</label>
            <input name="editar_artista_nome" type="text" class="form-control" id="input_nome_artista" value= "<?php echo $data_artista[0]['nome_artista']?>">
        </div>
        <div class="form-group">
            <label for="input_local_galeria">Biografia</label>
            <textarea name="editar_artista_biografia" cols="30" rows="10" class="form-control" id="input_local_galeria" value="<?php echo $data_artista[0]['biografia']?>" ><?php echo $data_artista[0]['biografia']?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="input_descricao_galeria">Status</label>
            <select name="editar_artista_ativo" class="form-control" id="exampleFormControlSelect1">
                    <?php 
        if(isset($_GET['ativo'])){ 
                $ativo = $_GET['ativo'];
                if($ativo == "1"){
                    ?>
                    <option value = "1" selected>Ativo</option>
                    <option value="0">Inativo</option>
                    <?php
                }else{
                    ?>
                    <option value = "1">Ativo</option>
                    <option value = "0" selected>Inativo</option>
                    <?php
                }
        } 
        ?>
            </select>
        </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                
            </form>
        </div>
    </div>
<?php
}
?>