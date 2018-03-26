<?php

use Includes\Modules\Social\SocialSettingsPage;

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
            'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>'
        ]); ?>
        <div id="bot">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-4 has-text-centered">
                        <img src="<?php echo get_template_directory_uri() . '/img/wings.png'; ?>"
                             alt="The Wicked Wheel">
                        <p class="footer-phone has-text-centered"><a class="tandelle" href="tel:850-588-7947">850-588-7947</a>
                        </p>
                        <p class="open-text has-text-centered">Open 11am daily</p>
                        <div class="social">
                            <?php
                            $socialLinks = new SocialSettingsPage();
                            $socialIcons = $socialLinks->getSocialLinks('svg', 'circle');
                            if (is_array($socialIcons)) {
                                foreach ($socialIcons as $socialId => $socialLink) {
                                    echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="column is-4 has-text-centered">
                        <a href="/contact/" class="button is-primary tandelle directions-button is-rounded has-shadow">Get Directions</a>
                        <img src="<?php echo get_template_directory_uri() . '/img/map.png'; ?>"
                             alt="Directions to The Wicked Wheel">
                    </div>
                    <div class="column is-4 footer-partners">
                        <p class="while-youre-here">While you're in town, visit</p>
                        <a href="https://pwillys.com" target="_blank"><img src="<?php echo get_template_directory_uri() . '/img/pwillys-logo.png'; ?>"
                                                                           alt="Directions to The Wicked Wheel"></a>
                        <p class="visit-website"><a href="https://pwillys.com" target="_blank">visit website.</a></p>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4"></script>
<?php } ?>
    <script async
            src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=74&amp;locationId=2701149&amp;lang=en_US&amp;rating=true&amp;nreviews=3&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=false&amp;display_version=2"></script>
<?php wp_footer(); ?>