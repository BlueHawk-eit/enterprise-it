<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'API is running']);
});

// The previous /run-migrations route (gated only by a hardcoded query-string key
// committed to source control) let anyone on the internet force-run migrations
// and re-seed the production database, including recreating a fixed
// admin@enterpriseit.com.au / "password" account. It has been removed.
//
// Run migrations from Render's Shell tab instead:
//   php artisan migrate --force
// Or configure a "Pre-Deploy Command" in the Render service settings so
// migrations run automatically and non-interactively on every deploy:
//   php artisan migrate --force
