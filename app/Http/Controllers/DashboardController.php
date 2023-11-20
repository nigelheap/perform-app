<?php

namespace App\Http\Controllers;

use App\Models\Curso;
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

        $cursos = Curso::query()
            ->whereNull('expire_at')
            ->orWhere('expire_at', '>', now())
            ->with('user')
            ->get();

        return Inertia::render('Dashboard', [
            'cursos' => $cursos,
        ]);
    }

}
