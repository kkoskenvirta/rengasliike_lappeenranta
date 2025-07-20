<?php
/**
 * Template Name: Contact Page
 * 
 * This is a custom template for the contact page
 */

get_header(); ?>

<main>
    <section class="page-header">
        <div class="hero">
            <div class="hero-content">
                <h2><?php the_title(); ?></h2>
                <?php if (get_the_excerpt()) : ?>
                    <p><?php the_excerpt(); ?></p>
                <?php endif; ?>
                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-primary"><?php _e('Ota yhteyttä', 'rengasliike-lappeenranta'); ?></a>
                    <a href="<?php echo esc_url(rengasliike_get_contact_info('appointment_url')); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary"><?php _e('Varaa aika', 'rengasliike-lappeenranta'); ?></a>
                </div>
            </div>
            <div class="hero-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('hero-image', array('class' => 'hero-car-image')); ?>
                <?php else : ?>
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="<?php _e('Yhteystiedot', 'rengasliike-lappeenranta'); ?>" class="hero-car-image">
                <?php endif; ?>
                <div class="hero-overlay">
                    <div class="tire-badge">
                        <span class="tire-icon">📞</span>
                        <span class="tire-text"><?php _e('Yhteystiedot', 'rengasliike-lappeenranta'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h3><?php _e('Yhteystiedot', 'rengasliike-lappeenranta'); ?></h3>
                    
                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div class="contact-details">
                            <h4><?php _e('Osoite', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php echo esc_html(rengasliike_get_contact_info('address')); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div class="contact-details">
                            <h4><?php _e('Puhelin', 'rengasliike-lappeenranta'); ?></h4>
                            <p><a href="tel:<?php echo esc_attr(rengasliike_get_contact_info('phone_number')); ?>"><?php echo esc_html(rengasliike_get_contact_info('phone_number')); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <div class="contact-details">
                            <h4><?php _e('Sähköposti', 'rengasliike-lappeenranta'); ?></h4>
                            <p><a href="mailto:<?php echo esc_attr(rengasliike_get_contact_info('email_address')); ?>"><?php echo esc_html(rengasliike_get_contact_info('email_address')); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">🕒</div>
                        <div class="contact-details">
                            <h4><?php _e('Aukioloajat', 'rengasliike-lappeenranta'); ?></h4>
                            <p><?php _e('Maanantai - Perjantai: 8:00 - 17:00', 'rengasliike-lappeenranta'); ?><br>
                            <?php _e('Lauantai: 9:00 - 15:00', 'rengasliike-lappeenranta'); ?><br>
                            <?php _e('Sunnuntai: Suljettu', 'rengasliike-lappeenranta'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h3><?php _e('Lähetä viesti', 'rengasliike-lappeenranta'); ?></h3>
                    <form id="contactForm" method="post" action="">
                        <div class="form-group">
                            <label for="name"><?php _e('Nimi *', 'rengasliike-lappeenranta'); ?></label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email"><?php _e('Sähköposti *', 'rengasliike-lappeenranta'); ?></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone"><?php _e('Puhelin', 'rengasliike-lappeenranta'); ?></label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="subject"><?php _e('Aihe', 'rengasliike-lappeenranta'); ?></label>
                            <input type="text" id="subject" name="subject">
                        </div>
                        
                        <div class="form-group">
                            <label for="message"><?php _e('Viesti *', 'rengasliike-lappeenranta'); ?></label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary"><?php _e('Lähetä viesti', 'rengasliike-lappeenranta'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <h3><?php _e('Sijaintimme', 'rengasliike-lappeenranta'); ?></h3>
            <div class="map-container">
                <!-- Replace with your actual Google Maps embed code -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1968.1234567890123!2d28.12345678901234!3d61.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNjHCsDA3JzM0LjQiTiAyOMKwMDcnMzQuNCJF!5e0!3m2!1sfi!2sfi!4v1234567890123" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <?php if (get_the_content()) : ?>
        <section class="page-content">
            <div class="container">
                <div class="content-wrapper">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?> 