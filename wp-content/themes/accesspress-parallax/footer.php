<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package accesspress_parallax
 */
?>

</div><!-- #content -->
<?php
$custom_footer_page_id = accesspress_parallax_of_get_option( 'custom_footer_page' );
if( isset($custom_footer_page_id) && !empty($custom_footer_page_id) && defined('ELEMENTOR_VERSION') ) :?>
    <footer id="ap-custom-footer" class="ap-custom-footer-wrapper">
        <?php echo \Elementor\Plugin::$instance->frontend->get_builder_content( $custom_footer_page_id ); ?>
    </footer>
        <?php 
else: ?>
    <footer id="colophon" class="site-footer">

        <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
            <div class="top-footer footer-column-<?php echo esc_attr( accesspress_footer_count() ); ?>">
                <div class="mid-content">
                    <div class="top-footer-wrap clearfix">
                        <?php if ( is_active_sidebar( 'footer-1' ) ): ?>
                            <div class="footer-block">
                                <?php dynamic_sidebar( 'footer-1' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-2' ) ): ?>
                            <div class="footer-block">
                                <?php dynamic_sidebar( 'footer-2' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-3' ) ): ?>
                            <div class="footer-block">
                                <?php dynamic_sidebar( 'footer-3' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-4' ) ): ?>
                            <div class="footer-block">
                                <?php dynamic_sidebar( 'footer-4' ); ?>
                            </div>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <div class="bottom-footer">
            <div class="mid-content clearfix">
                <div  class="copy-right">
                    &copy; <?php
                    echo esc_html( date( 'Y' ) ) . " ";
                    bloginfo( 'name' );
                    ?>  
                </div><!-- .copy-right -->
                <div class="site-info">
                    WordPress Theme:
                    <a href="<?php echo esc_url( 'https://accesspressthemes.com/wordpress-themes/accesspress-parallax' ); ?>" title="WordPress Free Themes" target="_blank">AccessPress Parallax</a>
                </div><!-- .site-info -->
            </div>
        </div>
    </footer><!-- #colophon -->
<?php endif;?>
</div><!-- #page -->

<div id="go-top"><a href="#page"><i class="fa fa-angle-up"></i></a></div>
<?php wp_footer(); ?>
</body>
</html>