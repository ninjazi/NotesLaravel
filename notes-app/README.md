# Notes App

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/notes-app.git
    cd notes-app
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    ```

3. Set up environment:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure database settings in `.env` file.

5. Run migrations:
    ```bash
    php artisan migrate
    ```

6. Serve the application:
    ```bash
    php artisan serve
    ```

7. Compile assets:
    ```bash
    npm run dev
    ```

## Usage

1. Register a new user at `/register`.
2. Log in at `/login`.
3. Create, edit, and delete notes at `/notes`.

## Security

This application includes basic security measures against SQL injection, XSS, and CSRF.

## Code Standards

The code adheres to PSR standards and is well-commented for clarity.
