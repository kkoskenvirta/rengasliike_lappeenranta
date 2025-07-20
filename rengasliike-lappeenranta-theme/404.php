<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<main>
    <section class="error-404">
        <div class="container">
            <div class="error-content">
                <div class="error-icon">🚗</div>
                <h1><?php _e('404', 'rengasliike-lappeenranta'); ?></h1>
                <h2><?php _e('Sivua ei löytynyt', 'rengasliike-lappeenranta'); ?></h2>
                <p><?php _e('Valitettavasti etsimääsi sivua ei löytynyt. Se on saattanut siirtyä tai poistua.', 'rengasliike-lappeenranta'); ?></p>
                
                <div class="error-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><?php _e('Etusivulle', 'rengasliike-lappeenranta'); ?></a>
                    <a href="<?php echo esc_url(home_url('/palvelut/')); ?>" class="btn btn-secondary"><?php _e('Palvelut', 'rengasliike-lappeenranta'); ?></a>
                    <a href="<?php echo esc_url(home_url('/yhteystiedot/')); ?>" class="btn btn-secondary"><?php _e('Yhteystiedot', 'rengasliike-lappeenranta'); ?></a>
                </div>
                
                <div class="error-search">
                    <h3><?php _e('Etsi sivustolta', 'rengasliike-lappeenranta'); ?></h3>
                    <?php get_search_form(); ?>
                </div>
                
                <div class="error-suggestions">
                    <h3><?php _e('Suosittelemme:', 'rengasliike-lappeenranta'); ?></h3>
                    <div class="suggestions-grid">
                        <div class="suggestion-card">
                            <h4><?php _e('Palvelut', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php _e('Tutustu kattaviin rengaspalveluihimme', 'rengasliike-lappeenranta'); ?></p>
                            <a href="<?php echo esc_url(home_url('/palvelut/')); ?>" class="btn btn-secondary"><?php _e('Katso palvelut', 'rengasliike-lappeenranta'); ?></a>
                        </div>
                        
                        <div class="suggestion-card">
                            <h4><?php _e('Rengasmerkit', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php _e('Laaja valikoima laadukkaita rengasmerkkejä', 'rengasliike-lappeenranta'); ?></p>
                            <a href="<?php echo esc_url(home_url('/merkit/')); ?>" class="btn btn-secondary"><?php _e('Katso merkit', 'rengasliike-lappeenranta'); ?></a>
                        </div>
                        
                        <div class="suggestion-card">
                            <h4><?php _e('Yhteystiedot', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php _e('Ota yhteyttä ja varaa aika palveluun', 'rengasliike-lappeenranta'); ?></p>
                            <a href="<?php echo esc_url(home_url('/yhteystiedot/')); ?>" class="btn btn-secondary"><?php _e('Ota yhteyttä', 'rengasliike-lappeenranta'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 