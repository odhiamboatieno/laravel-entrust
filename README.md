# Laravel Entrust (Supports Laravel 5 to 12)

A robust and flexible package to manage role-based permissions for your Laravel applications.

## Version Compatibility

| Laravel   | Laravel Entrust |
| --------- | --------------- |
| 12.x      | \[4.x]          |
| 11.x      | \[4.x]          |
| 10.x      | \[4.x]          |
| 9.x       | \[3.x]          |
| 8.x       | \[2.x]          |
| 7.x - 5.x | \[1.x]          |

## 📌 Table of Contents

* [Introduction](#introduction)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)

  * [Roles and Permissions](#roles-and-permissions)
  * [Middleware](#middleware)
  * [Soft Deletes](#soft-deletes)
* [Troubleshooting](#troubleshooting)
* [Contribution Guidelines](#contribution-guidelines)
* [License](#license)

---

## 🚀 Introduction

**Laravel Entrust** is a role and permission management package for Laravel applications, providing an intuitive way to manage user roles and permissions.

### Key Features

* Role and Permission Management
* Middleware for Authorization Control
* Configurable Permission Structure
* Easy-to-use API for Role and Permission Checks

## ✅ Installation

1. Install the package via composer:

```bash
composer require odhiamboatieno/laravel-entrust
```

2. Publish the package configuration:

```bash
php artisan vendor:publish --tag="LaravelEntrust"
```

3. Run the setup command to create migration files:

```bash
php artisan laravel-entrust:setup
```

4. Add the `LaravelEntrustUserTrait` to your User model:

```php
use Odhiambo\LaravelEntrust\Traits\LaravelEntrustUserTrait;

class User extends Model
{
    use LaravelEntrustUserTrait;
}
```

## ⚙️ Configuration

1. Configure the published file in `config/entrust.php` to set your models, tables, and guard settings.

2. Define the roles, permissions, and relationships as needed for your application.

## ✅ Usage

### Roles and Permissions

Assign roles and permissions to users using the trait methods:

```php
$user = User::find(1);
$user->attachRole('admin');
$user->hasRole('admin'); // true
$user->hasPermission('create-post');
```

### Middleware

Protect your routes using middleware for roles or permissions:

```php
Route::group(['middleware' => ['role:admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::get('/posts', [PostController::class, 'index'])->middleware('permission:view-posts');
```

### Soft Deletes

If using soft deletes on roles or permissions, ensure to clear relationships before force deleting:

```php
$role = Role::find(1);
$role->users()->sync([]);
$role->permissions()->sync([]);
$role->forceDelete();
```

## ❓ Troubleshooting

If you encounter migration errors, ensure your database uses the correct integer type (BigInteger) for foreign keys.

## 💡 Contribution Guidelines

* Follow PSR-12 coding standards.
* Submit bug reports or feature requests via GitHub Issues.
* Pull requests are welcome.

## 📜 License

Laravel-Entrust is licensed under the MIT license.
