<?php
    function galerias_home_arteref(){

        $args = array(
            'numberposts' => 3,
            'post_type'   => 'post',
        );
        $posts = get_posts($args);
        ?>
        <div class="col-lg-12 galerias_home_arteref">
            <div class="col-lg-8">
                <a href="<?php echo $posts[0]->guid; ?>">
                <?php echo get_the_post_thumbnail( $posts[0]->ID, 'large'); ?>
                <div class='galerias_home_post_info'>
                    <h4><?php echo $posts[0]->post_title; ?></h4>
                </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="<?php echo $posts[1]->guid; ?>">
                <?php echo get_the_post_thumbnail( $posts[1]->ID, 'large'); ?>
                <div class='galerias_home_post_info'>
                    <h4><?php echo $posts[1]->post_title; ?></h4>
                </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="<?php echo $posts[2]->guid; ?>">
                <?php echo get_the_post_thumbnail( $posts[2]->ID, 'large'); ?>
                <div class='galerias_home_post_info'>
                    <h4><?php echo $posts[1]->post_title; ?></h4>
                </div>
                </a>
            </div>
        </div>
        <?php
    }
?>