<?php

use Includes\Modules\Events\Events;

$events      = new Events();
$eventsArray = $events->getHomePageEvents(4);

if (count($eventsArray) > 0) { ?>
    <div class="next-event-large">
        <div class="tire-texture"></div>
        <div class="container">
            <div class="events-grid columns is-multiline is-aligned is-justified">
                <?php foreach ($eventsArray as $event) { ?>
                    <?php include(locate_template('template-parts/partials/mini-event.php')); ?>
                <?php } ?>
            </div>
            <p class="has-text-centered"><a class="button is-primary is-rounded is-large has-shadow" href="/events/" >More Events & Specials</a></p>
        </div>
    </div>
<?php } ?>