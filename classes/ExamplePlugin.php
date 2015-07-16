<?php

/**
 * An example implementation of the {@link Plugin} class.
 * @author Aelin Reed <aelin.reed@gmail.com>
 */
class ExamplePlugin extends Plugin {	
	/**
	 * Initializes a new instance of the {@link ExamplePlugin} class.
	 * @param $file    the plugin filename
	 * @param $version the plugin version
	 */
	public function __construct($file, $version) {
		parent::__construct($file, $version);
	}

	/**
	 * Handles plugin initialization.
	 */	
	public function initialize() {
		parent::initialize();
	}

	/**
	 * Enqueues example plugin stylesheets.
	 */ 
	public function enqueue_styles() {
		// Register the example plugin stylesheet:
		wp_register_style(
			"example-plugin-styles",
			"{$this->asset_path}/css/styles.css",
			array(),
			$this->version
		);

		// Enqueue the example plugin stylesheet:
		wp_enqueue_style("example-plugin-styles");
	}

	/**
	 * Enqueues example plugin scripts.
	 */
	public function enqueue_scripts() {	
		// Register the example plugin scripts:
		wp_register_script(
			"example-plugin-scripts", 
			"{$this->asset_path}/js/scripts.js", 
			array("jquery"), 
			$this->version, 
			true
		);

		// Enqueue the example plugin scripts:
		wp_enqueue_script("example-plugin-scripts");
	}

	/**
	 * Registers the example admin page.
	 */
	public function register_admin_pages() {
		// Register the example plugin menu page:
		add_menu_page(
			"Example Plugin",
			"Example Plugin",
			"read",
			"example-plugin",			
			array($this, 'render_admin_page')
		);
	}

	/**
	 * Renders the admin page.
	 */
	public function render_admin_page() {
		// Render the admin page template:
		echo $this->render_template('admin_page');
	}
}
