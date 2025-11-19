<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CafeController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\PastOrderController;
use App\Http\Controllers\Api\PastItemController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\CafeTableController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\CancelController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TableDefinitionController;
use App\Http\Controllers\CafeAuthController;

// Cafe Authentication Routes (public)
Route::post('cafe/register', [CafeAuthController::class, 'register']);
Route::post('cafe/login', [CafeAuthController::class, 'login']);

// Cafe Protected Routes
Route::middleware('auth:cafe')->group(function () {
    Route::post('cafe/logout', [CafeAuthController::class, 'logout']);
    Route::get('cafe/me', [CafeAuthController::class, 'me']);
});

// Products
Route::get('products/list', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::post('products/create', [ProductController::class, 'store']);
Route::match(['put','patch'], 'products/{product}/update', [ProductController::class, 'update']);
Route::delete('products/{product}/delete', [ProductController::class, 'destroy']);

// Categories
Route::get('categories/list', [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::post('categories/create', [CategoryController::class, 'store']);
Route::match(['put','patch'], 'categories/{category}/update', [CategoryController::class, 'update']);
Route::delete('categories/{category}/delete', [CategoryController::class, 'destroy']);

// Cafes
Route::get('cafes/list', [CafeController::class, 'index']);
Route::get('cafes/{cafe}', [CafeController::class, 'show']);
Route::post('cafes/create', [CafeController::class, 'store']);
Route::match(['put','patch'], 'cafes/{cafe}/update', [CafeController::class, 'update']);
Route::delete('cafes/{cafe}/delete', [CafeController::class, 'destroy']);

// Carts
Route::get('carts/list', [CartController::class, 'index']);
Route::get('carts/{cart}', [CartController::class, 'show']);
Route::post('carts/create', [CartController::class, 'store']);
Route::match(['put','patch'], 'carts/{cart}/update', [CartController::class, 'update']);
Route::delete('carts/{cart}/delete', [CartController::class, 'destroy']);

// Past Orders
Route::get('past-orders/list', [PastOrderController::class, 'index']);
Route::get('past-orders/{pastOrder}', [PastOrderController::class, 'show']);
Route::post('past-orders/create', [PastOrderController::class, 'store']);
Route::match(['put','patch'], 'past-orders/{pastOrder}/update', [PastOrderController::class, 'update']);
Route::delete('past-orders/{pastOrder}/delete', [PastOrderController::class, 'destroy']);

// Past Items
Route::get('past-items/list', [PastItemController::class, 'index']);
Route::get('past-items/{pastItem}', [PastItemController::class, 'show']);
Route::post('past-items/create', [PastItemController::class, 'store']);
Route::match(['put','patch'], 'past-items/{pastItem}/update', [PastItemController::class, 'update']);
Route::delete('past-items/{pastItem}/delete', [PastItemController::class, 'destroy']);

// Notifications
Route::get('notifications/list', [NotificationController::class, 'index']);
Route::get('notifications/{notification}', [NotificationController::class, 'show']);
Route::post('notifications/create', [NotificationController::class, 'store']);
Route::match(['put','patch'], 'notifications/{notification}/update', [NotificationController::class, 'update']);
Route::delete('notifications/{notification}/delete', [NotificationController::class, 'destroy']);

// Tables
Route::get('tables/list', [CafeTableController::class, 'index']);
Route::get('tables/{table}', [CafeTableController::class, 'show']);
Route::post('tables/create', [CafeTableController::class, 'store']);
Route::match(['put','patch'], 'tables/{table}/update', [CafeTableController::class, 'update']);
Route::delete('tables/{table}/delete', [CafeTableController::class, 'destroy']);

// Order Items
Route::get('order-items/list', [OrderItemController::class, 'index']);
Route::get('order-items/{orderItem}', [OrderItemController::class, 'show']);
Route::post('order-items/create', [OrderItemController::class, 'store']);
Route::match(['put','patch'], 'order-items/{orderItem}/update', [OrderItemController::class, 'update']);
Route::delete('order-items/{orderItem}/delete', [OrderItemController::class, 'destroy']);

// Cancels
Route::get('cancels/list', [CancelController::class, 'index']);
Route::get('cancels/{cancel}', [CancelController::class, 'show']);
Route::post('cancels/create', [CancelController::class, 'store']);
Route::match(['put','patch'], 'cancels/{cancel}/update', [CancelController::class, 'update']);
Route::delete('cancels/{cancel}/delete', [CancelController::class, 'destroy']);

// Ratings
Route::get('ratings/list', [RatingController::class, 'index']);
Route::get('ratings/{rating}', [RatingController::class, 'show']);
Route::post('ratings/create', [RatingController::class, 'store']);
Route::match(['put','patch'], 'ratings/{rating}/update', [RatingController::class, 'update']);
Route::delete('ratings/{rating}/delete', [RatingController::class, 'destroy']);

// Users
Route::get('users/list', [UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::post('users/create', [UserController::class, 'store']);
Route::match(['put','patch'], 'users/{user}/update', [UserController::class, 'update']);
Route::delete('users/{user}/delete', [UserController::class, 'destroy']);

// Table Definitions (Masa Tanımları)
Route::get('table-definitions/list', [TableDefinitionController::class, 'index']);
Route::get('table-definitions/cafe/{cafeId}', [TableDefinitionController::class, 'getByCafe']);
Route::get('table-definitions/{tableDefinition}', [TableDefinitionController::class, 'show']);
Route::post('table-definitions/create', [TableDefinitionController::class, 'store']);
Route::match(['put','patch'], 'table-definitions/{tableDefinition}/update', [TableDefinitionController::class, 'update']);
Route::delete('table-definitions/{tableDefinition}/delete', [TableDefinitionController::class, 'destroy']);
