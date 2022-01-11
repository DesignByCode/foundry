<?php

namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class MetaBox
{
	use Singleton;

	protected function __construct()
	{
		$this->setup_hook();
	}

	public function setup_hook()
	{
		add_action('add_meta_boxes', [$this, 'add_custom_meta_boxes']);
		add_action('save_post', [$this, 'save_post_meta_data']);
	}

	/**
	 * @return void
	 */
	public function add_custom_meta_boxes()
	{
		$screens = ['post'];
		foreach ($screens as $screen) {
			add_meta_box(
				'hide-page-title',
				__('Hide page title', 'foundry'),
				[$this, 'custom_box_html'],
				$screen,
				'side'
			);
		}
	}

	/**
	 * @param $post
	 * @return void
	 */
	public function custom_box_html($post ) {
		$value = get_post_meta( $post->ID, '_hide_page_title', true );
		wp_nonce_field(plugin_basename(__FILE__), 'nonce_hide_title_meta_box');
		?>
		<label for="foundry-field"><?php esc_html_e('Hide Page Title', 'foundry'); ?></label>
		<select name="foundry_hide_title_field" id="foundry-field" class="postbox">
			<option value=""><?php esc_html_e('Select', 'foundry'); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>><?php esc_html_e('Yes', 'foundry'); ?></option>
			<option value="no" <?php selected( $value, 'no' ); ?>><?php esc_html_e('No', 'foundry'); ?></option>
		</select>
		<?php
	}

	/**
	 * @param $post_id
	 * @return void
	 */
	public function save_post_meta_data($post_id)
	{
		if (! current_user_can('edit_post', $post_id)) {
			return;
		}

		if ( ! isset($_POST['nonce_hide_title_meta_box']) ||
			! wp_verify_nonce($_POST['nonce_hide_title_meta_box'], plugin_basename(__FILE__))) {
			return;
		}

		if (array_key_exists('foundry_hide_title_field', $_POST)) {
			update_post_meta(
				$post_id,
				'_hide_page_title',
				$_POST['foundry_hide_title_field']
			);
		}
	}

}
