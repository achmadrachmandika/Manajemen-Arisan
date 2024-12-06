<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function checkApprovalStatus()
    {
        $user = Auth::user();

        if ($user->is_approved) {
            return response()->json([
                'approved' => true,
                'role' => $user->roles->pluck('name')->first()
            ]);
        }

        return response()->json(['approved' => false]);
    }
}
