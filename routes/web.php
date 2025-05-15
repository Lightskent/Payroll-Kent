<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollAnalyticsController;

Route::get('/analytics', [PayrollAnalyticsController::class, 'index']);