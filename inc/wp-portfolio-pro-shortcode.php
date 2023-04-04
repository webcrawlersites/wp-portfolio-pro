<?php
function wpppro_portfolio_css() {
    /**
     * Get display Settings for shortcode
     */
    $columns = get_theme_mod( 'num_columns' );

    $my_css = '.wpppro_portfolio_container { grid-template-coluns: repeat(' . $columns . ', 1fr); }';
    wp_add_inline_style( 'enqueue_styles', $my_css );
}
add_action( 'wp_enqueue_scripts', 'wpppro_portfolio_css' );


/**
 * Renders the shortcode for the portfolio items
 */
function wpppro_create_shortcode( $atts ) {
    // Set default values for the attributes
    $atts = shortcode_atts( array(
        'columns'        => 2,
        'spacing'        => '1rem',
        'hover-bg'       => 'rgba(0,0,0, 0.75)',
        'title-color'    => 'white',
        'title-size'     => '18px',
        'show-sidebar'   => 'no'

    ), $atts, 'wpppro' );

    $layout = '<div class="wpppro_portfolio_container" 
    style="grid-template-columns: repeat(' . esc_attr( $atts["columns"] ) . ', 1fr); grid-gap: ' . esc_attr( $atts["spacing"] ) . ';">';
    
        // Create a new instance of the WP_Query class
        $query = new WP_Query( array(
            'post_type' => 'wppro-portfolio', // Custom post type
            'post_status' => 'publish', // Only retrieve published posts
            'posts_per_page' => -1, // Retrieve all posts
        ) );

        // Start the loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();

                $layout .='<div class="wpppro_item_container">';
                $layout .='<img src="' . get_the_post_thumbnail_url() . '">';
                $layout .='<div class="title-container" style="background-color:' . esc_attr( $atts["hover-bg"] ) .';">';
                $layout .= '<h3 style="color:' . esc_attr( $atts["title-color"] ) . '; font-size:' . esc_attr( $atts["title-size"] ) . ';">' . get_the_title() . '</h3></div>';
                $layout .= '<a href="' . get_permalink() . '"></a>';
                $layout .= '</div>';
            }

            // Reset the post data
            wp_reset_postdata();
        } else {
            echo "Sorry, no portfolio items found.";
        }

    $layout .= '</div>';

    return $layout;

}
add_shortcode( 'wpppro', 'wpppro_create_shortcode' );