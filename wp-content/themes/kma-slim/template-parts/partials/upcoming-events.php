<?php

use Includes\Modules\Events\Events;

$events      = new Events();
$eventsArray = $events->getHomePageEvents(4);

if (count($eventsArray) > 0) { ?>
    <div class="next-event-large">
        <div class="tire-texture"></div>
        <div class="container">
            <div class="columns is-multiline is-aligned is-justified is-mobile">
                <?php foreach ($eventsArray as $event) { ?>
                    <div class="column is-narrow">
                        <div class="card has-text-centered">
                            <div class="card-image">
                                <img src="<?= $event['photo']; ?>" alt="<?= $event['name']; ?>">
                            </div>
                            <div class="card-content">
                                <h3 class="title is-3 tandelle is-primary"><?= $event['name']; ?></h3>
                                <p class="date"><?= $event['recurr_readable']; ?></p>
                                <p class="time"><?php echo $event['time']; ?></p>
                                <p class="location"><?php echo $event['location']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <p class="has-text-centered"><a class="button is-primary is-rounded is-large" href="/events-specials/" >More Events & Specials</a></p>
        </div>
    </div>
<?php } ?>