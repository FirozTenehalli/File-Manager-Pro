<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = Files::where('user_id', auth()->user()->id)->get();
        $image = $files->where('category', 'image');
        $video = $files->where('category', 'video');
        $music = $files->where('category', 'music');
        $document = $files->where('category', 'documents');
        return view('home', compact('image', 'video', 'music', 'document'));
    }
}
