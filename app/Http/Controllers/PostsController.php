<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Curso;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostsController extends Controller
{

    public function all(Curso $classSession, Request $request)
    {
        return Inertia::render('Posts', [
            'posts' => $classSession->posts()->get(),
            'classSession' => $classSession,
        ]);
    }

    /**
     * @param Curso $curso
     * @param string $type
     * @param Request $request
     * @return Response
     */
    public function index(Curso $curso, string $type, Request $request)
    {
        $this->validateType($type);

        $posts = $curso
            ->posts()
            ->where('type', $type)
            ->get();

        return Inertia::render('Posts/' . ucfirst($type), [
            'posts' => $posts,
            'curso' => $curso,
        ]);
    }


    /**
     * @param Curso $curso
     * @param string $type
     * @param Request $request
     * @return Response
     */
    public function create(Curso $curso, string $type, Request $request)
    {
        $this->validateType($type);

        return Inertia::render('Posts/' . ucfirst($type), [
            'curso' => $curso,
            'type' => $type,
        ]);
    }


    /**
     * @param Curso $curso
     * @param string $type
     * @param PostRequest $request
     * @return Response
     */
    public function store(Curso $curso, string $type, PostRequest $request)
    {
        $this->validateType($type);

        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['type'] = $type;

        $curso->posts()->create($data);

        return to_route('cursos.show', $curso);
    }

    /**
     * @param Curso $classSession
     * @param Post $post
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function update(Curso $classSession, Post $post, PostRequest $request)
    {
        $post->update($request->validated());

        return to_route('posts.show', $post->id);
    }


    /**
     * @param Curso $cursos
     * @param Post $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Curso $cursos, Post $post, Request $request)
    {
        $post->delete();

        return to_route('cursos.show', $cursos);
    }



    /**
     * @param string $type
     * @return void
     */
    private function validateType(string $type)
    {
        abort_unless(in_array($type, ['camera', 'escribe', 'audio', 'geo']), 403);
    }
}
