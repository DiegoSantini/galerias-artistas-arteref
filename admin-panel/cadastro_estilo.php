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
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $db = new db_galeria_artista_dao();
            $data_estilo = $db->get(
                'wp_galeria_artista_obras_estilos',
                array(
                    'select' => '*',
                    'campo'  => 'id',
                    'id'     => $id
                     )   
                );  
                aba_edicao_estilos($data_estilo);
        }else{
                aba_cadastro_estilos($data_estilos);
            }
    }

    function sim_nao_destaque($status){
        if($status == "1"){
            return 'Sim';
        }else{
            return 'Não';
        }   
    }

        function aba_cadastro_estilos($data_estilos){
        ?>

        <div class="container arteref_market_place_galerias">

            <div class="row">

                    <h2>Estilos</h2>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Estilos cadastrados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Adicionar estilos</a>
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
                                        <th scope="col">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                foreach ($data_estilos as $key) {
                                    ?>
                                        <tr scope="row">
                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo $key['estilo_obra']; ?></th>
                                            <th><?php echo sim_nao_destaque($key['obra_destaque']); ?></th>
                                            <th><a class="btn btn-primary" href="admin.php?page=galerias_estilos&id=<?php echo $key['id']; ?>&ativo=<?php echo $key['obra_destaque'];?>" role="button">Editar</a></th>
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
                            <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_estilo">
                                    <div class="form-group">
                                        <label for="input_nome_galeria">Nome do estilo</label>
                                        <input name="cadastro_estilo_obra_nome" type="text" class="form-control" id="input_nome_galeria" >
                                    </div>
                                    <div class="form-group">
                                        <label for="input_local_galeria">Estilo deve ficar em destaque na página principal?</label>
                                        <select name="cadastro_estilo_destaque" class="form-control" id="exampleFormControlSelect1">
                                            <option value = "1">Sim</option>
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
    function aba_edicao_estilos($data_estilo){
    ?>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

<div class="col-lg-6">
<?php require_once "handle_form.php"; ?>     
<form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_estilo">
<div class="form-group">
    <label for="input_nome_galeria">Nome do estilo</label>
    <input name="editar_estilo_obra_nome" type="text" class="form-control" id="input_nome_galeria" value="<?php echo $data_estilo[0]['estilo_obra']?>">
</div>
<div class="form-group">
    <label for="input_local_galeria">Estilo deve ficar em destaque na página principal?</label>
    <select name="editar_estilo_destaque" class="form-control" id="exampleFormControlSelect1">
        <?php 
        if(isset($_GET['ativo'])){ 
                $ativo = $_GET['ativo'];
                if($ativo == "1"){
                    ?>
                    <option value = "1" selected>Sim</option>
                    <option value = "0">Não</option>
                    <?php
                }else{
                    ?>
                    <option value = "1">Sim</option>
                    <option value = "0" selected>Não</option>
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
    
        <?
    }
?>