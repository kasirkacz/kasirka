<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */
 
global $theretailer_theme_options;

global $wp_query;

//woocommerce_before_main_content
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

add_action( 'woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20 );

//woocommerce_before_shop_loop
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'woocommerce_before_shop_loop_result_count', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop_catalog_ordering', 'woocommerce_catalog_ordering', 30 );
remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );

$archive_product_sidebar = 'no';

if ( ($theretailer_theme_options['sidebar_listing']) && ($theretailer_theme_options['sidebar_listing'] == 1) ) { 
	$archive_product_sidebar = 'yes';
};

if (isset($_GET["product_listing_sidebar"])) {
	$archive_product_sidebar = $_GET["product_listing_sidebar"];
}

$category_header_src = "";

if (function_exists('woocommerce_get_header_image_url')) {
	$category_header_src = woocommerce_get_header_image_url();
}

$description = apply_filters( 'the_content', term_description() );

get_header('shop'); 

?>

<div class="global_content_wrapper">

	<div <?php if ((isset($theretailer_theme_options['category_header_parallax'])) && ($theretailer_theme_options['category_header_parallax'] == "1")) : ?>data-stellar-background-ratio="0.5"<?php endif;?> class="category_header <?php if ( $description ) : ?>with_term_description<?php endif; ?> <?php if ($category_header_src != "") : ?>with_featured_img<?php endif; ?>" style="background-image:url(<?php echo $category_header_src ; ?>)">
		
		<div class="category_header_overlay"></div>
			
		<div class="container_12">
			<div class="grid_10 push_1">

				<?php do_action('woocommerce_before_main_content'); ?>

				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

					<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

				<?php endif; ?>

				<?php do_action( 'woocommerce_archive_description' ); ?>
				
			</div>
		</div>
		
	</div>

</div>	
	
<div class="container_12">

    <div class="<?php echo ($archive_product_sidebar != "yes") ? 'grid_12' : 'grid_9 push_3 shop_with_sidebar'; ?>">
			
    	<div class="<?php echo ($archive_product_sidebar != "yes") ? 'listing_products_no_sidebar' : 'listing_products'; ?>">
    
			<?php do_action( 'woocommerce_before_shop_loop' ); ?>
		
	        <?php if ( is_tax() ) : ?>

	            <?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>

	        <?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>

	            <?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>

	        <?php endif; ?>

			<?php 
	            $parent_id      = get_queried_object_id();
				$categories     = get_terms('product_cat', array('hide_empty' => 0, 'parent' => $parent_id));
				$display_mode 	= woocommerce_get_loop_display_mode();
	        ?>
    
	        <?php if ( $display_mode == 'subcategories' || $display_mode == 'both' ) : ?>

	            <?php if ($categories) : ?>
	            
	                 <ul class="products-categories">
	                       
	                	<?php $cat_counter = 0; ?>
	                   
	                	<?php foreach($categories as $category) : ?>

	                   		<li class="product-category product">
								<div class="product-category-inner">
									<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>"></a>

									<?php 
										$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
	                                    $image = wp_get_attachment_url( $thumbnail_id );
	                                ?>
									
	                                <?php if($image) : ?>
	                                	<a class="img_zoom_in" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
											<img src="<?php echo esc_url($image); ?>">	
											<h3><?php echo esc_html($category->name); ?> <mark class="count">(<?php echo $category->count; ?>)</mark></h3>
										</a>
									<?php else : ?>
										<a class="img_zoom_in thumb-placeholder" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
											<img src="<?php echo WC()->plugin_url() . '/assets/images/placeholder.png'; ?>">	
											<h3><?php echo esc_html($category->name); ?> <mark class="count">(<?php echo $category->count; ?>)</mark></h3>
										</a>
									<?php endif; ?>
								</div><!--.product-category-inner-->
							</li>
	                   
	                	<?php endforeach; ?>
	                       
	                </ul><!-- .list_shop_categories-->

	                <div class="clear"></div>

	            <?php endif; ?>

	        <?php endif; ?>
        
	        <?php if ( $display_mode != 'subcategories' ) : ?>
			
				<?php if ( (function_exists('woocommerce_product_loop') && woocommerce_product_loop()) || have_posts() ) : ?>

					<div class="catalog_top <?php echo ($display_mode == 'both' && $categories) ? 'catalog_top_margin' : ''; ?>">
	                
		                <?php
						  
						if ((isset($theretailer_theme_options['breadcrumbs'])) && ($theretailer_theme_options['breadcrumbs'] == "1")) {
							do_action('woocommerce_before_main_content_breadcrumb');
						} else {
							do_action('woocommerce_before_shop_loop_result_count');
						}
						
						do_action( 'woocommerce_before_shop_loop_catalog_ordering' );
						
						?>
		                
		                <div class="clr"></div>
		        
		                <div class="hr shop_separator"></div>
		            
		            </div>

		            <?php woocommerce_product_loop_start(); ?>
		            
					<?php while ( have_posts() ) : the_post(); ?>
		                
		                <?php wc_get_template_part( 'content', 'product' ); ?>
		               
		            <?php endwhile; // end of the loop. ?>
		            
		    		<?php woocommerce_product_loop_end(); ?>

		    		<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		            
		        <?php else : ?>

	                <p class="no-products-message"><?php esc_html_e( 'No products were found matching your selection.', 'woocommerce' ); ?></p>

		        <?php endif; ?>

		    <?php endif; ?>

        	<div class="clear"></div>
    
        </div>

    </div>
    
    <?php if ($archive_product_sidebar == "yes") { ?>  
        <?php if ( is_active_sidebar( 'widgets_product_listing' ) ) : ?>
            <div class="grid_3 pull_9">
                <div class="gbtr_aside_column_left">
                    <?php dynamic_sidebar('widgets_product_listing'); ?>
                </div>
            </div>            
        <?php endif; ?>
                  
    <?php } ?>           
    
<?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_template_part("light_footer"); ?>
<?php get_template_part("dark_footer"); ?>

<?php get_footer('shop'); ?>

</div>
