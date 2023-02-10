<?php

use Includes\Modules\Social\SocialSettingsPage;
use Includes\Modules\Helpers\PageField;

?>
        <div class="sticky-footer">
            <?php wp_nav_menu([
                'theme_location' => 'footer-menu',
                'container'      => false,
                'menu_class'     => 'footer-navigation-menu',
                'fallback_cb'    => '',
                'menu_id'        => '',
                'link_before'    => '',
                'link_after'     => '',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            ]); ?>
                <div id="bot">
                    <div class="container">
                        <div class="columns is-multiline">
                            <div class="column is-4 has-text-centered">
                                <img src="<?php echo get_template_directory_uri() . '/img/wings.png'; ?>"
                                    alt="The Wicked Wheel">
                                <p class="footer-phone has-text-centered"><a class="tandelle" href="tel:<?= PageField::getField('contact_info_phone_number', 58); ?>"><?= PageField::getField('contact_info_phone_number', 58); ?></a>
                                </p>
                                <p class="open-text has-text-centered" tabindex="0"><?= PageField::getField('contact_info_hours', 58); ?></p>
                                <div class="social">
                                    <?php
                                    $socialLinks = new SocialSettingsPage();
                                    $socialIcons = $socialLinks->getSocialLinks('svg', 'circle');
                                    if (is_array($socialIcons)) {
                                        foreach ($socialIcons as $socialId => $socialLink) {
                                            echo '<a 
                                                class="' . $socialId . '" 
                                                href="' . $socialLink[0] . '" 
                                                target="_blank" 
                                                aria-label="follow us on ' . $socialId .'"
                                            >' . $socialLink[1] . '</a>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="column is-4 has-text-centered">
                                <a href="https://www.google.com/maps/dir/29.9516777,-85.4236099/The+Wicked+Wheel+Bar+%26+Grill,+10025+Hutchison+Blvd,+Panama+City+Beach,+FL+32408" aria-label="Get Directions opens in new tab" target="_blank" rel="noopener" class="button is-primary tandelle directions-button is-rounded has-shadow">Get Directions</a>
                                <img src="<?php echo get_template_directory_uri() . '/img/map.png'; ?>"
                                    alt="Directions to The Wicked Wheel">
                            </div>
                            <div class="column is-4 footer-partners" tabindex="0">
                                <p class="while-youre-here">While you're in town, visit</p>
                                <a href="https://pwillys.com" target="_blank"><img src="<?php echo get_template_directory_uri() . '/img/pwillys-logo.png'; ?>"
                                                                                alt="Pineapple Willy's"></a>
                                <p class="visit-website"><a href="https://pwillys.com" target="_blank"><u>visit PWilly's website.</u></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <div id="bot-bot">
                <?php include(locate_template('template-parts/partials/copyright.php')); ?>
            </div>
        </div><!-- .sticky-footer -->
        <modal><?= (isset($modalContent) && $modalContent != '' ? $modalContent : ''); ?></modal>
    </div><!-- .site-wrapper -->
</div><!-- .app -->
<?php if(!is_front_page()){ ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLEMAPS_KEY; ?>"></script>
<?php } ?>
<?php wp_footer(); ?>