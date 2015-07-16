<?php

/**
 * An abstract class from which all plugin implementations should be derived.
 * @author Aelin Reed <aelin.reed@gmail.com>
 */
abstract class Plugin {
	/**
	 * The plugin filename.
	 * @var string
	 */
	protected $file;

	/**
	 * The plugin version.
	 * @var string
	 */
	protected $version;

	/**
	 * The plugin assets path.
	 * @var string
	 */
	protected $asset_path;

	/**
	 * The absolute plugin path.
	 * @var string
	 */
	protected $plugin_path;

	/**
	 * The absolute plugin storage path.
	 * @var string
	 */
	protected $storage_path;

	/**
	 * The Twig template engine engine instance.
	 * @var object
 	 */	
	protected $twig;	

	/**
	 * Initializes a new instance of the {@link Plugin} class.
	 * @param string $file    the plugin filename
	 * @param string $version the plugin version
	 */
	public function __construct($file, $version) {
		// Store the plugin file and version:
		$this->file = $file;
		$this->version = $version;

		// Determine the path of the plugin assets folder:
		$this->asset_path = esc_url(plugins_url('/assets/', $file));

		// Determine the plugin and storage paths:
		$this->plugin_path = dirname($file);
		$this->storage_path = "{$this->plugin_path}/storage";
	}

	/**
	 * Handles plugin initialization.
	 */
	public function initialize() {
		// Install the plugin activation hook:
		register_activation_hook($this->file, array($this, 'activate'));

		// Add Stylesheet/Script enqueue actions:
		add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

		// Add the admin page registration action:
		add_action('admin_menu', array($this, 'register_admin_pages'));
	}

	/**
	 * Invoked by WordPress when the plugin has been activated.
	 */
	public function activate() {
	}

	/**
	 * Enqueues plugin stylesheets.
	 */ 
	public function enqueue_styles() {
	}

	/**
	 * Enqueues plugin scripts.
	 */
	public function enqueue_scripts() {
	}

	/**
	 * Registers plugin admin pages.
	 */
	public function register_admin_pages() {
	}

	/**
	 * Renders the specified template using the Twig template engine.
	 * @param  string $template the template name
	 * @param  string $data     the template data
	 * @return string           the rendered html
	 */
	protected function render_template($template, $data = array()) {
		if (!$this->twig) {
			// Determine the template and cache paths:
			$template_path = "{$this->storage_path}/templates";
			$cache_path    = "{$this->storage_path}/cache";

			// Initialize the Twig environment:
			$this->twig = new Twig_Environment(
				new Twig_Loader_Filesystem($template_path),
				array(
					'cache' => $cache_path
				)
			);
		}
		
		// Load and render the specified template:
		return $this->twig
			->loadTemplate("{$template}.tpl.html")
			->render($data);
	}
}
