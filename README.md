<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



---

## VAGABOND API DOCUMENTATION


---

## Endpoints

### 1. Get All Destinations
- **Endpoint**: `/api/destinations`
- **Method**: `GET`
- **Description**: Fetches a list of all available destinations.
- **Response Example**:
    ```json
    [
      {
        "id": 1,
        "name": "Bali Beach",
        "location": "Bali",
        "rating": 4.5,
        "popularity": 100,
        "image_url": "https://example.com/image.jpg"
      },
      {
        "id": 2,
        "name": "Mount Bromo",
        "location": "East Java",
        "rating": 4.8,
        "popularity": 250,
        "image_url": "https://example.com/image2.jpg"
      }
    ]
    ```

---

### 2. Get Recommended Destinations
- **Endpoint**: `/api/destination/recommendation`
- **Method**: `GET`
- **Description**: Fetches a list of recommended destinations based on popularity and ratings.
- **Response Example**:
    ```json
    [
      {
        "id": 3,
        "name": "Lake Toba",
        "location": "North Sumatra",
        "rating": 4.7,
        "popularity": 150,
        "image_url": "https://example.com/lake.jpg"
      }
    ]
    ```

---

### 3. Get User-Specific Recommended Destinations
- **Endpoint**: `/api/destination/recommendationByUser`
- **Method**: `GET`
- **Description**: Fetches personalized recommended destinations for the authenticated user.
- **Authorization**: `Bearer Token`
- **Response Example**:
    ```json
    [
      {
        "id": 5,
        "name": "Komodo Island",
        "location": "Flores",
        "rating": 4.9,
        "popularity": 300,
        "image_url": "https://example.com/komodo.jpg"
      }
    ]
    ```

---

### 4. Get Destination Details
- **Endpoint**: `/api/destination/{id}`
- **Method**: `GET`
- **Description**: Fetches detailed information for a specific destination.
- **URL Parameters**:
  - `id` (integer) — The ID of the destination.
- **Response Example**:
    ```json
    {
      "id": 1,
      "name": "Bali Beach",
      "location": "Bali",
      "rating": 4.5,
      "popularity": 100,
      "description": "Beautiful beach in Bali",
      "category": {
        "id": 2,
        "name": "Beach"
      },
      "packages": [
        {
          "id": 10,
          "name": "Private Tour",
          "price": 500,
          "description": "Private beach tour"
        }
      ],
      "image_url": "https://example.com/image.jpg"
    }
    ```

---

### 5. Filter Destinations by Category
- **Endpoint**: `/api/destinations/{category}`
- **Method**: `GET`
- **Description**: Fetches destinations filtered by a specific category (e.g., beaches, mountains).
- **URL Parameters**:
  - `category` (string) — The name of the category.
- **Response Example**:
    ```json
    [
      {
        "id": 2,
        "name": "Mount Bromo",
        "location": "East Java",
        "rating": 4.8,
        "category": "Mountain",
        "image_url": "https://example.com/bromo.jpg"
      }
    ]
    ```

---

### 6. Get Lowest Package Price for Destination
- **Endpoint**: `/api/destination/{id}/lowest-price`
- **Method**: `GET`
- **Description**: Fetches the lowest package price available for a specific destination.
- **URL Parameters**:
  - `id` (integer) — The ID of the destination.
- **Response Example**:
    ```json
    {
      "destination_id": 1,
      "lowest_price": 300
    }
    ```

---

### 7. Get Region List
- **Endpoint**: `/api/regions`
- **Method**: `GET`
- **Description**: Fetches all regions for categorizing destinations.
- **Response Example**:
    ```json
    [
      {
        "id": 1,
        "name": "Bali"
      },
      {
        "id": 2,
        "name": "East Java"
      }
    ]
    ```

---

### 8. Get Package Details
- **Endpoint**: `/api/packages/{id}`
- **Method**: `GET`
- **Description**: Fetches details for a specific package.
- **URL Parameters**:
  - `id` (integer) — The ID of the package.
- **Response Example**:
    ```json
    {
      "id": 10,
      "name": "Private Tour",
      "price": 500,
      "description": "Private beach tour"
    }
    ```

---

### 9. Create Order
- **Endpoint**: `/api/orders`
- **Method**: `POST`
- **Description**: Creates a new order for a package.
- **Body Parameters**:
    ```json
    {
      "user_id": 1,
      "package_pricing_id": 10,
      "total_price": 500,
      "payment_method": "credit_card"
    }
    ```
- **Response Example**:
    ```json
    {
      "message": "Order successfully created.",
      "order_id": 123
    }
    ```

---

### 10. Get Order History
- **Endpoint**: `/api/orders/history`
- **Method**: `GET`
- **Description**: Fetches order history for the authenticated user.
- **Authorization**: `Bearer Token`
- **Response Example**:
    ```json
    [
      {
        "order_id": 123,
        "destination": "Bali Beach",
        "package": "Private Tour",
        "total_price": 500,
        "status": "approved",
        "date": "2024-09-01"
      }
    ]
    ```

---

### 11. Get Categories
- **Endpoint**: `/api/categories`
- **Method**: `GET`
- **Description**: Fetches all available categories for filtering destinations.
- **Response Example**:
    ```json
    [
      {
        "id": 1,
        "name": "Beach"
      },
      {
        "id": 2,
        "name": "Mountain"
      }
    ]
    ```

---

### 12. Like a Destination
- **Endpoint**: `/api/destination/{id}/like`
- **Method**: `POST`
- **Description**: Likes a destination for the authenticated user.
- **URL Parameters**:
  - `id` (integer) — The ID of the destination.
- **Authorization**: `Bearer Token`
- **Response Example**:
    ```json
    {
      "message": "Destination liked successfully."
    }
    ```

---

### 13. Get Favorite Destinations
- **Endpoint**: `/api/profile/favorite`
- **Method**: `GET`
- **Description**: Fetches a list of the authenticated user’s favorite destinations.
- **Authorization**: `Bearer Token`
- **Response Example**:
    ```json
    [
      {
        "id": 1,
        "name": "Bali Beach",
        "location": "Bali",
        "rating": 4.5,
        "image_url": "https://example.com/image.jpg"
      }
    ]
    ```

---

### 14. Get Latest Articles
- **Endpoint**: `/api/articles/latest`
- **Method**: `GET`
- **Description**: Fetches the latest articles about destinations or travel tips.
- **Response Example**:
    ```json
    [
      {
        "id": 1,
        "title": "Top 10 Beaches in Indonesia",
        "excerpt": "Discover the most beautiful beaches in the archipelago...",
        "published_at": "2024-08-31"
      }
    ]
    ```

---

### 15. Post Review for Destination
- **Endpoint**: `/api/review`
- **Method**: `POST`
- **Description**: Posts a review for a destination by an authenticated user.
- **Authorization**: `Bearer Token`
- **Body Parameters**:
    ```json
    {
      "destination_id": 1,
      "rating": 5,
      "comment": "Amazing experience!"
    }
    ```
- **Response Example**:
    ```json
    {
      "message": "Review submitted successfully."
    }
    ```

---

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.


