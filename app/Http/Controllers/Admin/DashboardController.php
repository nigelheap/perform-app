<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ListingStatuses;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Scopes\UserListingsScope;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Termwind\Components\Li;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard', [
            'pendingUsers' => User::all(),
        ]);
    }
}
