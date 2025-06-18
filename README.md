# WP Plugin AIDE PHP Info

A simple and lightweight WordPress plugin that adds a menu in the WordPress admin dashboard to display the full output of PHP's `phpinfo()` function. Ideal for developers and administrators who need quick access to server and PHP configuration details from within WordPress.

## 🔍 Features

- Displays full `phpinfo()` output in a clean format
- Easily accessible from the WordPress admin menu
- No configuration required — just install and activate
- Lightweight and secure

## 📁 Installation

### Method 1: Upload via WordPress Admin
1. Download the plugin ZIP file from GitHub.
2. Go to your WordPress Admin Dashboard.
3. Navigate to **Plugins > Add New**.
4. Click **Upload Plugin**, choose the ZIP file, and click **Install Now**.
5. Activate the plugin.

### Method 2: Manual Upload
1. Clone or download this repository:
   ```bash
   git clone https://github.com/mahidulislamtamim/wp-plugin-aide-phpinfo.git
Upload the folder wp-plugin-aide-phpinfo to your WordPress plugins directory (wp-content/plugins/).

Activate the plugin from the WordPress Admin Dashboard.


## 🧭 Usage

After activation, go to Tools > PHP Info in your WordPress admin menu.
You'll see a full phpinfo() output rendered in the browser, including:
PHP version
Server info
Loaded extensions
Configuration values
Environment variables


## 🔐 Security Note
This plugin is intended for development or troubleshooting environments. Avoid using on a live production site for extended periods, as exposing phpinfo() data can be a security risk.


## 🧑‍💻 Author
Mahidul Islam Tamim
GitHub Profile

## 📄 License
This project is licensed under the MIT License.

Enjoy a smoother WordPress development experience with instant access to PHP server info!