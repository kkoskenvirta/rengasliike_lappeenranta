<?php
/**
 * The template for displaying services archive
 */

get_header(); ?>

<main>
    <section class="page-header">
        <div class="hero">
            <div class="hero-content">
                <h2><?php _e('Kattavat rengaspalvelut', 'rengasliike-lappeenranta'); ?></h2>
                <p><?php _e('Tarjoamme ammattitaitoista palvelua kaikille ajoneuvoille - henkilöautot, pakettiautot ja kuorma-autot', 'rengasliike-lappeenranta'); ?></p>
                <div class="hero-buttons">
                    <a href="#services" class="btn btn-primary"><?php _e('Katso palvelut', 'rengasliike-lappeenranta'); ?></a>
                    <a href="<?php echo esc_url(home_url('/yhteystiedot/')); ?>" class="btn btn-secondary"><?php _e('Ota yhteyttä', 'rengasliike-lappeenranta'); ?></a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1486006920555-c77dcf18193c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="<?php _e('Ammattitaitoinen autopalvelu', 'rengasliike-lappeenranta'); ?>" class="hero-car-image">
                <div class="hero-overlay">
                    <div class="tire-badge">
                        <span class="tire-icon">🔧</span>
                        <span class="tire-text"><?php _e('Ammattipalvelu', 'rengasliike-lappeenranta'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="container">
            <h3><?php _e('Ammattitaitoiset rengaspalvelut', 'rengasliike-lappeenranta'); ?></h3>
            <p class="services-intro"><?php _e('Tarjoamme edulliset, laadukkaat ja ammattitaitoiset rengaspalvelut kaikille ajoneuvoille. Palveluihimme kuuluvat renkaiden vaihdot, tasapainotukset, paikkaukset sekä asiantunteva neuvonta.', 'rengasliike-lappeenranta'); ?></p>
            
            <div class="services-grid">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $service_icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: '🔧';
                        $service_price = get_post_meta(get_the_ID(), '_service_price', true);
                        $service_features = get_post_meta(get_the_ID(), '_service_features', true);
                        ?>
                        <div class="service-card">
                            <div class="service-icon"><?php echo $service_icon; ?></div>
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            
                            <?php if ($service_price) : ?>
                                <div class="service-price">
                                    <strong><?php _e('Hinta:', 'rengasliike-lappeenranta'); ?></strong> <?php echo esc_html($service_price); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($service_features) : ?>
                                <ul>
                                    <?php
                                    $features = explode("\n", $service_features);
                                    $feature_count = 0;
                                    foreach ($features as $feature) :
                                        if (trim($feature) && $feature_count < 4) :
                                            $feature_count++;
                                    ?>
                                        <li><?php echo esc_html(trim($feature)); ?></li>
                                    <?php 
                                        endif;
                                    endforeach;
                                    ?>
                                </ul>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('Lue lisää', 'rengasliike-lappeenranta'); ?></a>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!-- Fallback services if no custom posts exist -->
                    <div class="service-card">
                        <div class="service-icon">🏨</div>
                        <h3><?php _e('Rengashotelli', 'rengasliike-lappeenranta'); ?></h3>
                        <p><?php _e('Turvallinen säilytys renkaillesi vaihtokauden ajaksi. Rengashotelli tarjoaa optimaaliset olosuhteet renkaiden säilyttämiseen.', 'rengasliike-lappeenranta'); ?></p>
                        <ul>
                            <li><?php _e('Turvallinen säilytys', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Optimaaliset olosuhteet', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Vaihtokauden palvelu', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Rengasrekisteri', 'rengasliike-lappeenranta'); ?></li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">🔄</div>
                        <h3><?php _e('Renkaanvaihto', 'rengasliike-lappeenranta'); ?></h3>
                        <p><?php _e('Täydellinen renkaanvaihtopalvelu, joka sisältää renkaiden pesun, paineiden tarkistuksen ja lisäyksen sekä ammattitaitoisen asennuksen alle.', 'rengasliike-lappeenranta'); ?></p>
                        <ul>
                            <li><?php _e('Renkaiden pesu ja puhdistus', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Paineiden tarkistus ja säätö', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Ammattitaitoinen asennus', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Venttiilien vaihto tarvittaessa', 'rengasliike-lappeenranta'); ?></li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">🚗</div>
                        <h3><?php _e('Henkilöautojen renkaat', 'rengasliike-lappeenranta'); ?></h3>
                        <p><?php _e('Laaja valikoima kesä-, talvi- ja kausirenkaita henkilöautoihin. Kaikki suosituimmat merkit ja koot saatavilla kilpailukykyiseen hintaan.', 'rengasliike-lappeenranta'); ?></p>
                        <ul>
                            <li><?php _e('Kesä- ja talvirenkaat', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Kausirenkaat', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Runflat-renkaat', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Kaikki suosituimmat merkit', 'rengasliike-lappeenranta'); ?></li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">🔧</div>
                        <h3><?php _e('Renkaan paikkaus ja korjaus', 'rengasliike-lappeenranta'); ?></h3>
                        <p><?php _e('Renkaan paikkaus tehdään ammattitaidolla ja laadukkailla materiaaleilla. Hyvin paikattu rengas pidentää renkaan käyttöikää ja säästää rahaa.', 'rengasliike-lappeenranta'); ?></p>
                        <ul>
                            <li><?php _e('Ammattitaitoinen paikkaus', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Laadukkaat korjausmateriaalit', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Käyttöiän pidentäminen', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Kustannustehokas ratkaisu', 'rengasliike-lappeenranta'); ?></li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">⚖️</div>
                        <h3><?php _e('Tasapainoitukset', 'rengasliike-lappeenranta'); ?></h3>
                        <p><?php _e('Ammattilaisen tekemä tasapainoitus turvaa ajomukavuuden ja ohjattavuuden. Tarkka tasapainoitus poistaa tärinät ja parantaa ajokokemusta.', 'rengasliike-lappeenranta'); ?></p>
                        <ul>
                            <li><?php _e('Tarkka tasapainoitus', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Ajomukavuuden parantaminen', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Tärinöiden poisto', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Renkaiden tasainen kuluminen', 'rengasliike-lappeenranta'); ?></li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">📊</div>
                        <h3><?php _e('Rengaspainevalvonta', 'rengasliike-lappeenranta'); ?></h3>
                        <p><?php _e('TPMS-järjestelmän toiminnan tarkastus, tarvittaessa korjaus ja rikkinäisten antureiden vaihto. Säännöllinen painevalvonta turvaa turvallisuuden.', 'rengasliike-lappeenranta'); ?></p>
                        <ul>
                            <li><?php _e('TPMS-järjestelmän tarkistus', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Antureiden korjaus ja vaihto', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Painevalvonta', 'rengasliike-lappeenranta'); ?></li>
                            <li><?php _e('Turvallisuuden varmistaminen', 'rengasliike-lappeenranta'); ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing">
        <div class="container">
            <h3><?php _e('Kilpailukykyiset hinnat', 'rengasliike-lappeenranta'); ?></h3>
            <div class="pricing-grid">
                <?php
                $services_for_pricing = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));
                
                if ($services_for_pricing->have_posts()) :
                    while ($services_for_pricing->have_posts()) : $services_for_pricing->the_post();
                        $price = get_post_meta(get_the_ID(), '_service_price', true);
                        ?>
                        <div class="pricing-card">
                            <h4><?php the_title(); ?></h4>
                            <div class="price"><?php echo $price ? esc_html($price) : __('Hinta pyydettäessä', 'rengasliike-lappeenranta'); ?></div>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback pricing
                    $fallback_pricing = array(
                        array(
                            'title' => __('Rengashotelli', 'rengasliike-lappeenranta'),
                            'price' => __('Alkaen 5€/kpl', 'rengasliike-lappeenranta'),
                            'description' => __('Turvallinen säilytys vaihtokauden ajaksi', 'rengasliike-lappeenranta')
                        ),
                        array(
                            'title' => __('Renkaanvaihto', 'rengasliike-lappeenranta'),
                            'price' => __('Alkaen 15€/kpl', 'rengasliike-lappeenranta'),
                            'description' => __('Sisältää pesun, paineiden tarkistuksen ja asennuksen', 'rengasliike-lappeenranta')
                        ),
                        array(
                            'title' => __('Tasapainoitus', 'rengasliike-lappeenranta'),
                            'price' => __('Alkaen 10€/kpl', 'rengasliike-lappeenranta'),
                            'description' => __('Tarkka tasapainoitus ammattilaisella', 'rengasliike-lappeenranta')
                        )
                    );
                    
                    foreach ($fallback_pricing as $pricing_item) :
                        ?>
                        <div class="pricing-card">
                            <h4><?php echo esc_html($pricing_item['title']); ?></h4>
                            <div class="price"><?php echo esc_html($pricing_item['price']); ?></div>
                            <p><?php echo esc_html($pricing_item['description']); ?></p>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <p class="pricing-note"><?php _e('* Hinnat sisältävät ALV:n. Tarkat hinnat pyydettäessä.', 'rengasliike-lappeenranta'); ?></p>
        </div>
    </section>
</main>

<?php get_footer(); ?> 