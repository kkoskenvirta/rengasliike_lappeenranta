<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-logo">
                        <span class="logo-text"><?php bloginfo('name'); ?></span>
                        <span class="logo-subtitle"><?php bloginfo('description'); ?></span>
                    </a>
                <?php endif; ?>
            </div>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'navbar-menu',
                'fallback_cb' => 'rengasliike_fallback_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
            ?>
            
            <button class="navbar-toggle" aria-label="<?php _e('Toggle navigation', 'rengasliike-lappeenranta'); ?>">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </nav>
</header>

<?php
// Fallback menu function
function rengasliike_fallback_menu() {
    echo '<ul class="navbar-menu">';
    echo '<li class="navbar-item"><a href="' . esc_url(home_url('/')) . '" class="navbar-link">' . __('Etusivu', 'rengasliike-lappeenranta') . '</a></li>';
    echo '<li class="navbar-item"><a href="' . esc_url(home_url('/palvelut/')) . '" class="navbar-link">' . __('Palvelut', 'rengasliike-lappeenranta') . '</a></li>';
    echo '<li class="navbar-item"><a href="' . esc_url(home_url('/tietoa-meista/')) . '" class="navbar-link">' . __('Tietoa meistä', 'rengasliike-lappeenranta') . '</a></li>';
    echo '<li class="navbar-item"><a href="' . esc_url(home_url('/yhteystiedot/')) . '" class="navbar-link">' . __('Yhteystiedot', 'rengasliike-lappeenranta') . '</a></li>';
    
    // Contact info
    $phone = rengasliike_get_contact_info('phone_number');
    $email = rengasliike_get_contact_info('email_address');
    
    if ($phone) {
        echo '<li class="navbar-item mobile-contact">';
        echo '<a href="tel:' . esc_attr($phone) . '" class="navbar-link contact-link">';
        echo '<span class="contact-icon">📞</span>';
        echo '<div class="contact-content">';
        echo '<span class="contact-cta">' . __('Soita nyt', 'rengasliike-lappeenranta') . '</span>';
        echo '<span class="contact-detail">' . esc_html($phone) . '</span>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
    }
    
    if ($email) {
        echo '<li class="navbar-item mobile-contact">';
        echo '<a href="mailto:' . esc_attr($email) . '" class="navbar-link contact-link">';
        echo '<span class="contact-icon">📧</span>';
        echo '<div class="contact-content">';
        echo '<span class="contact-cta">' . __('Lähetä viesti', 'rengasliike-lappeenranta') . '</span>';
        echo '<span class="contact-detail">' . esc_html($email) . '</span>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
    }
    
    echo '</ul>';
}
?> 