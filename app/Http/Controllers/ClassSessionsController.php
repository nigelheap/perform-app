<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassSessionRequest;
use App\Models\ClassSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ClassSessionsController extends Controller
{

    /**
     * @return Response
     */
    public function index()
    {

        $class_sessions = ClassSession::query()
            ->whereNull('expire_at')
            ->orWhere('expire_at', '>', now())
            ->get();

        return Inertia::render('ClassSessions/Index', [
            'class_sessions' => $class_sessions,
        ]);
    }


    /**
     * @param ClassSession $classSession
     * @return Response
     */
    public function show(ClassSession $classSession)
    {
        return Inertia::render('ClassSessions/Show', [
            'classSession' => $classSession,
        ]);
    }

    /**
     * @param ClassSessionRequest $request
     * @return Response
     */
    public function create(Request $request)
    {
        return Inertia::render('ClassSessions/Create');
    }

    /**
     * @param ClassSessionRequest $request
     * @return RedirectResponse
     */
    public function store(ClassSessionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['expire_at'] = now()->addWeekdays(14);
        $classSession = ClassSession::create($data);

        return to_route('class-sessions.show', $classSession);
    }


    /**
     * @param ClassSession $classSession
     * @return Response
     */
    public function edit(ClassSession $classSession)
    {
        return Inertia::render('ClassSessions/Edit', [
            'classSession' => $classSession,
        ]);
    }


    /**
     * @param ClassSession $classSession
     * @param ClassSessionRequest $request
     * @return RedirectResponse
     */
    public function update(ClassSession $classSession, ClassSessionRequest $request)
    {
        $data = $request->validated();
        $data['expire_at'] = now()->addWeekdays(14);
        $classSession->update($data);

        return to_route('class-sessions.show', $classSession);
    }


    /**
     * @param ClassSession $classSession
     * @param ClassSessionRequest $request
     * @return RedirectResponse
     */
    public function delete(ClassSession $classSession, ClassSessionRequest $request)
    {
        return to_route('dashboard');
    }

}
