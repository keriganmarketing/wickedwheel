<div class="column is-3 is-variable">
    <div class="card has-text-centered">
        <div class="card-image">
            <a href="<?= $event['link']; ?>" >
            <img src="<?= $event['photo']; ?>" alt="<?= $event['name']; ?>">
            </a>
        </div>
        <div class="card-content" tabindex="0">
            <h3 class="title is-3 tandelle is-primary"><?= $event['name']; ?></h3>
            <p class="date"><?= $event['recurr_readable']; ?></p>
            <p class="time"><?php echo $event['time']; ?></p>
            <p class="location"><?php echo $event['location']; ?></p>
        </div>
        <a class="tile-link" aria-label="Learn more about <?= $event['name']; ?>" href="<?= $event['link']; ?>" ></a>
    </div>
</div>