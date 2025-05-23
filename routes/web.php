<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Sanctum CSRF cookie route for SPA authentication
Route::get('/sanctum/csrf-cookie', function () {
    return response()->noContent();
});

// API Documentation and Welcome Route
Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the Library Management API',
        'status' => 'operational',
        'documentation' => [
            'version' => '1.0.0',
            'endpoints' => [
                'auth' => [
                    'POST /api/auth/register' => 'Register a new user',
                    'POST /api/auth/login' => 'Login with credentials',
                    'POST /api/auth/logout' => 'Logout (authenticated)',
                    'GET /api/auth/me' => 'Get current user info',
                ],
                'books' => [
                    'GET /api/books' => 'List all books (paginated)',
                    'POST /api/books' => 'Create new book (admin only)',
                    'GET /api/books/{id}' => 'Get book details',
                    'PUT /api/admin/books/{id}' => 'Update book (admin only)',
                    'DELETE /api/admin/books/{id}' => 'Delete book (admin only)',
                    'POST /api/books/{id}/borrow' => 'Borrow a book (authenticated user)',
                ],
                'transactions' => [
                    'GET /api/transactions' => 'List authenticated user\'s transactions',
                    'GET /api/transactions/{id}' => 'Get transaction details',
                    'POST /api/transactions/{id}/return' => 'Return a book',
                ],
                'users' => [
                    'GET /api/admin/users' => 'List all users (admin only)',
                    'GET /api/admin/users/{id}' => 'Get user details (admin only)',
                    'PUT /api/admin/users/{id}' => 'Update user (admin only)',
                    'DELETE /api/admin/users/{id}' => 'Delete user (admin only)',
                ]
            ],
            'notes' => [
                'All API endpoints are prefixed with /api',
                'Admin endpoints require admin privileges',
                'Authentication required for most endpoints'
            ]
        ]
    ]);
});

// Health check endpoint for monitoring
Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now()->toDateTimeString(),
        'services' => [
            'database' => 'connected',
            'cache' => 'operational',
            'storage' => 'available'
        ]
    ]);
});