<?php
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}
    function get_mensagens(){

        $db = new db_galeria_artista_dao();

        $data_mensagens = $db->get(
            'wp_galeria_artista_contato',
            array(
                'select' => "*"
            )
        );

        ?>
        <div class="container arteref_market_place_galerias">

            <div class="row">
                <h2>Mensagens</h2>

                    <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Data contato</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Mensagem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                foreach ($data_mensagens as $key) {
                                    ?>
                                        <tr scope="row">
                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo $key['data']; ?></th>
                                            <th><?php echo $key['email']; ?></th>
                                            <th><?php echo $key['name']; ?></th>
                                            <th><?php echo $key['text']; ?></th>
                                        </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                         </div>
            </div>
            </div>
        </div>
        <?php
    }
?>