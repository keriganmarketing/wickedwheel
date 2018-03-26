<?php

use Includes\Modules\Events\Events;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

$events      = new Events();
$eventsArray = $events->getUpcomingEvents();

$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
    <div id="mid">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php include(locate_template('template-parts/sections/support-heading.php')); ?>
            <section id="content" class="section support">
                <div class="container">
                    <div class="entry-content content">
                        <?php the_content(); ?>

                        <div class="section">
                            <div class="events-grid columns is-multiline is-aligned">
                                <?php foreach ($eventsArray as $event) { ?>
                                    <?php include(locate_template('template-parts/partials/mini-event.php')); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>