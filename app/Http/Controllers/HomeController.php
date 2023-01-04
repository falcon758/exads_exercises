<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the exercises.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('exercises');
    }
}