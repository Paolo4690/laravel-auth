<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function index()
    {
        $elements = Post::paginate(20);
        return view('guests.index', compact('elements'));
    }

}
