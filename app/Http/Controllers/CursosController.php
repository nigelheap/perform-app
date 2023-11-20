<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CursosController extends Controller
{

    /**
     * @return Response
     */
    public function index()
    {

        $class_sessions = Curso::query()
            ->whereNull('expire_at')
            ->orWhere('expire_at', '>', now())
            ->get();

        return Inertia::render('Cursos/Index', [
            'cursos' => $class_sessions,
        ]);
    }


    /**
     * @param Curso $curso
     * @return Response
     */
    public function show(Curso $curso)
    {
        return Inertia::render('Cursos/Show', [
            'curso' => $curso,
        ]);
    }

    /**
     * @param CursoRequest $request
     * @return Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Cursos/Create');
    }

    /**
     * @param CursoRequest $request
     * @return RedirectResponse
     */
    public function store(CursoRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['expire_at'] = now()->addWeekdays(14);
        $cursos = Curso::create($data);

        return to_route('cursos.show', $cursos);
    }


    /**
     * @param Curso $classSession
     * @return Response
     */
    public function edit(Curso $classSession)
    {
        return Inertia::render('Cursos/Edit', [
            'cursos' => $classSession,
        ]);
    }


    /**
     * @param Curso $curso
     * @param CursoRequest $request
     * @return RedirectResponse
     */
    public function update(Curso $curso, CursoRequest $request)
    {
        $data = $request->validated();
        $data['expire_at'] = now()->addWeekdays(14);
        $curso->update($data);

        return to_route('cursos.show', $curso);
    }


    /**
     * @param Curso $curso
     * @param CursoRequest $request
     * @return RedirectResponse
     */
    public function delete(Curso $curso, CursoRequest $request)
    {



        return to_route('dashboard');
    }

}
