<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Select Sidebar, Header Featured Image Options, Single Page/Post Image Layout
 * This is only for the design purpose and not used to save any content
 *
 * @package Solid_Construction
 */



/**
 * Class to Renders and save metabox options
 *
 * @since Solid Construction 1.0
 */
class Solid_Construction_Metabox {
	private $meta_box;

	private $fields;

	/**
	* Constructor
	*
	* @since Solid Construction 1.0
	*
	* @access public
	*
	*/
	public function __construct( $meta_box_id, $meta_box_title, $post_type ) {

		$this->meta_box = array (
							'id' 		=> $meta_box_id,
							'title' 	=> $meta_box_title,
							'post_type' => $post_type,
							);

		$this->fields = array(
			'solid-construction-header-image',
			'solid-construction-sidebar-option',
			'solid-construction-featured-image',
		);


		// Add metaboxes
		add_action( 'add_meta_boxes', array( $this, 'add' ) );

		add_action( 'save_post', array( $this, 'save' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_metabox_scripts' ) );
	}

	/**
	* Add Meta Box for multiple post types.
	*
	* @since Solid Construction 1.0
	*
	* @access public
	*/
	public function add($postType) {
		if( in_array( $postType, $this->meta_box['post_type'] ) ) {
			add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $postType );
		}
	}

	/**
	  * Renders metabox
	  *
	  * @since Solid Construction 1.0
	  *
	  * @access public
	  */
	public function show() {
		global $post;

		$header_image_options 	= array(
			'default' => esc_html__( 'Default', 'solid-construction' ),
			'enable'  => esc_html__( 'Enable', 'solid-construction' ),
			'disable' => esc_html__( 'Disable', 'solid-construction' ),
		);

		$featured_image_options	= array(
			'disabled'              => esc_html__( 'Disabled', 'solid-construction' ),
			'post-thumbnail'        => esc_html__( 'Enabled', 'solid-construction' ),
		);

		// Use nonce for verification
		wp_nonce_field( basename( __FILE__ ), 'solid_construction_custom_meta_box_nonce' );

		// Begin the field table and loop  ?>
		<div id="solid-construction-ui-tabs" class="ui-tabs">
			<ul class="solid-construction-ui-tabs-nav" id="solid-construction-ui-tabs-nav">
				<li><a href="#frag2"><?php esc_html_e( 'Header Featured Image Options', 'solid-construction' ); ?></a></li>
			</ul>

			<div id="frag2" class="catch_ad_tabhead">
				<table id="header-image-metabox" class="form-table" width="100%">
					<tbody>
						<tr>
							<?php
							$metaheader = get_post_meta( $post->ID, 'solid-construction-header-image', true );

							if ( empty( $metaheader ) ){
								$metaheader = 'default';
							}

							foreach ( $header_image_options as $field => $label ) {
							?>
								<td style="width: 100px;">
									<label class="description">
										<input type="radio" name="solid-construction-header-image" value="<?php echo esc_attr( $field ); ?>" <?php checked( $field, $metaheader ); ?>/>&nbsp;&nbsp;<?php echo esc_html( $label ); ?>
									</label>
								</td>

							<?php
							} // end foreach
							?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}

	/**
	 * Save custom metabox data
	 *
	 * @action save_post
	 *
	 * @since Solid Construction 1.0
	 *
	 * @access public
	 */
	public function save( $post_id ) {
		global $post_type;

		$post_type_object = get_post_type_object( $post_type );

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      // Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
		|| ( ! in_array( $post_type, $this->meta_box['post_type'] ) )                  // Check if current post type is supported.
		|| ( ! check_admin_referer( basename( __FILE__ ), 'solid_construction_custom_meta_box_nonce') )    // Check nonce - Security
		|| ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )  // Check permission
		{
		  return $post_id;
		}

		foreach ( $this->fields as $field ) {
			$new = $_POST[ $field ];

			delete_post_meta( $post_id, $field );

			if ( '' == $new || array() == $new ) {
				return;
			} else {
				if ( ! update_post_meta ( $post_id, $field, sanitize_key( $new ) ) ) {
					add_post_meta( $post_id, $field, sanitize_key( $new ), true );
				}
			}
		} // end foreach

		//Validation for header image extra options
		$date = $_POST['solid-construction-event-day'];
		if ( '' != $date ) {
			if ( ! update_post_meta( $post_id, 'solid-construction-event-day', sanitize_text_field( $date ) ) ) {
				add_post_meta( $post_id, 'solid-construction-event-day', sanitize_text_field( $date ), true );
			}
		}

		//Validation for header image extra options
		$time = $_POST['solid-construction-event-month'];
		if ( '' != $time ) {
			if ( ! update_post_meta( $post_id, 'solid-construction-event-month', sanitize_text_field( $time ) ) ) {
				add_post_meta( $post_id, 'solid-construction-event-month', sanitize_text_field( $time ), true );
			}
		}
	}

	public function enqueue_metabox_scripts( $hook ) {
		$allowed_pages = array( 'post-new.php', 'post.php' );

		// Bail if not on required page
		if ( ! in_array( $hook, $allowed_pages ) ) {
			return;
		}

		//Scripts
		wp_enqueue_script( 'solid-construction-metabox-script', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'inc/metabox/metabox.js', array( 'jquery', 'jquery-ui-tabs' ), '2017-08-15' );

		//CSS Styles
		wp_enqueue_style( 'solid-construction-metabox-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'inc/metabox/metabox.css' );
	}
}

$solid_construction_metabox = new Solid_Construction_Metabox(
	'solid-construction-options', 					//metabox id
	esc_html__( 'Solid Construction Options', 'solid-construction' ), //metabox title
	array( 'page', 'post' )				//metabox post types
);
