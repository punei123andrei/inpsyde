<?php
 /**
 * Plugin Name: Inpsyde Users API
 * Plugin URI:  https://www.inpsyde.com
 * Description: Your plugin description.
 * Version:     1.0.3
 * Author:      Andrei Punei
 * Author URI:  https://www.inpsyde.com
 * Text Domain: inpsyde
 * Domain Path: /languages
 * Requires PHP: 7.2
 * Requires WP:  5.0
 * Namespace:   Inpsyde
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package   Inpsyde Users
 * @since     1.0.0
 */

declare(strict_types=1);

namespace Inpsyde;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define the default root file of the plugin
 *
 * @since 1.0.3
 */
define( 'INPSYDE_ROOT', plugin_dir_path( __FILE__ ) . 'inpsyde.php' );


/**
 * Load PSR4 autoloader
 *
 * @since 1.0.0
 */
$composer = __DIR__ . '/vendor/autoload.php';

/** Register The Auto Loader */
if (!file_exists($composer)) {
    wp_die(
        esc_html__(
            'Please run <code>composer install</code>.',
            'inpsyde'
        )
    );
}
require $composer;

use Inpsyde\Setup\Activation;
register_activation_hook(__FILE__, [Activation::class, 'activate']);

use Inpsyde\Setup\Deactivate;
register_deactivation_hook(__FILE__, [Deactivate::class, 'deactivate']);

use Inpsyde\Setup\Setup;
$setup = new Setup();
$setup->addStyle('inpsyde-style', plugins_url('build/style-index.css', __FILE__), [], '1.1')
->localizeScript('frontend', plugins_url('build/index.js', __FILE__), ['jquery'], '1.1', true);

use Inpsyde\Setup\Settings\OptionsPage;
use Inpsyde\Setup\Settings\Config\OptionsPageRegistry;
$optionsPage = new OptionsPage(new OptionsPageRegistry());
$optionsPage->addOptionsPage('Inpsyde User');

use Inpsyde\Setup\Settings\SettingsInitializer;
use Inpsyde\Setup\Settings\Config\SettingsRegistry;
$settingsInit = new SettingsInitializer(new SettingsRegistry());
$settingsInit->initSettings('Inpsyde User');

use Inpsyde\Ajax\AjaxRequest;
use Inpsyde\RequestDefinitions\DefinitionUsersList;
use Inpsyde\RequestDefinitions\DefinitionSingleUser;

// Initialize AjaxRequest class
$ajaxRequest = new AjaxRequest();

// Add request definitions
$ajaxRequest->add(new DefinitionUsersList())
            ->add(new DefinitionSingleUser());

// Register Ajax requests
$ajaxRequest->registerRequests();
