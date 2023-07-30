<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index() {
        return view('blog.index');
    }

    function about() {
        return view('blog.about');
    }

    function contact() {
        return view('blog.contact');
    }

    function post() {
        return view('blog.post');
    }

}
