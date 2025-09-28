# Laravel Group Project

This is a PHP Laravel group project for ICT Academy, powered by **Eng. Mohamed Mansour**.

## About

This project serves as a collaborative learning platform for students in the ICT Academy to learn and practice Laravel framework development. The project is supervised and powered by **Eng. Mohamed Mansour**.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP >= 8.1
- Composer
- Node.js & NPM (for frontend assets)
- MySQL or another supported database

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/engelghandour/laravelgroup.git
   cd laravelgroup
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Create a copy of the environment file:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Configure your database in the `.env` file

6. Run database migrations:
   ```bash
   php artisan migrate
   ```

7. Install and compile frontend assets:
   ```bash
   npm install
   npm run dev
   ```

## Usage

Start the development server:
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Contributing

This is a learning project for ICT Academy students. Please follow these guidelines:

1. Create a new branch for each feature
2. Write clean, documented code
3. Test your changes before submitting
4. Follow Laravel coding standards

## Credits

**Powered by:** Eng. Mohamed Mansour  
**Institution:** ICT Academy  
**Framework:** Laravel PHP Framework

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).