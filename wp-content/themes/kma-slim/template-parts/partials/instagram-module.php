<?php
use Includes\Modules\KMAInstagram\InstagramController;

$instagram = new InstagramController();
$photos = $instagram->getFeed(9);
?>
<div class="card social-module instagram has-text-centered">
    <div class="card-content">
        <insta-gallery :photos=<?= $photos; ?>></insta-gallery>
    </div>
    <div class="card-bottom">
        <a class="button is-primary is-large is-rounded">View more on Instagram</a>
    </div>
</div>