<?php
/**
 * The front page template
 */

get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero">
            <div class="hero-content">
                <?php if (get_theme_mod('hero_title')) : ?>
                    <h2><?php echo esc_html(get_theme_mod('hero_title', 'Laadukkaat renkaat, vanteet ja ammattitaitoinen palvelu')); ?></h2>
                <?php else : ?>
                    <h2><?php _e('Laadukkaat renkaat, vanteet ja ammattitaitoinen palvelu', 'rengasliike-lappeenranta'); ?></h2>
                <?php endif; ?>
                
                <?php if (get_theme_mod('hero_subtitle')) : ?>
                    <p><?php echo esc_html(get_theme_mod('hero_subtitle', 'Rengasliike Lappeenranta tarjoaa laajan valikoiman renkaita, vanteita ja ammattitaitoista palvelua kaikille ajoneuvoille')); ?></p>
                <?php else : ?>
                    <p><?php _e('Rengasliike Lappeenranta tarjoaa laajan valikoiman renkaita, vanteita ja ammattitaitoista palvelua kaikille ajoneuvoille', 'rengasliike-lappeenranta'); ?></p>
                <?php endif; ?>
                
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('palvelut'))); ?>" class="btn btn-primary"><?php _e('Katso palvelut', 'rengasliike-lappeenranta'); ?></a>
                    <a href="#appointment" class="btn btn-secondary"><?php _e('Renkaat ja Vanteet', 'rengasliike-lappeenranta'); ?></a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('yhteystiedot'))); ?>" class="btn btn-secondary"><?php _e('Ota yhteyttä', 'rengasliike-lappeenranta'); ?></a>
                </div>
            </div>
            <div class="hero-image">
                <?php if (get_theme_mod('hero_image')) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('hero_image')); ?>" alt="<?php _e('Laadukas auto renkailla', 'rengasliike-lappeenranta'); ?>" class="hero-car-image">
                <?php else : ?>
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="<?php _e('Laadukas auto renkailla', 'rengasliike-lappeenranta'); ?>" class="hero-car-image">
                <?php endif; ?>
                <div class="hero-overlay">
                    <div class="tire-badge">
                        <span class="tire-icon">🛞</span>
                        <span class="tire-text"><?php _e('Ammattitaitoinen palvelu', 'rengasliike-lappeenranta'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h3><?php _e('Miksi valita Rengasliike Lappeenranta?', 'rengasliike-lappeenranta'); ?></h3>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚗</div>
                    <h4><?php _e('Laaja valikoima', 'rengasliike-lappeenranta'); ?></h4>
                    <p><?php _e('Renkaat kaikille ajoneuvoille - henkilöautot, pakettiautot', 'rengasliike-lappeenranta'); ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔧</div>
                    <h4><?php _e('Ammattitaitoinen palvelu', 'rengasliike-lappeenranta'); ?></h4>
                    <p><?php _e('Kokenut henkilökunta auttaa löytämään juuri sinulle sopivat renkaat', 'rengasliike-lappeenranta'); ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h4><?php _e('Kilpailukykyiset hinnat', 'rengasliike-lappeenranta'); ?></h4>
                    <p><?php _e('Laadukkaat renkaat edulliseen hintaan', 'rengasliike-lappeenranta'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="appointment-section" id="appointment">
        <div class="container">
            <h3><?php _e('Varaa aika palveluun', 'rengasliike-lappeenranta'); ?></h3>
            <p><?php _e('Varaa aika renkaiden vaihtoon tai muuhun palveluun verkossa', 'rengasliike-lappeenranta'); ?></p>
            <div class="appointment-button">
                <a href="<?php echo esc_url(rengasliike_get_contact_info('appointment_url')); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                    <?php _e('Varaa aika verkossa →', 'rengasliike-lappeenranta'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Brands Section -->
    <section class="brands">
        <div class="container">
            <h3><?php _e('Suosituimmat rengasmerkit', 'rengasliike-lappeenranta'); ?></h3>
            <div class="brands-grid">
                <?php
                $brands = new WP_Query(array(
                    'post_type' => 'brands',
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));
                
                if ($brands->have_posts()) :
                    while ($brands->have_posts()) : $brands->the_post();
                        $brand_url = get_post_meta(get_the_ID(), '_brand_url', true);
                        ?>
                        <div class="brand-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php echo esc_url($brand_url); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php the_post_thumbnail('brand-logo', array('class' => 'brand-logo')); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo esc_url($brand_url); ?>" target="_blank" rel="noopener noreferrer">
                                    <h4><?php the_title(); ?></h4>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback to static brands
                    $static_brands = array(
                        array('name' => 'Goodyear', 'image' => 'goodyear.png'),
                        array('name' => 'Michelin', 'image' => 'michelin.png'),
                        array('name' => 'Bridgestone', 'image' => 'bridgestone.png'),
                        array('name' => 'Continental', 'image' => 'continental.png'),
                        array('name' => 'Pirelli', 'image' => 'pirelli.png'),
                        array('name' => 'Nokian', 'image' => 'nokian.png'),
                    );
                    
                    foreach ($static_brands as $brand) :
                        ?>
                        <div class="brand-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($brand['image']); ?>" alt="<?php echo esc_attr($brand['name']); ?>" class="brand-logo">
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Goodyear Showcase Section -->
    <section class="goodyear-showcase">
        <div class="container">
            <div class="goodyear-showcase-content">
                <div class="goodyear-showcase-text">
                    <div class="goodyear-badge">
                        <span class="goodyear-icon">🛞</span>
                        <span><?php _e('Virallinen Goodyear-jälleenmyyjä', 'rengasliike-lappeenranta'); ?></span>
                    </div>
                    <h3><?php _e('Goodyearin laadukkaat renkaat', 'rengasliike-lappeenranta'); ?></h3>
                    <p><?php _e('Tutustu Goodyearin laajaan valikoimaan kesä- ja talvirenkaita. Laadukkaat renkaat turvalliseen ajoon kaikissa olosuhteissa.', 'rengasliike-lappeenranta'); ?></p>
                    <div class="goodyear-features">
                        <span class="feature-tag">✓ <?php _e('Kesärenkaat', 'rengasliike-lappeenranta'); ?></span>
                        <span class="feature-tag">✓ <?php _e('Talvirenkaat', 'rengasliike-lappeenranta'); ?></span>
                        <span class="feature-tag">✓ <?php _e('Ympärivuotiset', 'rengasliike-lappeenranta'); ?></span>
                    </div>
                </div>
                <div class="goodyear-showcase-visual">
                    <div class="goodyear-showcase-button">
                        <a href="https://www.goodyear.eu/fi_fi/consumer/all-dealers/lappeenranta/rengasliike-lappeenrantaac-rengas-21447.html" target="_blank" rel="noopener noreferrer" class="btn btn-goodyear">
                            <span class="btn-text"><?php _e('Katso Goodyearin valikoima →', 'rengasliike-lappeenranta'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wheels Showcase Section -->
    <section class="wheels-showcase">
        <div class="container">
            <div class="wheels-showcase-content">
                <div class="wheels-showcase-text">
                    <div class="wheels-badge">
                        <span class="wheels-icon">⚙️</span>
                        <span><?php _e('Laadukkaat vanteet', 'rengasliike-lappeenranta'); ?></span>
                    </div>
                    <h3><?php _e('Kestävät ja näyttävät vanteet', 'rengasliike-lappeenranta'); ?></h3>
                    <p><?php _e('Vanteet ovat renkaiden kruunu. Valikoimaamme kuuluvat Alcarin, Rautamon ja Special Wheels -vanteet kaikenlaisiin ajoneuvoihin.', 'rengasliike-lappeenranta'); ?></p>
                    <div class="wheels-features">
                        <span class="feature-tag">✓ <?php _e('Teräsvanteet', 'rengasliike-lappeenranta'); ?></span>
                        <span class="feature-tag">✓ <?php _e('Alumiinivanteet', 'rengasliike-lappeenranta'); ?></span>
                        <span class="feature-tag">✓ <?php _e('Offroad-vanteet', 'rengasliike-lappeenranta'); ?></span>
                    </div>
                </div>
                <div class="wheels-showcase-visual">
                    <div class="wheels-partners">
                        <div class="wheels-partner">
                            <h4><?php _e('Alcar-vanteet', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php _e('ALCAR kehittää ja valmistaa tyylikkäitä teräs-, alumiini- ja offroad-vanteita kaikenlaisiin ajoneuvoihin.', 'rengasliike-lappeenranta'); ?></p>
                            <a href="https://www.alcar.fi" target="_blank" rel="noopener noreferrer" class="btn btn-wheels">
                                <span class="btn-text">www.alcar.fi →</span>
                            </a>
                        </div>
                        <div class="wheels-partner">
                            <h4><?php _e('Rautamo-vanteet', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php _e('Rautamo tuo maahan BBS, Vossen, R-Series, Rial, GMP, Brock, Spath, Alutec, Arcasting, Stance, Vertini, Oxigin, ST ja KW -vanteita.', 'rengasliike-lappeenranta'); ?></p>
                            <a href="https://www.rautamo.fi/fi" target="_blank" rel="noopener noreferrer" class="btn btn-wheels">
                                <span class="btn-text">www.rautamo.fi →</span>
                            </a>
                        </div>
                        <div class="wheels-partner">
                            <h4><?php _e('Special Wheels-vanteet', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php _e('Pohjoismaiden suurin itsenäisen vannetoimittajan. Valikoimasta löytyy laatuvanteita kaikenlaisiin autoihin.', 'rengasliike-lappeenranta'); ?></p>
                            <a href="https://www.erikoisvanteet.fi" target="_blank" rel="noopener noreferrer" class="btn btn-wheels">
                                <span class="btn-text">www.erikoisvanteet.fi →</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h3><?php _e('Asiakkaidemme kokemukset', 'rengasliike-lappeenranta'); ?></h3>
            <div class="testimonials-grid">
                <?php
                $testimonials = new WP_Query(array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => 3,
                    'orderby' => 'rand'
                ));
                
                if ($testimonials->have_posts()) :
                    while ($testimonials->have_posts()) : $testimonials->the_post();
                        $author = get_post_meta(get_the_ID(), '_testimonial_author', true);
                        $source = get_post_meta(get_the_ID(), '_testimonial_source', true);
                        $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                        ?>
                        <div class="testimonial-card">
                            <div class="testimonial-stars">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <?php echo $i <= $rating ? '★' : '☆'; ?>
                                <?php endfor; ?>
                            </div>
                            <p class="testimonial-text"><?php echo get_the_content(); ?></p>
                            <div class="testimonial-author">
                                <span class="author-name"><?php echo esc_html($author); ?></span>
                                <span class="review-source"><?php echo esc_html($source); ?></span>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback testimonials
                    $fallback_testimonials = array(
                        array(
                            'text' => 'Pihalta löytyy parkkipaikkaa ja ulkona oli selkeä opastus sisäänkäynnille. Ystävällinen ja mukava asiakaspalvelu, (nais)asiakasta kohdattiin arvostavasti ja ammattimaisesti.',
                            'author' => 'Kati H.',
                            'source' => 'Google'
                        ),
                        array(
                            'text' => 'Hyvä ja tehokas palvelu. Ajan saaminen sesonkiaikana voi olla haastavaa, mutta onnistuu helposti netissä.',
                            'author' => 'Akseli K.',
                            'source' => 'Google'
                        ),
                        array(
                            'text' => 'Ammattitaitoinen ja luotettava palvelu. Renkaat vaihdettu nopeasti ja laadukkaasti.',
                            'author' => 'Matti S.',
                            'source' => 'Facebook'
                        )
                    );
                    
                    foreach ($fallback_testimonials as $testimonial) :
                        ?>
                        <div class="testimonial-card">
                            <div class="testimonial-stars">★★★★★</div>
                            <p class="testimonial-text"><?php echo esc_html($testimonial['text']); ?></p>
                            <div class="testimonial-author">
                                <span class="author-name"><?php echo esc_html($testimonial['author']); ?></span>
                                <span class="review-source"><?php echo esc_html($testimonial['source']); ?></span>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 