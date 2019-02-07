<?php

add_action( 'wp_head', 'theretailer_gutenberg_frontend_custom_styles', 100 );
if ( !function_exists ('theretailer_gutenberg_frontend_custom_styles') ) {
	
	function theretailer_gutenberg_frontend_custom_styles() {
		global $theretailer_theme_options;
		?>

		<style>
	
		.gbt_18_tr_banner_title,
		.gbt_18_tr_posts_grid_title,
		.gbt_18_tr_slide_title
		{
			font-family: '<?php echo $theretailer_theme_options['gb_secondary_font']; ?>', Arial, Helvetica, sans-serif !important;
		}

		</style>

		<?php
	}
}

add_action( 'admin_head', 'theretailer_gutenberg_backend_custom_styles' );
if ( !function_exists ('theretailer_gutenberg_backend_custom_styles') ) {
	
	function theretailer_gutenberg_backend_custom_styles() {
		global $theretailer_theme_options, $current_screen;

		$current_screen = get_current_screen();
		if ( method_exists($current_screen, 'is_block_editor') && $current_screen->is_block_editor() ) {
		?>

			<style>

			.edit-post-visual-editor h1,
			.edit-post-visual-editor h2,
			.edit-post-visual-editor h3,
			.edit-post-visual-editor h4,
			.edit-post-visual-editor h5,
			.edit-post-visual-editor h6,
			.edit-post-visual-editor button:not(.components-button),
			.edit-post-visual-editor label,
			.edit-post-visual-editor p,
			.edit-post-visual-editor ul li,
			.edit-post-visual-editor ol li,
			.edit-post-visual-editor div,
			.edit-post-visual-editor textarea,
			.edit-post-visual-editor table thead tr th,
			.edit-post-visual-editor input[type="button"],
			.edit-post-visual-editor input[type="reset"],
			.edit-post-visual-editor input[type="submit"],
			.edit-post-visual-editor button[type="submit"]
			{
				font-family: '<?php echo $theretailer_theme_options['gb_main_font']; ?>', Arial, Helvetica, sans-serif !important;
			}
		
			.gbt_18_tr_editor_banner_text_content h3,
			.gbt_18_tr_editor_posts_grid_title,
			.gbt_18_tr_editor_slide_title h2
			{
				font-family: '<?php echo $theretailer_theme_options['gb_secondary_font']; ?>', Arial, Helvetica, sans-serif !important;
			}

			ul.wp-block-latest-posts a,
			ul.wp-block-archives a,
			.wp-block-categories a
			{
				color: <?php echo $theretailer_theme_options['accent_color']; ?>;
			}

			</style>

		<?php
		}
	}
}
?>