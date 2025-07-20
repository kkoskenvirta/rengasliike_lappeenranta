<?php
/**
 * The template for displaying search results
 */

get_header(); ?>

<main>
    <section class="page-header">
        <div class="container">
            <h2><?php printf(__('Hakutulokset: %s', 'rengasliike-lappeenranta'), '<span>' . get_search_query() . '</span>'); ?></h2>
            <p><?php printf(_n('%s hakutulos löytyi', '%s hakutulosta löytyi', $wp_query->found_posts, 'rengasliike-lappeenranta'), number_format_i18n($wp_query->found_posts)); ?></p>
        </div>
    </section>

    <?php if (have_posts()) : ?>
        <section class="search-results">
            <div class="container">
                <div class="results-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('result-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="result-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="result-content">
                                <header class="result-header">
                                    <h3 class="result-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="result-meta">
                                        <span class="result-type">
                                            <?php
                                            $post_type = get_post_type();
                                            switch ($post_type) {
                                                case 'services':
                                                    echo __('Palvelu', 'rengasliike-lappeenranta');
                                                    break;
                                                case 'brands':
                                                    echo __('Rengasmerkki', 'rengasliike-lappeenranta');
                                                    break;
                                                case 'testimonials':
                                                    echo __('Asiakaskokemus', 'rengasliike-lappeenranta');
                                                    break;
                                                default:
                                                    echo __('Sivu', 'rengasliike-lappeenranta');
                                            }
                                            ?>
                                        </span>
                                        <span class="result-date"><?php echo get_the_date(); ?></span>
                                    </div>
                                </header>
                                
                                <div class="result-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="result-footer">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('Lue lisää', 'rengasliike-lappeenranta'); ?></a>
                                </footer>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <?php
                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Edellinen', 'rengasliike-lappeenranta'),
                    'next_text' => __('Seuraava', 'rengasliike-lappeenranta'),
                ));
                ?>
            </div>
        </section>
    <?php else : ?>
        <section class="no-results">
            <div class="container">
                <h2><?php _e('Ei hakutuloksia', 'rengasliike-lappeenranta'); ?></h2>
                <p><?php _e('Valitettavasti hakusi ei tuottanut tuloksia. Kokeile eri hakusanoja tai selaa palveluitamme.', 'rengasliike-lappeenranta'); ?></p>
                
                <div class="search-suggestions">
                    <h3><?php _e('Suosittelemme:', 'rengasliike-lappeenranta'); ?></h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/palvelut/')); ?>"><?php _e('Kaikki palvelut', 'rengasliike-lappeenranta'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/merkit/')); ?>"><?php _e('Rengasmerkit', 'rengasliike-lappeenranta'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/yhteystiedot/')); ?>"><?php _e('Yhteystiedot', 'rengasliike-lappeenranta'); ?></a></li>
                    </ul>
                </div>
                
                <?php get_search_form(); ?>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?> 