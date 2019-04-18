
<?php
   function editar_galerias(){
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
}
    // var_dump($data_galeria);       
        ?>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

<div class="col-lg-6">
    <?php require_once "handle_form.php"; ?>
    <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" id="form_galeria">
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
            <textarea cols="30" rows="10" name="editar_galeria_descricao" class="form-control" id="input_descricao_galeria" >
                <?php echo $data_galeria[0]['descricao_galeria']?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="input_logo_url">Logo URL</label>
            <input type="text" class="form-control" id="input_logo_url" value="<?php echo $data_galeria[0]['logo_url']?>">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        
    </form>
</div>

</div>
<?php
    }
?>
