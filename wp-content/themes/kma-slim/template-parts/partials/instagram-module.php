<div class="card social-module instagram has-text-centered">
    <div class="card-content">
        <div class="columns is-multiline is-justified is-aligned is-mobile">
            <?php for ($i = 0; $i < 9; $i++) { ?>
                <div class="column is-4">
                    <img class="is-block" src="<?= $photos->data[$i]->images->thumbnail->url ?>">
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-bottom">
        <a class="button is-primary is-large is-rounded">View more on Instagram</a>
    </div>
</div>