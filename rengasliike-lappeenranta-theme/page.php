<?php
/**
 * The template for displaying all pages
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
                                    <span class="tire-icon">📄</span>
                                    <span class="tire-text"><?php the_title(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php else : ?>
                <section class="page-header">
                    <div class="container">
                        <h2><?php the_title(); ?></h2>
                        <?php if (get_the_excerpt()) : ?>
                            <p><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <section class="page-content">
                <div class="container">
                    <div class="content-wrapper">
                        <?php the_content(); ?>
                        
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