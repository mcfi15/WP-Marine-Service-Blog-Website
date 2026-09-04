# Western Partners Marine Services - Full Stack Web Application

A professional marine services company website built with Laravel 12, featuring a responsive Bootstrap frontend and comprehensive admin dashboard for content management.

## Features

- **Frontend**: Fully responsive Bootstrap-based design replicating wpmarinelimited.com
- **Admin Dashboard**: Separate route (`/admin`) with complete CMS functionality
- **User Management**: Full user authentication and role-based access control
- **Page Management**: Create, edit, and delete dynamic pages
- **Settings Management**: Configure site-wide settings (logo, contact info, SEO metadata)
- **Email Templates**: Manage email notifications with customizable templates
- **SEO Optimized**: Built-in SEO service for meta tags, keywords, and descriptions
- **GDPR Compliant**: Cookie consent and data protection features
- **Integrations**: Google Analytics, reCAPTCHA, and live chat support

## Technology Stack

- **Framework**: Laravel 12
- **Database**: MySQL
- **Frontend**: Bootstrap 5
- **PHP Version**: 8.2+

## Installation

1. Clone the repository
2. Copy `.env.example` to `.env` and configure database settings
3. Run `composer install`
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed`
6. Start the development server with `php artisan serve`

## Admin Access

Default admin credentials after seeding:
- Email: admin@wpmarine.com
- Password: password

## Routes

### Public Routes
- `/` - Home page
- `/about-us` - About page
- `/offer` - Services page
- `/clients` - Clients page
- `/contact` - Contact page

### Admin Routes
- `/admin/login` - Admin login
- `/admin/dashboard` - Admin dashboard
- `/admin/pages` - Page management (CMS)
- `/admin/settings` - Site settings
- `/admin/users` - User management
- `/admin/email-templates` - Email template management
- `/admin/activity-logs` - Activity logs

## Configuration

Configure the following in your `.env` file:

```
APP_NAME="Western Partners Marine Services"
APP_URL=http://localhost
APP_KEY=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wpmarine
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=hello@wpmarine.com
MAIL_FROM_NAME="Western Partners Marine Services"

GOOGLE_ANALYTICS_ID=UA-XXXXXXXXX-X
RECAPTCHA_SITE_KEY=your_site_key
RECAPTCHA_SECRET_KEY=your_secret_key
```

## License

This project is proprietary software. All rights reserved.
