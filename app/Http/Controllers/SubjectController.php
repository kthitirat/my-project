<?php

namespace App\Http\Controllers;

use App\Http\Transformers\SubjectTransformer;
use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;


class SubjectController extends Controller
{
    public function index()
    {
        return redirect()->route('index');
    }

    public function show(Subject $subject)
    {
        if($subject->published_at === null) {
            abort(403, 'unauthorized.');
        }

        //view
        $userIp = (string)request()->ip();
        $transformUserIp = str_replace('.', '_', $userIp);
        if (!$this->checkSessionById($transformUserIp, $subject->id)) {
            $subject->increment('view');
        }
        Session::put($transformUserIp, $subject->id);
        $subject->fresh();
        //view

        $subjectData = fractal($subject, new SubjectTransformer())->toArray();
        return Inertia::render('Subject/Show')->with([
            'subject' => $subjectData
        ]);
    }

    //view
    private function checkSessionById($transformUserIp, $subjectId)
    {
        if (Session::get($transformUserIp) === $subjectId){
            return true;
        }
        return false;
    }


}
