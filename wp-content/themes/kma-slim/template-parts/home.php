<?php

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <?php include(locate_template('template-parts/sections/home-header.php')); ?>
    <?php include(locate_template('template-parts/partials/upcoming-events.php')); ?>
    <div class="container">
        <div class="entry-content content has-text-centered" tabindex="0">
            <h1 class="title is-1 tandelle is-primary"><?php echo $headline; ?></h1>
            <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
            <?php the_content(); ?>
        </div>
    </div>
    <div class="tire-texture"></div>
    <?php include(locate_template('template-parts/sections/social-media.php')); ?>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
