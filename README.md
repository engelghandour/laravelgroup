# 🎓 Laravel School Management System

A comprehensive school management system built with Laravel 11 and modern web technologies.

## ✨ Features

-   **🔐 User Authentication** - Secure login system with custom database integration
-   **📚 Class Management** - Full CRUD operations for managing school classes
-   **👨‍🏫 Teacher Management** - Teacher assignment and management
-   **👨‍🎓 Student Management** - Student enrollment and tracking
-   **📊 Dashboard** - Administrative dashboard with overview statistics
-   **📱 Responsive Design** - Mobile-friendly interface using Tailwind CSS

## 🛠️ Tech Stack

-   **Backend**: Laravel 11
-   **Frontend**: Blade Templates, Tailwind CSS, JavaScript
-   **Database**: MySQL (custom connection: php_fich)
-   **Build Tool**: Vite
-   **Authentication**: Custom Laravel Auth

## 🚀 Quick Start

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & npm
-   MySQL database

### Installation

1. **Clone the repository**

    ```bash
    git clone <your-repo-url>
    cd phplaraveltest
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database Configuration**

    Update your `.env` file with your database credentials:

    ```env
    DB_CONNECTION=php_fich
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=php_fitch
    DB_USERNAME=root
    DB_PASSWORD=your_password
    ```

6. **Run Migrations**

    ```bash
    php artisan migrate
    ```

7. **Start Development Servers**

    ```bash
    # Option 1: Run both servers together
    npm run dev:full

    # Option 2: Run separately
    php artisan serve --port=8000
    npm run dev
    ```

## 🎯 Usage

### Main Features

1. **Dashboard Access**

    - Navigate to `/dashboard` after login
    - Access admin features and management cards

2. **Class Management**

    - View all classes at `/admin/classes`
    - Add, edit, and delete classes with AJAX forms
    - Search and filter functionality

3. **Authentication**
    - Login at `/login`
    - Register new accounts at `/register`
    - Secure logout functionality

## 📂 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/ClassController.php    # Class management CRUD
│   │   └── Auth/LoginController.php     # Authentication logic
│   └── Models/
│       ├── User.php                     # User model with custom DB config
│       └── SchoolClass.php              # Class model
├── resources/
│   ├── css/app.css                      # Tailwind CSS
│   ├── js/app.js                        # Main JavaScript file
│   └── views/
│       ├── welcome.blade.php            # Landing page
│       ├── auth/
│       │   ├── dashboard.blade.php      # Admin dashboard
│       │   └── login.blade.php          # Login form
│       └── admin/classes/
│           └── index.blade.php          # Class management interface
├── routes/web.php                       # Application routes
└── database/migrations/                 # Database schema files
```

## 🔧 Development

### Available Scripts

```bash
# Start Laravel development server
php artisan serve --port=8000

# Start Vite development server (auto-port)
npm run dev

# Start Vite on specific port (5174)
npm run dev -- --port 5174

# Run both servers together
npm run dev:full

# Build for production
npm run build
```

### Database Commands

```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migrate with seeding
php artisan migrate:fresh --seed
```

## 🌐 Deployment

### Production Setup

1. **Environment Configuration**

    ```bash
    # Set production environment
    APP_ENV=production
    APP_DEBUG=false
    ```

2. **Optimize Application**

    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan optimize
    ```

3. **Build Assets**
    ```bash
    npm run build
    ```

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

For support, email your-email@example.com or create an issue in this repository.

---

Built with ❤️ using Laravel 11

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Redberry](https://redberry.international/laravel-development)**
-   **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

For support, email your-email@example.com or create an issue in this repository.

---

Built with ❤️ using Laravel 11
