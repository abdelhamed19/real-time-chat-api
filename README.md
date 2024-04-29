# Laravel Chat API with Pusher

This Laravel API provides a simple chat functionality using Pusher services. It includes authentication operations for user management such as registration, login, and logout. The API exposes three endpoints to manage sending and receiving messages.

## Setup

1. **Clone the repository:**

    ```bash
    git clone <repository_url>
    ```

2. **Navigate to the project directory:**

    ```bash
    cd laravel-chat-api
    ```

3. **Install dependencies:**

    ```bash
    composer install
    ```

4. **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```

5. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

6. **Set up your Pusher credentials in the `.env` file:**

    ```dotenv
    PUSHER_APP_ID=your_pusher_app_id
    PUSHER_APP_KEY=your_pusher_app_key
    PUSHER_APP_SECRET=your_pusher_app_secret
    PUSHER_APP_CLUSTER=your_pusher_app_cluster
    ```

7. **Set up your database credentials in the `.env` file.**

8. **Migrate the database:**

    ```bash
    php artisan migrate
    ```

9. **Run the development server:**

    ```bash
    php artisan serve
    ```

## API Endpoints

### Authentication

#### Register a new user

- **URL:** `/api/register`
- **Method:** `POST`
- **Request Body:**
  
    ```json
    {
        "name": "John Doe",
        "email": "john@example.com",
        "password": "password"
        "password_confirmation": "password"
    }
    ```
- **Response:**
  
    ```json
    {
        "message": "User registered successfully"
    }
    ```

#### Login

- **URL:** `/api/login`
- **Method:** `POST`
- **Request Body:**
  
    ```json
    {
        "email": "john@example.com",
        "password": "password"
    }
    ```
- **Response:**
  
    ```json
    {
        "access_token": "your_access_token",
        "token_type": "Bearer"
    }
    ```

#### Logout

- **URL:** `/api/logout`
- **Method:** `POST`
- **Headers:** `Authorization: Bearer your_access_token`
- **Response:**
  
    ```json
    {
        "message": "User logged out successfully"
    }
    ```

### Chat

#### Get sent messages

- **URL:** `/api/messages/sent`
- **Method:** `GET`
- **Headers:** `Authorization: Bearer your_access_token`
- **Response:**
  
    ```json
    [
        {
            "id": 1,
            "sender_id": 1,
            "recipient_id": 2,
            "message": "Hello",
            "created_at": "2024-04-30 12:00:00",
            "updated_at": "2024-04-30 12:00:00"
        },
        {
            "id": 2,
            "sender_id": 1,
            "recipient_id": 3,
            "message": "Hi there",
            "created_at": "2024-04-30 12:01:00",
            "updated_at": "2024-04-30 12:01:00"
        }
    ]
    ```

#### Get received messages

- **URL:** `/api/messages/received`
- **Method:** `GET`
- **Headers:** `Authorization: Bearer your_access_token`
- **Response:**
  
    ```json
    [
        {
            "id": 3,
            "sender_id": 2,
            "recipient_id": 1,
            "message": "Hey",
            "created_at": "2024-04-30 12:02:00",
            "updated_at": "2024-04-30 12:02:00"
        }
    ]
    ```

#### Send a message

- **URL:** `/api/messages/send`
- **Method:** `POST`
- **Headers:** `Authorization: Bearer your_access_token`
- **Request Body:**
  
    ```json
    {
        "recipient_id": 2,
        "message": "Hello"
    }
    ```
- **Response:**
  
    ```json
    {
        "message": "Message sent successfully"
    }
    ```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)

