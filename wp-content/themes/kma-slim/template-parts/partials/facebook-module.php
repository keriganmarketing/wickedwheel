<?php
//TODO: Make this work.
$isVideo = false;
$hasImage = false;
$imageUrl = 'https://scontent-atl3-1.xx.fbcdn.net/v/t1.0-0/s640x640/28660794_1737629462964384_1246463897196517983_n.jpg?oh=5df2b25fbf194fe5e9be0525b64b040d&oe=5B46C384'
?>
<div class="card social-module facebook has-text-centered <?= ($hasImage == true ? 'has-image' : 'no-image'); ?>">
    <?php if($hasImage == true){ ?>
    <div class="card-image" >
        <img src="<?php echo $imageUrl; ?>">
    </div>
    <?php } ?>
    <?php if($isVideo == true){ ?>

    <?php } ?>
    <div class="card-content">
        <p class="post-text">Perfect weather today for a hot bowl of seafood gumbo and some Cajun crawfish cornbread!</p>
        <p class="posted-on">posted March 7 at 12:23pm</p>
    </div>
    <div class="card-bottom">
        <a class="button is-primary is-large is-rounded" >Read more on Facebook</a>
    </div>
</div>

