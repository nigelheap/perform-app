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
     * @param Curso $classSession
     * @param string $type
     * @param Request $request
     * @return Response
     */
    public function index(Curso $classSession, string $type, Request $request)
    {
        $this->validateType($type);

        $posts = $classSession
            ->posts()
            ->where('type')
            ->get();

        return Inertia::render('Posts/' . ucfirst($type), [
            'posts' => $posts,
            'classSession' => $classSession,
        ]);
    }


    /**
     * @param Curso $classSession
     * @param string $type
     * @param Request $request
     * @return Response
     */
    public function create(Curso $classSession, string $type, Request $request)
    {
        $this->validateType($type);

        return Inertia::render('Posts/' . ucfirst($type), [
            'classSession' => $classSession,
        ]);
    }


    /**
     * @param Curso $classSession
     * @param string $type
     * @param PostRequest $request
     * @return Response
     */
    public function store(Curso $classSession, string $type, PostRequest $request)
    {
        $this->validateType($type);

        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['class_session_id'] = $classSession->id;

        $classSession->posts()->create();

        return Inertia::render('Posts/' . ucfirst($type), [
            'classSession' => $classSession,
        ]);
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
