# real-time-chat-api
Laravel Chat API with Pusher
This Laravel API provides a simple chat functionality using Pusher services. It includes authentication operations for user management such as registration, login, and logout. The API exposes three endpoints to manage sending and receiving messages.

Setup
Clone the repository:
bash
Copy code
git clone <repository_url>
Navigate to the project directory:
bash
Copy code
cd laravel-chat-api
Install dependencies:
Copy code
composer install
Copy the .env.example file to .env:
bash
Copy code
cp .env.example .env
Generate the application key:
vbnet
Copy code
php artisan key:generate
Set up your Pusher credentials in the .env file:
makefile
Copy code
PUSHER_APP_ID=your_pusher_app_id
PUSHER_APP_KEY=your_pusher_app_key
PUSHER_APP_SECRET=your_pusher_app_secret
PUSHER_APP_CLUSTER=your_pusher_app_cluster
Set up your database credentials in the .env file.
Migrate the database:
Copy code
php artisan migrate
Run the development server:
Copy code
php artisan serve
API Endpoints
Authentication
Register a new user
URL: /api/register
Method: POST
Request Body:
json
Copy code
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password"
}
Response:
json
Copy code
{
    "message": "User registered successfully"
}
Login
URL: /api/login
Method: POST
Request Body:
json
Copy code
{
    "email": "john@example.com",
    "password": "password"
}
Response:
json
Copy code
{
    "access_token": "your_access_token",
    "token_type": "Bearer"
}
Logout
URL: /api/logout
Method: POST
Headers: Authorization: Bearer your_access_token
Response:
json
Copy code
{
    "message": "User logged out successfully"
}
Chat
Get sent messages
URL: /api/messages/sent
Method: GET
Headers: Authorization: Bearer your_access_token
Response:
json
Copy code
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
Get received messages
URL: /api/messages/received
Method: GET
Headers: Authorization: Bearer your_access_token
Response:
json
Copy code
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
Send a message
URL: /api/messages/send
Method: POST
Headers: Authorization: Bearer your_access_token
Request Body:
json
Copy code
{
    "recipient_id": 2,
    "message": "Hello"
}
Response:
json
Copy code
{
    "message": "Message sent successfully"
}
