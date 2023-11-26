<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    /**
     * @return Response
     */
    public function index(Request $request)
    {

        $cursos = Curso::query()
            ->whereNull('expire_at')
            ->orWhere('expire_at', '>', now())
            ->with(['owner' => function (BelongsTo $query) {
                    $query->select(['id', 'name']);
                }, 'users' => function (BelongsToMany $query) {
                    $query->select(['id', 'name']);
                }])
            ->get();

        return Inertia::render('Dashboard', [
            'cursos' => $cursos,
        ]);
    }

}
