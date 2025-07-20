<?php
/**
 * Rengasliike Lappeenranta Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function rengasliike_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'rengasliike-lappeenranta'),
        'footer' => __('Footer Menu', 'rengasliike-lappeenranta'),
    ));

    // Add image sizes
    add_image_size('hero-image', 1200, 600, true);
    add_image_size('service-thumbnail', 400, 300, true);
    add_image_size('brand-logo', 200, 100, false);
}
add_action('after_setup_theme', 'rengasliike_theme_setup');

/**
 * Enqueue scripts and styles
 */
function rengasliike_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('rengasliike-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts-outfit', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('google-fonts-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);
    
    // Enqueue main JavaScript
    wp_enqueue_script('rengasliike-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('rengasliike-script', 'rengasliike_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('rengasliike_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'rengasliike_scripts');

/**
 * Register widget areas
 */
function rengasliike_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'rengasliike-lappeenranta'),
        'id' => 'footer-widget-area',
        'description' => __('Add widgets here to appear in footer', 'rengasliike-lappeenranta'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'rengasliike_widgets_init');

/**
 * Custom Post Types
 */
function rengasliike_custom_post_types() {
    // Services Post Type
    register_post_type('services', array(
        'labels' => array(
            'name' => __('Services', 'rengasliike-lappeenranta'),
            'singular_name' => __('Service', 'rengasliike-lappeenranta'),
            'add_new' => __('Add New Service', 'rengasliike-lappeenranta'),
            'add_new_item' => __('Add New Service', 'rengasliike-lappeenranta'),
            'edit_item' => __('Edit Service', 'rengasliike-lappeenranta'),
            'new_item' => __('New Service', 'rengasliike-lappeenranta'),
            'view_item' => __('View Service', 'rengasliike-lappeenranta'),
            'search_items' => __('Search Services', 'rengasliike-lappeenranta'),
            'not_found' => __('No services found', 'rengasliike-lappeenranta'),
            'not_found_in_trash' => __('No services found in trash', 'rengasliike-lappeenranta'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-tools',
        'rewrite' => array('slug' => 'palvelut'),
    ));

    // Brands Post Type
    register_post_type('brands', array(
        'labels' => array(
            'name' => __('Brands', 'rengasliike-lappeenranta'),
            'singular_name' => __('Brand', 'rengasliike-lappeenranta'),
            'add_new' => __('Add New Brand', 'rengasliike-lappeenranta'),
            'add_new_item' => __('Add New Brand', 'rengasliike-lappeenranta'),
            'edit_item' => __('Edit Brand', 'rengasliike-lappeenranta'),
            'new_item' => __('New Brand', 'rengasliike-lappeenranta'),
            'view_item' => __('View Brand', 'rengasliike-lappeenranta'),
            'search_items' => __('Search Brands', 'rengasliike-lappeenranta'),
            'not_found' => __('No brands found', 'rengasliike-lappeenranta'),
            'not_found_in_trash' => __('No brands found in trash', 'rengasliike-lappeenranta'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-car',
        'rewrite' => array('slug' => 'merkit'),
    ));

    // Testimonials Post Type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => __('Testimonials', 'rengasliike-lappeenranta'),
            'singular_name' => __('Testimonial', 'rengasliike-lappeenranta'),
            'add_new' => __('Add New Testimonial', 'rengasliike-lappeenranta'),
            'add_new_item' => __('Add New Testimonial', 'rengasliike-lappeenranta'),
            'edit_item' => __('Edit Testimonial', 'rengasliike-lappeenranta'),
            'new_item' => __('New Testimonial', 'rengasliike-lappeenranta'),
            'view_item' => __('View Testimonial', 'rengasliike-lappeenranta'),
            'search_items' => __('Search Testimonials', 'rengasliike-lappeenranta'),
            'not_found' => __('No testimonials found', 'rengasliike-lappeenranta'),
            'not_found_in_trash' => __('No testimonials found in trash', 'rengasliike-lappeenranta'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'asiakkaiden-kokemukset'),
    ));
}
add_action('init', 'rengasliike_custom_post_types');

/**
 * Custom Meta Boxes
 */
function rengasliike_add_meta_boxes() {
    // Service meta box
    add_meta_box(
        'service_details',
        __('Service Details', 'rengasliike-lappeenranta'),
        'rengasliike_service_meta_box',
        'services',
        'normal',
        'high'
    );

    // Brand meta box
    add_meta_box(
        'brand_details',
        __('Brand Details', 'rengasliike-lappeenranta'),
        'rengasliike_brand_meta_box',
        'brands',
        'normal',
        'high'
    );

    // Testimonial meta box
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'rengasliike-lappeenranta'),
        'rengasliike_testimonial_meta_box',
        'testimonials',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'rengasliike_add_meta_boxes');

/**
 * Service meta box callback
 */
function rengasliike_service_meta_box($post) {
    wp_nonce_field('rengasliike_save_meta_box', 'rengasliike_meta_box_nonce');
    
    $service_icon = get_post_meta($post->ID, '_service_icon', true);
    $service_price = get_post_meta($post->ID, '_service_price', true);
    $service_features = get_post_meta($post->ID, '_service_features', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="service_icon">' . __('Service Icon (emoji)', 'rengasliike-lappeenranta') . '</label></th>';
    echo '<td><input type="text" id="service_icon" name="service_icon" value="' . esc_attr($service_icon) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="service_price">' . __('Price', 'rengasliike-lappeenranta') . '</label></th>';
    echo '<td><input type="text" id="service_price" name="service_price" value="' . esc_attr($service_price) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="service_features">' . __('Features (one per line)', 'rengasliike-lappeenranta') . '</label></th>';
    echo '<td><textarea id="service_features" name="service_features" rows="5" class="large-text">' . esc_textarea($service_features) . '</textarea></td></tr>';
    echo '</table>';
}

/**
 * Brand meta box callback
 */
function rengasliike_brand_meta_box($post) {
    wp_nonce_field('rengasliike_save_meta_box', 'rengasliike_meta_box_nonce');
    
    $brand_url = get_post_meta($post->ID, '_brand_url', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="brand_url">' . __('Brand Website URL', 'rengasliike-lappeenranta') . '</label></th>';
    echo '<td><input type="url" id="brand_url" name="brand_url" value="' . esc_url($brand_url) . '" class="regular-text" /></td></tr>';
    echo '</table>';
}

/**
 * Testimonial meta box callback
 */
function rengasliike_testimonial_meta_box($post) {
    wp_nonce_field('rengasliike_save_meta_box', 'rengasliike_meta_box_nonce');
    
    $testimonial_author = get_post_meta($post->ID, '_testimonial_author', true);
    $testimonial_source = get_post_meta($post->ID, '_testimonial_source', true);
    $testimonial_rating = get_post_meta($post->ID, '_testimonial_rating', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="testimonial_author">' . __('Author Name', 'rengasliike-lappeenranta') . '</label></th>';
    echo '<td><input type="text" id="testimonial_author" name="testimonial_author" value="' . esc_attr($testimonial_author) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="testimonial_source">' . __('Source (e.g., Google, Facebook)', 'rengasliike-lappeenranta') . '</label></th>';
    echo '<td><input type="text" id="testimonial_source" name="testimonial_source" value="' . esc_attr($testimonial_source) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="testimonial_rating">' . __('Rating (1-5)', 'rengasliike-lappeenranta') . '</label></th>';
    echo '<td><select id="testimonial_rating" name="testimonial_rating">';
    for ($i = 1; $i <= 5; $i++) {
        $selected = ($testimonial_rating == $i) ? 'selected' : '';
        echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
    }
    echo '</select></td></tr>';
    echo '</table>';
}

/**
 * Save meta box data
 */
function rengasliike_save_meta_box($post_id) {
    if (!isset($_POST['rengasliike_meta_box_nonce']) || !wp_verify_nonce($_POST['rengasliike_meta_box_nonce'], 'rengasliike_save_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save service meta
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
    if (isset($_POST['service_price'])) {
        update_post_meta($post_id, '_service_price', sanitize_text_field($_POST['service_price']));
    }
    if (isset($_POST['service_features'])) {
        update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
    }
    
    // Save brand meta
    if (isset($_POST['brand_url'])) {
        update_post_meta($post_id, '_brand_url', esc_url_raw($_POST['brand_url']));
    }
    
    // Save testimonial meta
    if (isset($_POST['testimonial_author'])) {
        update_post_meta($post_id, '_testimonial_author', sanitize_text_field($_POST['testimonial_author']));
    }
    if (isset($_POST['testimonial_source'])) {
        update_post_meta($post_id, '_testimonial_source', sanitize_text_field($_POST['testimonial_source']));
    }
    if (isset($_POST['testimonial_rating'])) {
        update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
    }
}
add_action('save_post', 'rengasliike_save_meta_box');

/**
 * Customizer settings
 */
function rengasliike_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title' => __('Contact Information', 'rengasliike-lappeenranta'),
        'priority' => 30,
    ));
    
    // Phone number
    $wp_customize->add_setting('phone_number', array(
        'default' => '044 032 3388',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('phone_number', array(
        'label' => __('Phone Number', 'rengasliike-lappeenranta'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('email_address', array(
        'default' => 'myynti@acrengas.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('email_address', array(
        'label' => __('Email Address', 'rengasliike-lappeenranta'),
        'section' => 'contact_info',
        'type' => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('address', array(
        'default' => 'Lappeenranta, Finland',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('address', array(
        'label' => __('Address', 'rengasliike-lappeenranta'),
        'section' => 'contact_info',
        'type' => 'textarea',
    ));
    
    // Appointment URL
    $wp_customize->add_setting('appointment_url', array(
        'default' => 'https://kcenterprise.compilator.com/public/cms?Id=1&CompanyId=1ad3de4c-f732-4e45-b9ec-9145822c9db3&branchId=1',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('appointment_url', array(
        'label' => __('Appointment Booking URL', 'rengasliike-lappeenranta'),
        'section' => 'contact_info',
        'type' => 'url',
    ));
}
add_action('customize_register', 'rengasliike_customize_register');

/**
 * Helper function to get contact info
 */
function rengasliike_get_contact_info($field) {
    return get_theme_mod($field, '');
}

/**
 * Add custom image sizes to admin
 */
function rengasliike_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'hero-image' => __('Hero Image', 'rengasliike-lappeenranta'),
        'service-thumbnail' => __('Service Thumbnail', 'rengasliike-lappeenranta'),
        'brand-logo' => __('Brand Logo', 'rengasliike-lappeenranta'),
    ));
}
add_filter('image_size_names_choose', 'rengasliike_custom_image_sizes'); 