<?php
/**
* Child Pages Tabs Shortcode
*
* @package Child Pages Tabs
* @since 1.0.0
*
*/
class Child_Pages_Tabs_Shortcode{

  /**
	* Instance of Child_Pages_Tabs_Shortcode
	*
	*	@since 1.0.0
	*
	*/
	public static function instance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Child_Pages_Tabs_Shortcode();
        }
        return $instance;
    }

	private function __construct(){
		add_action('wp_enqueue_scripts', 	array($this,'child_pages_tabs_script'));
		add_shortcode('child_pages_tabs', array($this,'shortcode'));
	}

	 /**
	*	Enqueue scripts
	*
	*	@since 1.0.0
	*/
	public function child_pages_tabs_script(){

		wp_register_script('cp-tabs-script', CHILD_PAGES_TABS_URI.'/assets/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'), CHILD_PAGES_TABS_VER, true);

		wp_register_style('cp-tabs-style', CHILD_PAGES_TABS_URI.'/assets/css/style.css', CHILD_PAGES_TABS_VER );
		
	}

   /**
	* Shortcoe function
	*	
	*   @param  {[array]} $atts   [values given in shortcode]
	*	@since   1.0.0
	*
	*/

	public function shortcode( $atts ) {

		$has_child_pages = $this->has_child_pages();
		if ( ! $has_child_pages ) {
			return;
		}

		wp_enqueue_script( 'cp-tabs-script');
		wp_enqueue_style( 'cp-tabs-style');


		$defaults = array(
			'tabs'		=> 'horizontal',
			'border'		=> 'true',
			'bg-color'		=> 'true',
			'read-more-link'		=> 'true',
			);
		$atts = shortcode_atts( $defaults, $atts );

		$tabs_class = '';
		if ($atts['tabs'] == 'vertical') {
			$tabs_class .= ' style-vertical';
		} elseif( $atts['tabs'] == 'horizontal'){
			$tabs_class .= ' style-horizontal';
		}
		if ( $atts['border'] == 'true' ) {
			$tabs_class .= ' with-border';
		}
		if ( $atts['bg-color'] == 'true' ) {
			$tabs_class .= ' with-bg-colors';
		}

		ob_start();

		global $post;
		$post_args = array(
		    'post_type'      => 'page',
		    'posts_per_page' => -1,
		    'post_parent'    => $post->ID,
		    'order'          => 'ASC',
		    'orderby'        => 'menu_order'
		 );


		$parent = new WP_Query( $post_args ); ?>

		<div id="child-pages-wrap" class="child-pages-tab <?php echo $tabs_class; ?>">

			<?php if ( $parent->have_posts() ) : ?>

				<ul>
					<?php while ( $parent->have_posts() ) : $parent->the_post();
					$slug       = strtolower( get_the_title()); 
					$slug       = str_replace(" ", "-", $slug);
					$slug       = preg_replace("/[-]+/i", "-", $slug); ?>
					
						<li><a href ="#<?php echo $slug; ?>"><?php the_title(); ?></a></li>
					
					<?php endwhile; ?>
				
				</ul>

				<?php while ( $parent->have_posts() ) : $parent->the_post(); 
					$slug       = strtolower( get_the_title()); 
					$slug       = str_replace(" ", "-", $slug);
					$slug       = preg_replace("/[-]+/i", "-", $slug); 

					$content = apply_filters( 'the_content', get_post_field('post_content', get_the_ID() ) ); ?>

						<div id="<?php echo $slug; ?>">
							<?php echo $content; ?>

							<?php
								if ( $atts['read-more-link'] == 'true' ) { ?>
									<a href="<?php the_permalink(); ?>" class="child-pages-read-more-link">
										<?php esc_html_e( 'Read More &raquo;' ,'child-pages-tabs'); ?>
									</a>
								<?php }
							?>
						</div>
				<?php endwhile; ?>
			<?php endif; wp_reset_postdata(); ?>
		
		</div>

		<?php
		return ob_get_clean();
	}

	/**
	 * Get the status of child pages of the current page.
	 *
	 *	@since   1.0.0
	 *
	 */
	function has_child_pages(){
	    global $post;

	    $children = get_pages( array( 'child_of' => $post->ID ) );
	    if( count( $children ) == 0 ) {
	        return false;
	    } else {
	        return true;
	    }
	}
}

Child_Pages_Tabs_Shortcode::instance();