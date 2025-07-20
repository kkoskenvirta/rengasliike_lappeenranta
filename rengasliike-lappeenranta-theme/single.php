<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <section class="page-header">
                    <div class="hero">
                        <div class="hero-image">
                            <?php the_post_thumbnail('hero-image', array('class' => 'hero-car-image')); ?>
                            <div class="hero-overlay">
                                <div class="tire-badge">
                                    <span class="tire-icon">📝</span>
                                    <span class="tire-text"><?php _e('Blogi', 'rengasliike-lappeenranta'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php else : ?>
                <section class="page-header">
                    <div class="container">
                        <h2><?php the_title(); ?></h2>
                        <div class="post-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <?php if (has_category()) : ?>
                                <span class="post-categories"><?php the_category(', '); ?></span>
                            <?php endif; ?>
                            <?php if (has_tag()) : ?>
                                <span class="post-tags"><?php the_tags('', ', '); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <section class="post-content">
                <div class="container">
                    <div class="content-wrapper">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Sivut:', 'rengasliike-lappeenranta'),
                            'after'  => '</div>',
                        ));
                        ?>
                        
                        <footer class="post-footer">
                            <div class="post-navigation">
                                <?php
                                $prev_post = get_previous_post();
                                $next_post = get_next_post();
                                ?>
                                
                                <?php if ($prev_post) : ?>
                                    <div class="nav-previous">
                                        <a href="<?php echo get_permalink($prev_post); ?>">
                                            <span class="nav-subtitle"><?php _e('← Edellinen', 'rengasliike-lappeenranta'); ?></span>
                                            <span class="nav-title"><?php echo get_the_title($prev_post); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($next_post) : ?>
                                    <div class="nav-next">
                                        <a href="<?php echo get_permalink($next_post); ?>">
                                            <span class="nav-subtitle"><?php _e('Seuraava →', 'rengasliike-lappeenranta'); ?></span>
                                            <span class="nav-title"><?php echo get_the_title($next_post); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </footer>
                        
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
            </section>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?> 