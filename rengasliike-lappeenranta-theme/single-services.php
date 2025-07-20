<?php
/**
 * The template for displaying single service posts
 */

get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="page-header">
                <div class="hero">
                    <div class="hero-content">
                        <h2><?php the_title(); ?></h2>
                        <?php if (get_the_excerpt()) : ?>
                            <p><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                        <div class="hero-buttons">
                            <a href="<?php echo esc_url(home_url('/palvelut/')); ?>" class="btn btn-secondary"><?php _e('Kaikki palvelut', 'rengasliike-lappeenranta'); ?></a>
                            <a href="<?php echo esc_url(home_url('/yhteystiedot/')); ?>" class="btn btn-primary"><?php _e('Ota yhteyttä', 'rengasliike-lappeenranta'); ?></a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('hero-image', array('class' => 'hero-car-image')); ?>
                        <?php else : ?>
                            <img src="https://images.unsplash.com/photo-1486006920555-c77dcf18193c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="<?php the_title(); ?>" class="hero-car-image">
                        <?php endif; ?>
                        <div class="hero-overlay">
                            <div class="tire-badge">
                                <?php 
                                $service_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                                $icon = $service_icon ? $service_icon : '🔧';
                                ?>
                                <span class="tire-icon"><?php echo $icon; ?></span>
                                <span class="tire-text"><?php _e('Ammattipalvelu', 'rengasliike-lappeenranta'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="service-content">
                <div class="container">
                    <div class="service-grid">
                        <div class="service-main">
                            <div class="service-details">
                                <?php
                                $service_price = get_post_meta(get_the_ID(), '_service_price', true);
                                if ($service_price) :
                                ?>
                                    <div class="service-price">
                                        <h3><?php _e('Hinta', 'rengasliike-lappeenranta'); ?></h3>
                                        <div class="price"><?php echo esc_html($service_price); ?></div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="service-description">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="service-sidebar">
                            <?php
                            $service_features = get_post_meta(get_the_ID(), '_service_features', true);
                            if ($service_features) :
                                $features = explode("\n", $service_features);
                                if (!empty($features)) :
                            ?>
                                <div class="service-features">
                                    <h3><?php _e('Palvelun sisältö', 'rengasliike-lappeenranta'); ?></h3>
                                    <ul>
                                        <?php foreach ($features as $feature) : ?>
                                            <?php if (trim($feature)) : ?>
                                                <li><?php echo esc_html(trim($feature)); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php 
                                endif;
                            endif;
                            ?>
                            
                            <div class="service-cta">
                                <h3><?php _e('Varaa aika', 'rengasliike-lappeenranta'); ?></h3>
                                <p><?php _e('Varaa aika palveluun verkossa tai ota yhteyttä', 'rengasliike-lappeenranta'); ?></p>
                                <div class="cta-buttons">
                                    <a href="<?php echo esc_url(rengasliike_get_contact_info('appointment_url')); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                        <?php _e('Varaa aika verkossa', 'rengasliike-lappeenranta'); ?>
                                    </a>
                                    <a href="tel:<?php echo esc_attr(rengasliike_get_contact_info('phone_number')); ?>" class="btn btn-secondary">
                                        <?php _e('Soita nyt', 'rengasliike-lappeenranta'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Related Services -->
            <section class="related-services">
                <div class="container">
                    <h3><?php _e('Muut palvelumme', 'rengasliike-lappeenranta'); ?></h3>
                    <div class="services-grid">
                        <?php
                        $related_services = new WP_Query(array(
                            'post_type' => 'services',
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID()),
                            'orderby' => 'rand'
                        ));
                        
                        if ($related_services->have_posts()) :
                            while ($related_services->have_posts()) : $related_services->the_post();
                                $icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: '🔧';
                                ?>
                                <div class="service-card">
                                    <div class="service-icon"><?php echo $icon; ?></div>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('Lue lisää', 'rengasliike-lappeenranta'); ?></a>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </section>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?> 