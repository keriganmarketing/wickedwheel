<?php

use Includes\Modules\Layouts\Layouts;
use Includes\Modules\Menu\Menu;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

include(locate_template('template-parts/sections/top.php'));
?>
<div class="column is-3">
    <div class="column">
        <div class="">
</div>
    </div>
</div>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include(locate_template('template-parts/sections/support-heading.php')); ?>
        <section id="content" class="section support">
            <div class="container">
                <div class="entry-content content">
                    <?php
                    the_content(sprintf(
                    /* translators: %s: Name of current post. */
                        wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'kmaslim'), array( 'span' => array( 'class' => array() ) )),
                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                    ));
                    $menu = new Menu();
                    $menuItems = $menu->getMenu();
                    echo '<pre>',print_r($menuItems),'</pre>';
                    ?>
                </div>
            </div>
        </section>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>