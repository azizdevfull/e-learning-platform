<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestResultController extends Controller
{
    public function index()
    {
        $results = TestResult::where('user_id', Auth::id())->with('test')->paginate(10);
        return view('student.results.index', compact('results'));
    }
}
