<?php 
function galeria_artistas(){
    ?>
        <?php $post_scrolling_1 = home_arteref_get_posts(13215, 14); ?>
                <div class='scroll_posts'>
                
                    <div class='scroll_container'>

                        <div class='scroll_button'>
                            <button class='scroll_prev'><span class='glyphicon glyphicon-chevron-left'></span></button>
                        </div>

                        <div class="scrolling-wrapper">
                            <?php foreach($post_scrolling_1 as $post){ ?>
                                <a href="<?php echo $post['post_link']; ?>">
                                    <div class="card">
                                        <?php echo $post['post_image']; ?>
                                        <div>
                                            <?php echo $post['post_title']; ?>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>

                            <div class="post_card_ver_mais">
                                <div>
                                    <a href="<?php echo '#' ?>">
                                        <img src="<?php echo plugins_url(); ?>/home-arteref/content/img/saber-mais.svg" border="0" />
                                        Ver tudo!
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class='scroll_button'>
                            <button class='scroll_next'><span class='glyphicon glyphicon-chevron-right'></span></button>
                        </div>

                    </div>

                </div>
    <?php 
}