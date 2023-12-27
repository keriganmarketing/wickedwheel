<div class="card menu-item <?= ($menuItem['photo'] != '' ? 'has-image' : ''); ?>">
    <?php if ($menuItem['photo'] != '') { ?>
        <div class="card-image">
            <figure class="image is-16by9">
                <div class="card-content item-price-info columns is-multiline is-mobile is-gapless">

                    <div class="column">
                        <?php if($menuItem['name'] != '') { ?> 
                        <p tabindex="0" class="item-name tandelle"><?= $menuItem['name']; ?></p>
                        <?php } ?>
                    </div>

                    <div class="column is-narrow has-text-right">
                        <?php if($menuItem['price'] != '') { ?> 
                        <p tabindex="0" class="item-price tandelle"><?= $menuItem['price']; ?></p>
                        <?php } ?>
                    </div>
                </div>
                <img src="<?= $menuItem['photo']; ?>"
                     alt="<?= $menuItem['name']; ?>"
                     tabindex="0" >
            </figure>
        </div>
    <?php } else { ?>
    <div class="card-content item-price-info columns is-multiline is-mobile is-gapless">
        <div class="column">
            <p class="item-name tandelle" tabindex="0"><?= $menuItem['name']; ?></p>
        </div>
        <div class="column is-narrow has-text-right">
            <p class="item-price tandelle" tabindex="0"><?= $menuItem['price']; ?></p>
        </div>
    </div>
    <?php } ?>
    <div class="card-content columns is-multiline is-mobile is-gapless">
        <div class="column is-12">
            <p class="item-description" tabindex="0"><?= $menuItem['description']; ?></p>
        </div>
    </div>
</div>