<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// 追記
use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;

        if (cond_title != '') {
             $posts = Profile::Where('name',$cond_title)->get();
        } else {
            $posts = Profile::all();
        }

    
        return view('admin.profile.index', ['cond_title' => $cond_title, 'posts' => $posts]);
    }
}