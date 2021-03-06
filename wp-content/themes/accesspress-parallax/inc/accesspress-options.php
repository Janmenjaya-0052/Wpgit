<?php

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'accesspress_parallax'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {

    // Test data
    $transitions = array(
        'fade' => __( 'Fade', 'accesspress-parallax' ),
        'horizontal' => __( 'Slide Horizontal', 'accesspress-parallax' ),
    );

    $overlay = array(
        'overlay0' => __( 'No Overlay', 'accesspress-parallax' ),
        'overlay1' => __( 'Small Dotted', 'accesspress-parallax' ),
        'overlay2' => __( 'Large Dotted', 'accesspress-parallax' ),
        'overlay3' => __( 'Light Black', 'accesspress-parallax' ),
        'overlay4' => __( 'Black Dotted', 'accesspress-parallax' )
    );

    $section_template = array(
        'default_template' => __( 'Default Section', 'accesspress-parallax' ),
        'service_template' => __( 'Service Section', 'accesspress-parallax' ),
        'team_template' => __( 'Team Section', 'accesspress-parallax' ),
        'portfolio_template' => __( 'Portfolio Section', 'accesspress-parallax' ),
        'testimonial_template' => __( 'Testimonial Section', 'accesspress-parallax' ),
        'blog_template' => __( 'Blog Section', 'accesspress-parallax' ),
        'action_template' => __( 'Call to Action Section', 'accesspress-parallax' ),
        'googlemap_template' => __( 'Google Map Section', 'accesspress-parallax' ),
        'blank_template' => __( 'Blank Section', 'accesspress-parallax' ),
    );

    $check = array(
        'yes' => __( 'Yes', 'accesspress-parallax' ),
        'no' => __( 'No', 'accesspress-parallax' )
    );

    // Background Defaults
    $background_defaults = array(
        'color' => '',
        'image' => '',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment' => 'scroll',
        'size' => 'cover',
    );

    // Parallax Defaults
    $parallax_defaults = NULL;


    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    $options_categories[ '' ] = 'Select a Category:';
    foreach ( $options_categories_obj as $category ) {
        $options_categories[ $category->cat_ID ] = $category->cat_name;
    }

    // Pull all tags into an array
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ( $options_tags_obj as $tag ) {
        $options_tags[ $tag->term_id ] = $tag->name;
    }


    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
    $options_pages[ '' ] = 'Select a page:';
    foreach ( $options_pages_obj as $page ) {
        $options_pages[ $page->ID ] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/inc/options-framework/images/';

    $options = array();

    $options[] = array(
        'name' => __( 'General Settings', 'accesspress-parallax' ),
        'type' => 'heading' );

    $options[] = array(
        'name' => __( 'Enable Single Page Parallax Home Page - if disabled, will show Blog-roll/Static-page', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'enable_parallax',
        'type' => 'checkbox' );

    $options[] = array(
        'name' => __( 'Template Color', 'accesspress-parallax' ),
        'desc' => __( 'Set the template color for the site.', 'accesspress-parallax' ),
        'id' => 'template_color',
        'std' => '#E66432',
        'type' => 'color' );

    $options[] = array(
        'name' => __( 'Enable Single Page Nav(Menu) - if disabled, will show primary menu', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'enable_parallax_nav',
        'std' => '1',
        'type' => 'checkbox' );

    $options[] = array(
        'name' => __( 'Home Menu Text - Single Page Nav(Menu)', 'accesspress-parallax' ),
        'id' => 'home_text',
        'desc' => __( 'Leave blank if you do not want to show', 'accesspress-parallax' ),
        'std' => 'Home',
        'type' => 'text' );

    $options[] = array(
        'name' => __( 'Enable Animation on scroll - Page Elements will show with some animation only in home page.', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'enable_animation',
        'std' => '1',
        'type' => 'checkbox' );


    $options[] = array(
        'name' => __( 'Upload Logo', 'accesspress-parallax' ),
        'desc' => '<a target="_blank" href="' . admin_url() . 'themes.php?page=custom-header" class="button">' . __( 'Upload', 'accesspress-parallax' ) . '</a>',
        'type' => 'info' );

    $options[] = array(
        'name' => __( 'Upload Fav Icon', 'accesspress-parallax' ),
        'id' => 'fav_icon',
        'class' => 'sub-option',
        'type' => 'upload' );

    $options[] = array(
        'name' => __( 'Select Header Layout', 'accesspress-parallax' ),
        'id' => "header_layout",
        'std' => "logo-side",
        'type' => "images",
        'options' => array(
            'logo-side' => $imagepath . 'logo-side.jpg',
            'logo-top' => $imagepath . 'logo-top.jpg' )
    );

    $options[] = array(
        'name' => __( 'Parallax Sections', 'accesspress-parallax' ),
        'type' => 'heading' );

    $options[] = array(
        'desc' => __( '<strong>Note: Please make a new page before you create a section. Each Section should have unique Page.</strong>', 'accesspress-parallax' ),
        'id' => 'parallax_info',
        'type' => 'info' );

    $options[] = array(
        'id' => 'parallax_section',
        'std' => $parallax_defaults,
        'options' => $options_pages,
        'overlay' => $overlay,
        'category' => $options_categories,
        'layout' => $section_template,
        'type' => 'parallaxsection' );

    $options[] = array(
        'id' => 'parallax_count',
        'type' => 'hidden',
        'std' => '50'
    );

    $options[] = array(
        'id' => 'add_new_section',
        'type' => 'button' );

    /* Post Section Ends */
    $options[] = array(
        'name' => __( 'Post Settings', 'accesspress-parallax' ),
        'type' => 'heading' );

    $options[] = array(
        'name' => __( 'Show Posted Date', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'post_date',
        'std' => '1',
        'type' => 'checkbox' );

    $options[] = array(
        'name' => __( 'Show Post Author', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'post_author',
        'std' => '1',
        'type' => 'checkbox' );

    $options[] = array(
        'name' => __( 'Show Post Footer text', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'post_footer',
        'std' => '1',
        'type' => 'checkbox' );

    $options[] = array(
        'name' => __( 'Show Prev Next Pagination', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'post_pagination',
        'std' => '1',
        'type' => 'checkbox' );

    /* Parallax Section Ends */
    $options[] = array(
        'name' => __( 'Slider Settings', 'accesspress-parallax' ),
        'type' => 'heading' );

    $options[] = array(
        'name' => __( 'Show Slider', 'accesspress-parallax' ),
        'id' => 'show_slider',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $check );

    if ( $options_categories ) {
        $options[] = array(
            'name' => __( 'Select a Category', 'accesspress-parallax' ),
            'id' => 'slider_category',
            'type' => 'select',
            'options' => $options_categories );
    }

    $options[] = array(
        'name' => __( 'Show full window', 'accesspress-parallax' ),
        'id' => 'slider_full_window',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $check );

    $options[] = array(
        'name' => __( 'Remove Slider overlay - Black Dots', 'accesspress-parallax' ),
        'id' => 'slider_overlay',
        'std' => 'no',
        'type' => 'radio',
        'options' => $check );

    $options[] = array(
        'name' => __( 'Show Slider Dots', 'accesspress-parallax' ),
        'id' => 'show_pager',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $check );

    $options[] = array(
        'name' => __( 'Show Slider Arrows', 'accesspress-parallax' ),
        'id' => 'show_controls',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $check );

    $options[] = array(
        'name' => __( 'Auto Transition', 'accesspress-parallax' ),
        'id' => 'auto_transition',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $check );

    $options[] = array(
        'name' => __( 'Slider Transition', 'accesspress-parallax' ),
        'id' => 'slider_transition',
        'std' => 'fade',
        'type' => 'radio',
        'options' => $transitions );

    $options[] = array(
        'name' => __( 'Slider Transition Speed', 'accesspress-parallax' ),
        'id' => 'slider_speed',
        'std' => '1000',
        'type' => 'text' );

    $options[] = array(
        'name' => __( 'Slider Pause Duration', 'accesspress-parallax' ),
        'id' => 'slider_pause',
        'std' => '5000',
        'type' => 'text' );

    $options[] = array(
        'name' => __( 'Show Caption', 'accesspress-parallax' ),
        'id' => 'show_caption',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $check );

    $options[] = array(
        'name' => __( 'Social Links', 'accesspress-parallax' ),
        'type' => 'heading' );

    $options[] = array(
        'name' => __( 'Show Social Icon', 'accesspress-parallax' ),
        'desc' => __( 'Check To enable', 'accesspress-parallax' ),
        'id' => 'show_social',
        'std' => '1',
        'type' => 'checkbox' );

    $options[] = array(
        'name' => __( 'Facebook', 'accesspress-parallax' ),
        'id' => 'facebook',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Twitter', 'accesspress-parallax' ),
        'id' => 'twitter',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Google Plus', 'accesspress-parallax' ),
        'id' => 'google_plus',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Youtube', 'accesspress-parallax' ),
        'id' => 'youtube',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Pinterest', 'accesspress-parallax' ),
        'id' => 'pinterest',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Linkedin', 'accesspress-parallax' ),
        'id' => 'linkedin',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Fickr', 'accesspress-parallax' ),
        'id' => 'flickr',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Vimeo', 'accesspress-parallax' ),
        'id' => 'vimeo',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Instagram', 'accesspress-parallax' ),
        'id' => 'instagram',
        'type' => 'url' );

    $options[] = array(
        'name' => __( 'Skype', 'accesspress-parallax' ),
        'id' => 'skype',
        'type' => 'text' );

    $options[] = array(
        'name' => __( 'Tools', 'accesspress-parallax' ),
        'type' => 'heading' );

    $options[] = array(
        'name' => __( 'Custom CSS', 'accesspress-parallax' ),
        'id' => 'custom_css',
        'type' => 'textarea',
        'desc' => __( 'Put your custom CSS here', 'accesspress-parallax' ) );

    $options[] = array(
        'name' => __( 'Excerpt length', 'accesspress-parallax' ),
        'id' => 'blog_excerpt_length',
        'std' => '150',
        'type' => 'number' );

    return $options;
}
