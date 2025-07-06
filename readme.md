# 📝 Full-Stack Todo App (Laravel + React)

This is a full-stack **Todo List** application built using:

- ⚙️ Laravel (RESTful API backend)
- ⚛️ React.js (frontend SPA)

It supports creating, reading, updating, and deleting todos — with clean architecture and modern tooling.

---

## 📁 Project Structure

todo-app-laravel-react/
├── backend/ # Laravel 10 API
│ └── ...
├── frontend/ # React app (Vite)
│ └── ...




---

## 🚀 Getting Started

### 🔧 Backend (Laravel)

1. Navigate to the backend folder:
```bash
cd backend
```
Install PHP dependencies:

```bash
composer install
```
Copy .env and set app key:

```bash
cp .env.example .env
php artisan key:generate

Set your database config in .env, then run migrations:

```bash
php artisan migrate
```
(Optional) If using Laravel Sanctum:

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\\Sanctum\\SanctumServiceProvider"
php artisan migrate
```
Start the Laravel server:

```bash
php artisan serve
```
The API will be available at: http://localhost:8000

💻 Frontend (React)
Navigate to the frontend folder:

```bash
cd frontend
```
Install Node.js dependencies:

```bash
npm install
```
(Optional) Create .env file to set backend URL:

```bash
VITE_API_URL=http://localhost:8000/api
```
Start the React dev server:

```bash
npm run dev
```
The frontend will run at: http://localhost:5173

🔗 API Endpoints
Method	    Endpoint	        Description
GET	        /api/todos	        Get all todos
POST	    /api/todos	        Create a new todo
PUT	        /api/todos/{id}	    Update a todo
DELETE	    /api/todos/{id}	    Delete a todo

Sample request body:

```json
{
  "title": "Learn Laravel",
  "description": "Follow a full tutorial",
  "is_done": false
}
```
🧪 Testing (Postman)
Make sure to send requests to http://localhost:8000/api.
If you're using Sanctum auth, set Authorization: Bearer <token> header.

⚒️ Build for Production
Laravel
```bash
php artisan config:cache
php artisan route:cache
```
React
```bash
npm run build
```
You can then deploy both separately or serve React using Laravel.

📄 License
MIT License © Mohammad Ali

🙌 Acknowledgements
Laravel: https://laravel.com

React: https://react.dev

Vite: https://vitejs.dev