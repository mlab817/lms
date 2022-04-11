<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinSubjectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        $subject = Subject::where('uuid', $request->uuid)->first();

        if (!$subject) {
            throw new ModelNotFoundException('subject was not found');
        }

        if ($subject->users()->where('user_id', Auth::id())->exists()) {
            throw new \Exception('Subject already has user added');
        }

        $subject->users()->attach(Auth::id());

        return 'added user to subject';
    }
}
