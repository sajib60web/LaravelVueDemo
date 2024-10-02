<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\TimeHelper;
use App\Models\Post;
use Carbon\Carbon;

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
        return view('home');
    }

    public function customers()
    {
        return view('pages.customers');
    }

    public function components()
    {
        return view('pages.components');
    }

    public function bootstrapVue()
    {
        return view('pages.bootstrap_vue');
    }

    public function shift()
    {
        $timeOfDay = TimeHelper::getTimeOfDay();
        return view('pages.shift', compact('timeOfDay'));
    }

    public function shiftData()
    {
        $currentTime = Carbon::now();
        $hour = $currentTime->hour;
        if ($hour >= 5 && $hour < 12) {
            $posts = Post::morning()->get();
        } elseif ($hour >= 12 && $hour < 18) {
            $posts = Post::afternoon()->get();
        } else {
            $posts = Post::evening()->get();
        }
        $timeOfDay = TimeHelper::getTimeOfDay();
        return view('pages.shift_data', compact('posts', 'timeOfDay'));
    }

    public function tabComponent()
    {
        return view('pages.tab_component');
    }
}
