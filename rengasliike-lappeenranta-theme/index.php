<?php
/**
 * The main template file
 */

get_header(); ?>

<main>
    <?php if (is_home() && !is_front_page()) : ?>
        <section class="page-header">
            <div class="container">
                <h2><?php single_post_title(); ?></h2>
                <?php if (get_the_archive_description()) : ?>
                    <p><?php the_archive_description(); ?></p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <section class="blog-posts">
            <div class="container">
                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="post-header">
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date"><?php echo get_the_date(); ?></span>
                                        <?php if (has_category()) : ?>
                                            <span class="post-categories"><?php the_category(', '); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </header>
                                
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="post-footer">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('Read More', 'rengasliike-lappeenranta'); ?></a>
                                </footer>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <?php
                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Previous', 'rengasliike-lappeenranta'),
                    'next_text' => __('Next', 'rengasliike-lappeenranta'),
                ));
                ?>
            </div>
        </section>
    <?php else : ?>
        <section class="no-posts">
            <div class="container">
                <h2><?php _e('No posts found', 'rengasliike-lappeenranta'); ?></h2>
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'rengasliike-lappeenranta'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?> 