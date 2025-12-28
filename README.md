# CV Dinamika

A dynamic CV/Portfolio website built with CodeIgniter 4, featuring admin panel for content management, product showcase, blog, testimonials, and contact forms.

## Features

- **Landing Page**: Professional homepage with hero section, services, portfolio, team, and testimonials
- **Admin Panel**: Complete CMS for managing content including:
  - Products/Services
  - Blog posts
  - Projects/Portfolio
  - Team members
  - Testimonials
  - Site settings
  - Contact messages
- **Responsive Design**: Mobile-friendly interface using Bootstrap
- **Multi-language Support**: Ready for internationalization
- **SEO Friendly**: Clean URLs and meta tags
- **Contact Integration**: Contact form with email notifications

## Technology Stack

- **Framework**: CodeIgniter 4
- **Frontend**: HTML5, CSS3, Bootstrap 5, JavaScript
- **Database**: MySQL
- **Server**: Apache/Nginx with PHP 8.1+

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This project is built using CodeIgniter 4 framework.
You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation

1. **Clone or Download** the project files to your local environment
2. **Install Dependencies**:
   ```bash
   composer install
   ```
3. **Environment Setup**:
   - Copy `env` to `.env`
   - Configure your database settings in `.env`
   - Set baseURL and other environment variables

4. **Database Setup**:
   - Create a MySQL database
   - Run migrations: `php spark migrate`
   - Run seeders: `php spark db:seed SettingSeeder`

5. **Permissions**:
   - Ensure `writable/` directory is writable by the web server
   - Set proper permissions for `public/uploads/` directory

## Usage

- **Public Site**: Access the landing page at your base URL
- **Admin Panel**: Login at `/login` with admin credentials
- **Development**: Use `php spark serve` for local development

## Project Structure

- `app/Controllers/` - Application controllers
- `app/Models/` - Database models
- `app/Views/` - Template files
- `app/Config/` - Configuration files
- `public/` - Public assets (CSS, JS, images)
- `writable/` - Cache, logs, sessions, uploads

## Installation & Framework Updates

For CodeIgniter framework updates, run `composer update` whenever there is a new release.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Configuration

After installation, configure the following in your `.env` file:

- **Database**: Set database name, username, password
- **Base URL**: Set your domain/base URL
- **Encryption Key**: Generate a secure key for sessions
- **Email Settings**: Configure SMTP for contact forms (optional)

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Repository Management

For CodeIgniter framework related issues, please refer to the [official CodeIgniter repository](https://github.com/codeigniter4/CodeIgniter4).

Project-specific issues can be reported via GitHub issues in this repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
