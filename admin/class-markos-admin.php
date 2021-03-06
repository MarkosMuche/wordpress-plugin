<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       markosmuche2018@gmail.com
 * @since      1.0.0
 *
 * @package    Markos
 * @subpackage Markos/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Markos
 * @subpackage Markos/admin
 * @author     markos <markosmuche2018@gmail.com>
 */
class Markos_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action('admin_menu', array($this, 'addAdminMenuItems'), 9);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Markos_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Markos_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/markos-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Markos_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Markos_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/markos-admin.js', array('jquery'), $this->version, false);
	}

	public function addAdminMenuItems()
	{
		//add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
		add_menu_page(
			$this->plugin_name,
			'Markos Plugin',
			'administrator',
			$this->plugin_name,
			array(
				$this,
				'displayAdminDashboard',
			),
			'dashicons-email',
			20
		);
		//add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
		add_submenu_page(
			$this->plugin_name,
			'Your plugin Settings',
			'Settings',
			'administrator',
			$this->plugin_name . '-settings',
			array(
				$this,
				'displayAdminSettings',
			)
		);
	}

	public function displayAdminDashboard()
	{
		require_once 'partials/' . $this->plugin_name . '-admin-display.php';
	}

	public function displayAdminSettings()
	{
		require_once 'partials/' . $this->plugin_name . '-admin-settings-display.php';
	}
}
