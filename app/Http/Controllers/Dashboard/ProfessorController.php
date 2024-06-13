<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Transformers\ProfessorTransformer;
use App\Models\Professor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::paginate(5);
        $professorData = fractal($professors, new ProfessorTransformer())->includeImage()->toArray();
        return Inertia::render('Dashboard/Professor/Index')->with([
            'professors' => $professorData
        ]);
    }




    public function destroy(Professor $professor)
    {
       if ($professor->subjects()->count() > 0) {
            return redirect()->route('dashboard.professors.index')->with('error','professor ยังมีสอนอยู่');

       }
        $professor->delete();
        return redirect()->route('dashboard.professors.index')->with('success', 'professor deleted');
    }
}
