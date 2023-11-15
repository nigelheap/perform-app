<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\ClassSession;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostsController extends Controller
{

    public function all(ClassSession $classSession, Request $request)
    {
        return Inertia::render('Posts', [
            'posts' => $classSession->posts()->get(),
            'classSession' => $classSession,
        ]);
    }

    /**
     * @param ClassSession $classSession
     * @param string $type
     * @param Request $request
     * @return Response
     */
    public function index(ClassSession $classSession, string $type, Request $request)
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
     * @param ClassSession $classSession
     * @param string $type
     * @param Request $request
     * @return Response
     */
    public function create(ClassSession $classSession, string $type, Request $request)
    {
        $this->validateType($type);

        return Inertia::render('Posts/' . ucfirst($type), [
            'classSession' => $classSession,
        ]);
    }


    /**
     * @param ClassSession $classSession
     * @param string $type
     * @param PostRequest $request
     * @return Response
     */
    public function store(ClassSession $classSession, string $type, PostRequest $request)
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
     * @param ClassSession $classSession
     * @param Post $post
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function update(ClassSession $classSession, Post $post, PostRequest $request)
    {
        $post->update($request->validated());

        return to_route('posts.show', $post->id);
    }


    /**
     * @param ClassSession $classSession
     * @param Post $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(ClassSession $classSession, Post $post, Request $request)
    {
        $post->delete();

        return to_route('class-sessions.show', $classSession);
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
