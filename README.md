Full-stack eCommerce app built with Laravel (API) + Next.js (TypeScript + Redux).

## Features
- Smart search
- Flash deals with discounts
- Live stock system
- Wishlist and cart (Redux)
- Auth with Laravel Sanctum
- Orders history and checkout

## Stack
- Laravel 12
- PostgreSQL
- Next.js 15 + TypeScript + Redux Toolkit

## Setup
1. `cd coffegear-backend && composer install`
2. `cp .env.example .env && php artisan key:generate`
3. `php artisan migrate --seed`
4. `cd ../coffegear-frontend && npm install && npm run dev`