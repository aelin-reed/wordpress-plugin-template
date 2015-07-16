<?php

/*
 * Plugin Name: WordPress Plugin Template
 * Version: 1.0.0
 * Plugin URI: https://github.com/aelin-reed/wordpress-plugin-template
 * Author: Aelin Reed <aelin.reed@gmail.com>
 * Requires at least: 4.0
 * Tested up to: 4.0
 */

// Prevent this file from being executed outside of the WordPress environment:
if (!defined('ABSPATH'))
	die();

// Load the Composer autoloader:
require_once('vendor/autoload.php');

// Initialize the plugin:
$instance = new ExamplePlugin(__FILE__, '1.0.0');
$instance->initialize();
