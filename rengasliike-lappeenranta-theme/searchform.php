<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', 'rengasliike-lappeenranta'); ?></span>
        <input type="search" class="search-field" placeholder="<?php _e('Etsi palveluita...', 'rengasliike-lappeenranta'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text"><?php _e('Search', 'rengasliike-lappeenranta'); ?></span>
        🔍
    </button>
</form> 