# Aide :: PHP Info

WordPress admin plugin to view your server's PHP configuration (`phpinfo()`) from the dashboard.

## Features

- Adds a top-level **PHP Info** menu in WordPress admin.
- Displays full `phpinfo()` output inside the admin area.
- Access is limited to users with the `manage_options` capability (typically administrators).

## Requirements

- WordPress
- PHP compatible with your current WordPress version

## Installation

1. Copy the `aide-phpinfo` plugin folder into `wp-content/plugins/`.
2. In WordPress admin, go to **Plugins**.
3. Activate **Aide :: PHP Info**.

## Usage

1. Sign in to WordPress admin as an administrator.
2. Open **PHP Info** from the left admin menu.
3. Review the PHP configuration page.

## Security Note

`phpinfo()` can expose sensitive server details (environment variables, extension info, paths, and configuration values). Use this plugin only in trusted admin environments and avoid leaving it active when not needed.

## Plugin Details

- **Plugin Name:** Aide :: PHP Info
- **Version:** 1.0.0
- **Author:** Aide247
- **Plugin URI:** https://aide247.com/
- **Text Domain:** `aidephpinfo`

## License

No license file is currently included in this plugin directory.
