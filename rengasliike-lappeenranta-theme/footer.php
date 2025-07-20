<footer class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h4><?php bloginfo('name'); ?></h4>
                    <p><?php bloginfo('description'); ?></p>
                    <div class="business-info">
                        <?php if (rengasliike_get_contact_info('address')) : ?>
                            <p><?php echo esc_html(rengasliike_get_contact_info('address')); ?></p>
                        <?php endif; ?>
                        <?php if (rengasliike_get_contact_info('phone_number')) : ?>
                            <p><a href="tel:<?php echo esc_attr(rengasliike_get_contact_info('phone_number')); ?>"><?php echo esc_html(rengasliike_get_contact_info('phone_number')); ?></a></p>
                        <?php endif; ?>
                        <?php if (rengasliike_get_contact_info('email_address')) : ?>
                            <p><a href="mailto:<?php echo esc_attr(rengasliike_get_contact_info('email_address')); ?>"><?php echo esc_html(rengasliike_get_contact_info('email_address')); ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4><?php _e('Palvelut', 'rengasliike-lappeenranta'); ?></h4>
                    <?php
                    $services = new WP_Query(array(
                        'post_type' => 'services',
                        'posts_per_page' => 5,
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    ));
                    
                    if ($services->have_posts()) :
                        echo '<ul>';
                        while ($services->have_posts()) : $services->the_post();
                            echo '<li><a href="' . get_permalink() . '" class="footer-link">' . get_the_title() . '</a></li>';
                        endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo '<ul>';
                        echo '<li><a href="#" class="footer-link">' . __('Renkaanvaihto', 'rengasliike-lappeenranta') . '</a></li>';
                        echo '<li><a href="#" class="footer-link">' . __('Rengashotelli', 'rengasliike-lappeenranta') . '</a></li>';
                        echo '<li><a href="#" class="footer-link">' . __('Tasapainoitukset', 'rengasliike-lappeenranta') . '</a></li>';
                        echo '<li><a href="#" class="footer-link">' . __('Renkaan paikkaus', 'rengasliike-lappeenranta') . '</a></li>';
                        echo '</ul>';
                    endif;
                    ?>
                </div>
                
                <div class="footer-section">
                    <h4><?php _e('Rengasmerkit', 'rengasliike-lappeenranta'); ?></h4>
                    <?php
                    $brands = new WP_Query(array(
                        'post_type' => 'brands',
                        'posts_per_page' => 5,
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    ));
                    
                    if ($brands->have_posts()) :
                        echo '<ul>';
                        while ($brands->have_posts()) : $brands->the_post();
                            $brand_url = get_post_meta(get_the_ID(), '_brand_url', true);
                            $link = $brand_url ? $brand_url : get_permalink();
                            echo '<li><a href="' . esc_url($link) . '" class="footer-link" target="_blank">' . get_the_title() . '</a></li>';
                        endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo '<ul>';
                        echo '<li><a href="#" class="footer-link">Goodyear</a></li>';
                        echo '<li><a href="#" class="footer-link">Michelin</a></li>';
                        echo '<li><a href="#" class="footer-link">Bridgestone</a></li>';
                        echo '<li><a href="#" class="footer-link">Continental</a></li>';
                        echo '<li><a href="#" class="footer-link">Pirelli</a></li>';
                        echo '</ul>';
                    endif;
                    ?>
                </div>
                
                <div class="footer-section">
                    <h4><?php _e('Yhteystiedot', 'rengasliike-lappeenranta'); ?></h4>
                    <div class="contact-info">
                        <?php if (rengasliike_get_contact_info('phone_number')) : ?>
                            <p><strong><?php _e('Puhelin:', 'rengasliike-lappeenranta'); ?></strong> <a href="tel:<?php echo esc_attr(rengasliike_get_contact_info('phone_number')); ?>"><?php echo esc_html(rengasliike_get_contact_info('phone_number')); ?></a></p>
                        <?php endif; ?>
                        <?php if (rengasliike_get_contact_info('email_address')) : ?>
                            <p><strong><?php _e('Sähköposti:', 'rengasliike-lappeenranta'); ?></strong> <a href="mailto:<?php echo esc_attr(rengasliike_get_contact_info('email_address')); ?>"><?php echo esc_html(rengasliike_get_contact_info('email_address')); ?></a></p>
                        <?php endif; ?>
                        <?php if (rengasliike_get_contact_info('address')) : ?>
                            <p><strong><?php _e('Osoite:', 'rengasliike-lappeenranta'); ?></strong> <?php echo esc_html(rengasliike_get_contact_info('address')); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (rengasliike_get_contact_info('appointment_url')) : ?>
                        <div class="footer-cta">
                            <a href="<?php echo esc_url(rengasliike_get_contact_info('appointment_url')); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                <?php _e('Varaa aika', 'rengasliike-lappeenranta'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php if (is_active_sidebar('footer-widget-area')) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Kaikki oikeudet pidätetään.', 'rengasliike-lappeenranta'); ?></p>
                <div class="footer-links">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'footer-menu',
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html> 