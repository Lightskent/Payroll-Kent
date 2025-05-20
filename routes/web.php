<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollAnalyticsController;

Route::get('/', [PayrollAnalyticsController::class, 'index']);