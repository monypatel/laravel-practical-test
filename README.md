## Installation

1. **Clone the repository**
    ```sh
    git clone <repo-url>
    cd practical-test
    ```

2. **Install PHP dependencies**
    ```sh
    composer install
    ```

3. **Copy the example environment file and set your environment variables**
    ```sh
    cp .env.example .env
    ```
    Edit `.env` and set your database credentials.

4. **Run migrations and seeders**
    ```sh
    php artisan migrate
    php artisan passport:install
    ```
    This will create the `users`, `customers`, and `orders` tables and seed sample data.

5. **Run the development server**
    ```sh
    php artisan serve
    ```

---

## Resetting the Database

If you make changes to your migration files and need to rebuild the database from scratch, run:

```sh
php artisan migrate:fresh --seed
php artisan passport:install
```

## Postman Collection

To make testing easier, we’ve included a Postman collection with all API endpoints.

- [Download Postman Collection](./postman/test.postman_collection.json)

## API Endpoints

### Register

- **URL:** `/api/register`
- **Method:** `POST`
- **Payload:**
    ```json
    {
        "username": "xya",
        "email": "xyz@gmail.com",
        "password": "xxxx"
    }
    ```

### Login

- **URL:** `/api/login`
- **Method:** `POST`
- **Payload:**
    ```json
    {
        "email": "xyz@gmail.com",
        "password": "xxxx"
    }
    ```

### Get Top 5 Customers

- **URL:** `/api/get-customer-details`
- **Method:** `GET`
- **Description:** Returns the top 5 customers who spent the most on orders in the last year.

