<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'seller' => redirect()->route('seller.dashboard'),
            'bidder' => redirect()->route('bidder.dashboard'),
            default => abort(403, 'Invalid user role.'),
        };
    }
}