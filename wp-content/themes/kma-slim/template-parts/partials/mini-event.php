<div class="column is-narrow">
    <div class="card has-text-centered">
        <div class="card-image">
            <a href="<?= $event['link']; ?>" >
            <img src="<?= $event['photo']; ?>" alt="<?= $event['name']; ?>">
            </a>
        </div>
        <div class="card-content">
            <h3 class="title is-3 tandelle is-primary"><?= $event['name']; ?></h3>
            <p class="date"><?= $event['recurr_readable']; ?></p>
            <p class="time"><?php echo $event['time']; ?></p>
            <p class="location"><?php echo $event['location']; ?></p>
        </div>
        <div class="card-footer is-centered is-justified">
            <p class="link"><a class="button is-primary tandelle is-outlined" href="<?= $event['link']; ?>" >More Info</a></p>
        </div>
    </div>
</div>