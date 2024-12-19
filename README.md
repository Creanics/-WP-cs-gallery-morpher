[🇬🇧 English](README.md) | [🇫🇷 Français](README.fr.md)

# Gallery Morpher

**Plugin Name**: Gallery Morpher  
**Description**: A plugin that allows you to choose and execute migration functions.  
**Version**: 1.0  
**Author**: Cyprien Siaud  

## Description

Gallery Morpher is a simple tool that allows WordPress administrators to execute custom migration functions from the admin interface. It includes two selectors to choose functions and a "MIGRATE" button to trigger the actions.

## Features

- User-friendly admin interface.
- Ability to choose two migration functions.
- Single button to execute migrations.
- Built-in update system to keep the plugin up to date.
- Translation support via `.po` and `.mo` files.

## Installation

1. Download the plugin.
2. Upload it to the `/wp-content/plugins/` folder of your WordPress site.
3. Activate the plugin via the "Plugins" menu in the WordPress admin.

## Usage

1. Go to "Migration Tool" in the admin menu.
2. Select the migration functions from the dropdown lists.
3. Click "MIGRATE" to execute the actions.

## Updates

This plugin supports automatic updates via GitHub. Be sure to have the latest version to benefit from new features and bug fixes.

## Development

To contribute or report issues, visit the [GitHub repository](https://github.com/your-username/your-repo).  

### Code Structure
- **Main Files**:
  - `cs-gallery-morpher.php`: Main plugin file.
  - `languages/`: Directory for translation files.
  - `update-checker/`: Directory for update management (provided by Plugin Update Checker).

## Changelog

### Version 1.0
- First version of the plugin with:
  - Two selectors for functions.
  - Migration button.
  - Translation support.
  - DB configuration for functions.

## License

This plugin is distributed under the [GPL v2 or later](https://www.gnu.org/licenses/gpl-2.0.html) license.