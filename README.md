# SilverStripe SVG Variable Module

This module enables the usage of the `$SVG('SVG_FILE_NAME')` variable in SilverStripe templates. It allows you to easily include SVG files within your templates by referencing their file names.

## Installation

To install this module, you can use Composer:

```bash
composer require toastnz/silverstripe-svg-variable
```

## Configuration

To set up the module, you need to specify the svg_base_path under the Page class in your YAML configuration file (app/_config/config.yml).

```
Page:
  svg_base_path: '/path/to/svg-folder/'
```
Make sure to replace '/path/to/svg-folder/' with the actual path to your SVG files.

# Usage
Once the module is installed and configured, you can use the $SVG('SVG_FILE_NAME') variable in your SilverStripe templates. Here's an example of how to include an SVG file:

```
$SVG('logo')
```