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
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $db = new db_galeria_artista_dao();
            $data_evento = $db->get(
                'wp_galeria_eventos',
                array(
                    'select' => '*',
                    'campo'  => 'id',
                    'id'     => $id
                     )   
                );  
                $data_galeria_evento = $db->get(
                    'wp_galerias',
                    array(
                        'select' => "*",
                    )
                );
                $data_obra = $db->get(
                    'wp_galeria_artista_obras',
                    array(
                        'select' => "*"
                    )
                );
                $data_galeria = $db->get(
                    'wp_galerias',
                    array(
                        'select' => "*"
                    )
                );
                aba_edicao_eventos($data_evento,$data_galeria_evento,$data_obra,$data_galeria);
        }else{
                aba_cadastro_eventos($data_eventos,$data_galerias,$data_obras);
            }
    }
        function exibe_nome_obra($id_obra){
          $opi= new recupera_nome_obra_por_id();
          $nome_obra=$opi->init($id_obra);
         //$obra=$opi->init($id_obra);
        //   var_dump($nome_obra);
        //var_dump($obra);
        foreach ($nome_obra  as $key ) {
            echo $key . " - ";
        }
        // foreach($obra as $key){
        //     echo $key . " - ";
        // } 
        }

        function exibe_nome_galeria($id_galeria){
            $gpi= new recupera_nome_galeria_por_id();
            $nome_galeria=$gpi->init($id_galeria);
          //   var_dump($nome_obra);
          foreach ($nome_galeria as $key ) {
              echo $key . " ";
          } 
          }
     function exibe_imagem_destaque($id_imagem){
            $eventos_imagem=new recupera_imagem_por_id();
            $url_img_destaque=$eventos_imagem->init($id_imagem, 'thumbnail');
            return $url_img_destaque;
    } 
    // function myFunction() {  }

        function aba_cadastro_eventos($data_eventos,$data_galerias,$data_obras){
        ?>
        <div class="container arteref_market_place_galerias">

            <div class="row">

                    <h2>Eventos</h2>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Eventos cadastrados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Adicionar eventos</a>
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
                                        <th scope="col">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                <!-- <?php  echo exibe_nome_galeria(); ?>  -->

                                <?php
                                foreach ($data_eventos as $key) {
                                    ?>
                                        <tr scope="row">
                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo exibe_nome_galeria($key['id_galeria']); ?></th>
                                            <th><?php echo $key['nome_evento']; ?></th>
                                            <th><?php echo $key['data']; ?></th>
                                            <th><img src="<?php  print_r( exibe_imagem_destaque($key['url_img_destaque'])[0] ); ?>" alt=""></th> 
                                            <!-- <th><?php //echo $key['url_img_destaque']; ?></th> -->
                                            <th><?php echo $key['local']; ?></th>
                                            <th><?php echo $key['data_inicio']; ?></th>
                                            <th><?php echo $key['data_termino']; ?></th>
                                            <th><?php echo $key['descricao_resumida']; ?></th>
                                            <th><?php echo $key['descricao_completa']; ?></th>
                                            <th><?php echo exibe_nome_obra($key ['obras'] );?></th>
                                            <th><a class="btn btn-primary" href="admin.php?page=galerias_eventos&id=<?php echo $key['id']; ?>" role="button">Editar</a>
                                            <!-- <th><a class="btn btn-danger" href="admin.php?page=galerias_eventos&id=<?php echo $key['id']; ?>&excluir=" onclick="return confirm('Deseja realemente excluir esse registro?');" role="button">Excluir</a></th> -->
                                            </th>
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
                            <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_eventos" enctype="multipart/form-data">    
                                    <div class="form-group">
                                        <label for="input_nome_galeria">Nome do evento</label>
                                        <input name="cadastro_eventos_nome" type="text" class="form-control" id="input_nome_galeria">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_local_galeria">Imagem destaque</label>
                                        <!-- <input type="text" class="form-control" id="input_local_galeria"> -->
                                        <input type="file" name="file" accept="image/*"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="input_descricao_galeria">Local</label>
                                        <textarea name="cadastro_eventos_local_galeria" cols="30" rows="10" class="form-control" id="input_descricao_galeria"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Data do inicio</label>
                                        <input name="cadastro_eventos_data_inicio" type="datetime-local" >
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Data do termino</label>
                                        <input name="cadastro_eventos_data_fim" type="datetime-local">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Descrição resumida</label>
                                        <textarea name="cadastro_eventos_descricao_resumida" cols="30" rows="10" class="form-control" id="input_descricao_galeria"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Descrição completa</label>
                                        <textarea name="cadastro_eventos_descricao_completa" cols="30" rows="10" class="form-control" id="input_descricao_galeria"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Obras</label>
                                        <select name="cadastro_eventos_obra" class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                                foreach ($data_obras as $key) {
                                                   ?>
                                                        <option value="<?php echo $key['id']; ?> "><?php echo $key['nome_obra']; ?></option>
                                                   <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_logo_url">Galeria</label>
                                        <select name="cadastro_eventos_galeria" class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                                foreach ($data_galerias as $key) {
                                                   ?>
                                                        <option value="<?php echo $key['id']; ?>"><?php echo $key['nome_galeria']; ?></option>
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
            </div>
            
        </div>
        <?php
    }
    function aba_edicao_eventos($data_evento,$data_galeria_evento,$data_obra,$data_galeria){
    ?>               
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

<div class="col-lg-12">
<?php require_once "handle_form.php"; ?>
<form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_eventos" enctype="multipart/form-data">    
        <div class="form-group">
            <label for="input_nome_galeria">Nome do evento</label>
            <input name="editar_eventos_nome" type="text" class="form-control" id="input_nome_galeria" value="<?php echo $data_evento[0]['nome_evento']?>">
        </div>
        <!-- <div class="form-group">
            <label for="input_local_galeria">Imagem destaque</label>
            <!-- <input type="text" class="form-control" id="input_local_galeria" value="<?php echo $data_evento[0]['id_galeria']?>"> -->
            <!-- <input type="file" name="file" accept="image/*"> 
        </div> --> 
        <div class="form-group">
            <label for="input_descricao_galeria">Local</label>
            <input name="editar_eventos_local_galeria" cols="30" rows="10" class="form-control" id="input_descricao_galeria" value="<?php echo $data_evento[0]['local']?>">
        </div>
        <div class="form-group">
            <label for="input_logo_url">Data do inicio</label>   
            <input name="editar_eventos_data_inicio" type="text" value="<?php echo $data_evento[0]['data_inicio']?>">
        </div>
        <div class="form-group">
            <label for="input_logo_url">Data do termino</label>
            <input name="editar_eventos_data_fim" type="text" value="<?php echo $data_evento[0]['data_termino']?>">
        </div>
        <div class="form-group">
            <label for="input_logo_url">Descrição resumida</label>
            <textarea name="editar_eventos_descricao_resumida" cols="30" rows="10" class="form-control" id="input_descricao_galeria" value="<?php echo $data_evento[0]['descricao_resumida']?>"><?php echo $data_evento[0]['descricao_resumida']?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="input_logo_url">Descrição completa</label>
            <textarea name="editar_eventos_descricao_completa" cols="30" rows="10" class="form-control" id="input_descricao_galeria" value="<?php echo $data_evento[0]['descricao_completa']?>"><?php echo $data_evento[0]['descricao_resumida']?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="input_logo_url">Obras</label>
            <!-- <select multiple name="editar_eventos_obra[]" class="form-control" id="exampleFormControlSelect1"  > -->
            <select multiple selected name="editar_eventos_obra" class="form-control" id="exampleFormControlSelect1"  >
                        <?php
                           foreach ($data_obra as $key) {
                                ?>
                                    <option  value="<?php echo $key['id'] ?>"><?php echo $key['nome_obra']?></option>
                                    <!-- <input checked type="checkbox" name="editar_eventos_obra[]" class="form-control" id="exampleFormControlSelect1" value="<?php echo $data_evento[0]['id']?>">    -->
                                <?php
                               // var_dump($data_obra);
                          }
                        //   var_dump($data_obra);
                        ?>
                        
            </select>
        </div>
        <div class="form-group">
        <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
            <label for="input_local_galeria">Imagem destaque</label>
            <input type="file" name="file" accept="image/*"> 
            <button type="submit" class="btn btn-primary" name="upload">Salvar</button>
        </form>
        </div>

</div>
<!-- <button type="submit" class="btn btn-primary" name="upload">Salvar</button> -->
</form>
</div>
    
</div>
    
        <?
    }
?>