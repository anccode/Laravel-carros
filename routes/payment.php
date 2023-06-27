<?php

use App\Http\Livewire\Web\PaymentManagement;
use Illuminate\Support\Facades\Route;

Route::get('/checkout',PaymentManagement::class)->name('checkout');
