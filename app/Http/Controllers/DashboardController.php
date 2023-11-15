<?php

namespace App\Http\Controllers;

use App\Models\ClassSession;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    /**
     * @return Response
     */
    public function index()
    {

        $classSessions = ClassSession::query()
            ->whereNull('expire_at')
            ->orWhere('expire_at', '>', now())
            ->get();

        return Inertia::render('Dashboard', [
            'classSessions' => $classSessions,
        ]);
    }

}
