<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

global $post;

if ( ! $post->post_excerpt ) return;
?>

    <div itemprop="description" class="entry-content gbtr_product_description">
        <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
    </div>
