== Description ==

This plugin creates a custom WordPress page to display an HTML table listing users fetched from the JSONPlaceholder API. The table includes user details such as ID, name, and username. Clicking on any user's details triggers an request to the API's "user details" endpoint, showing the details without reloading the page.

* Contributors: Andrei Punei
* Tags: wordpress, plugin, JSONPlaceholder, API
* Requires at least: 5.0
* Tested up to: 6.4
* Stable tag: trunk
*

== Requirements ==

* `composer`
* `PHP >=7.1`
* `npm`


== Installation ==

1. Upload the entire plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Visit an arbitrary URL (custom endpoint) like `https://example.com/inpsyde-users-test/` to see the HTML table.


== Setup ==

1. Run `composer install` to setup the files needed for namespacing and testing
2. run `npm install` to setup the files needed for compiling scripts
3. run `npm run start` for compilation process
3. run `npm run build` to build the files for production which will be found in `/dist/` folder

== Frequently Asked Questions ==

= How does the plugin fetch user data? =

The plugin makes HTTP requests from the server-side (PHP) to the JSONPlaceholder API (/users endpoint) to fetch user data.

= Can I customize the endpoint URL and data retrieval? =

Yes, you can customize the endpoint URL and choose the data to retrieve. Visit the plugin's settings page in the WordPress admin dashboard to set your preferred endpoint URL and configure the number of users to import, along with other custom data.

Note: The default endpoint URL is set as `https://jsonplaceholder.typicode.com` in the file `src/Ajax/ApiBase.php`.

== Changelog ==

= 1.0 =
* Initial release.

== Class Description ==

1. Inpsyde\Setup\Activation
This class handles the activation setup for the plugin. It performs tasks such as flushing rewrite rules, creating a test page with predefined HTML content, and associating it with the current user. It runs when the plugin is activated and sets up the necessary environment.

2. Inpsyde\Setup\Deactivate
The Deactivate class is responsible for deactivating the plugin. Its main task is to remove the test page created during activation. This helps clean up any residual content associated with the plugin when it's deactivated.

3. Inpsyde\Setup\Setup
The Setup class manages various setup tasks for the plugin. It handles enqueuing scripts and styles, adding an options page to the admin menu, and rendering the content for the options page. It provides methods for adding styles, scripts, and localizing scripts. Additionally, it includes utility methods for encapsulating actions related to script and options page setup.

4. Inpsyde\Setup\OptionsHelper
The OptionsHelper class is designed to assist in managing options for the plugin. It initializes the object with an option key and value, and it provides a method (insertOption) to set the value of a specific option. It includes nonce verification for security and ensures that the value is properly sanitized before updating the option.

5. Inpsyde\Ajax\ApiBase
The ApiBase class defines the base URL for making requests to the JSONPlaceholder API. It serves as a central location for managing the API endpoint URL. The default endpoint URL is set as https://jsonplaceholder.typicode.com, and it can be customized through the plugin's settings.

6. Inpsyde\Ajax\AjaxRequest
The AjaxRequest class initializes and manages Ajax requests for the plugin. It adds request definitions for fetching a list of users (DefinitionUsersList) and fetching details of a single user (DefinitionSingleUser). It registers these request definitions for handling Ajax requests.

7. Inpsyde\Ajax\DefinitionSingleUser and Inpsyde\Ajax\DefinitionUsersList
These classes define the structure and behavior of Ajax requests for fetching details of a single user and fetching a list of users, respectively. They specify the endpoint, callback functions, and other settings for handling these specific types of Ajax requests.

These classes collectively contribute to a WordPress plugin that fetches user data from the JSONPlaceholder API, displays it on a custom page, and allows customization through an options page in the WordPress admin dashboard.

== Development and Testing Dependencies ==

1. roave/security-advisories:
Purpose: This package provides a set of composer security advisories as a development dependency. It helps ensure that your project's dependencies do not have known security vulnerabilities.

2. phpcompatibility/phpcompatibility-wp:
Purpose: This package is a WordPress coding standard for PHP_CodeSniffer. It checks your codebase for PHP compatibility issues with the specified WordPress version. It helps ensure that your plugin is compatible with the targeted WordPress version.

3. phpunit/phpunit:
Purpose: PHPUnit is a testing framework for PHP. It allows you to write and run tests for your code. The phpunit script in your scripts section is used to run PHPUnit tests. Tests are essential for ensuring the correctness and stability of your plugin.

4.brain/monkey:
Purpose: Brain Monkey is a library for mocking WordPress functionality when testing. It helps create isolated unit tests for your code without relying on a full WordPress environment. Mocking is crucial for testing specific components in isolation.


