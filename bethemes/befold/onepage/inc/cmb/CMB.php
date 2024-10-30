<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category BeThemesMe  Plugin
 * @package  CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

require_once BETM_PLUGIN_PATH . 'includes/cmb2/init.php';

/**
 * Conditionally displays a metabox when it's the front page.
 *
 * @param  CMB2 object $cmb CMB2 object
 * @return bool True if metabox should show
 */
function bethemesme_cmb_show_if_front_page( $cmb ) {
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}

	wp_enqueue_style( 'bethemesme-admin-font-awesome-style', get_template_directory_uri() . '/layouts/font.awesome.min.css', array(), '4.4.0' );
	wp_enqueue_style( 'bethemesme-admin-icon-list-style', plugins_url( 'css/icon-list.css', __FILE__ ), array(), '1.0.3', true );
	wp_enqueue_script( 'bethemesme-admin-icon-field-script', plugins_url( 'js/jquery.cmb.field.js', __FILE__ ), array( 'jquery' ), '1.0.3', true );
	wp_enqueue_script( 'bethemesme-admin-typewatch-script', plugins_url( 'js/jquery.typewatch.js', __FILE__ ), array( 'jquery' ), '2.2.1', true );

	return true;
}

/**
 * Add icon control.
 */
function bethemesme_cmb_icon_after() {
	$output = sprintf(
					'<span class="icon-control">
						<a href="javascript:void(0);" class="add-cmb-icon">%1$s</a>
						<a href="javascript:void(0);" class="remove-cmb-icon">%2$s</a>
					</span>',
					esc_html__( 'Choose Icon', 'bethemesme' ),
					esc_html__( 'Remove Icon', 'bethemesme' )
				);

	$font_icons = bethemesme_icon_list();

	ob_start();
?>

	<div id="cmb-icon-list">
		<div class="cmb-icon-search">
			<input type="text" id="cmb-icon-search" placeholder="<?php esc_html_e( 'Type to search icons', 'bethemesme' ); ?>">
			<span id="icons-search-result"></span>
		</div><!-- .icon-search -->

		<ul class="font-icons">
			<?php
				foreach ( $font_icons as $font_icon ) {
					echo '<li id="' . $font_icon . '"><i class="fa fa-' . $font_icon . '"></i></li>';
				}
			?>
		</ul>
	</div><!-- #cmb-icon-list -->
	
<?php
	$icon_list = ob_get_clean();

	return $output . $icon_list;
}

/**
 * Hook in and add metaboxes.
 */
function bethemesme_register_metabox() {
	// Start with an underscore to hide fields from custom fields list.
	$prefix = '_bethemesme_option_';

	/**
	 * Initiate the metabox.
	 */
	/* Portfolio Metabox Start */
	$portfolio_metabox = new_cmb2_box( array(
		'id'           => 'portfolio_metabox',
		'title'        => __( 'Portfolio Metabox', 'bethemesme' ),
		'object_types' => array( 'portfolio' ),
		'context'      => 'normal',
		'priority'     => 'high'
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( 'Created by:', 'bethemesme' ),
		'id'   => $prefix . 'author',
		'type' => 'text_small',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( 'Completed on:', 'bethemesme' ),
		'id'   => $prefix . 'date',
		'type' => 'text_date',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( 'Skills:', 'bethemesme' ),
		'id'   => $prefix . 'skill',
		'type' => 'text_medium',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( "Client's Name:", 'bethemesme' ),
		'id'   => $prefix . 'client_name',
		'type' => 'text_medium',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( "Client's URL:", 'bethemesme' ),
		'id'   => $prefix . 'client_url',
		'type' => 'text_url',
	) );
	/* Portfolio Metabox End */

	/* Icon Service Box Metabox Start */
	$icon_service_box = new_cmb2_box( array(
		'id'           => $prefix . 'icon_service_box',
		'title'        => __( 'Services Metabox', 'bethemesme' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'bethemesme_cmb_show_if_front_page'
	) );

	$icon_service_box_field_id = $icon_service_box->add_field( array(
		'id'          => $prefix . 'icon_service_box',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Service Box {#}', 'bethemesme' ),
			'add_button'    => __( 'Add Another Service Box', 'bethemesme' ),
			'remove_button' => __( 'Remove Service Box', 'bethemesme' ),
			'sortable'      => true
		),
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name' => __( 'Title', 'bethemesme' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'bethemesme' ),
		'id'   => 'title',
		'type' => 'textarea_code'
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name' => __( 'Description', 'bethemesme' ),
		'id'   => 'description',
		'type' => 'textarea'
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name'   => __( 'Icon', 'bethemesme' ),
		'id'     => 'icon',
		'type'   => 'text_small',
		'before' => '<span class="selected-icon"><i class="fa fa-none"></i></span>',
		'after'  => 'bethemesme_cmb_icon_after'
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name' => __( 'URL', 'bethemesme' ),
		'id'   => 'url',
		'type' => 'text_url'
	) );
	/* Icon Service Box Metabox End */

	/* Contact Box Metabox Start */
	$contact_box = new_cmb2_box( array(
		'id'           => $prefix . 'contact_box',
		'title'        => __( 'Contact Metabox', 'bethemesme' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'bethemesme_cmb_show_if_front_page'
	) );

	$contact_box_field_id = $contact_box->add_field( array(
		'id'          => $prefix . 'contact_box',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Contact Box {#}', 'bethemesme' ),
			'add_button'    => __( 'Add Another Contact Box', 'bethemesme' ),
			'remove_button' => __( 'Remove Contact Box', 'bethemesme' ),
			'sortable'      => true
		),
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name' => __( 'Label', 'bethemesme' ),
		'id'   => 'label',
		'type' => 'text_small'
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name' => __( 'Description', 'bethemesme' ),
		'id'   => 'description',
		'type' => 'text'
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name'   => __( 'Icon', 'bethemesme' ),
		'id'     => 'icon',
		'type'   => 'text_small',
		'before' => '<span class="selected-icon"><i class="fa fa-none"></i></span>',
		'after'  => 'bethemesme_cmb_icon_after'
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name' => __( 'URL', 'bethemesme' ),
		'id'   => 'url',
		'type' => 'text_url'
	) );
	/* Contact Box Metabox End */
}
add_action( 'cmb2_init', 'bethemesme_register_metabox' );
