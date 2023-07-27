<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    function home() {
        $name = "Mohammed Naji";
        $age = 29;

        // return view('home')->with('name', $name)->with('age', $age);
        // return view('home', [
        //     'name' => $name,
        //     'age' => $age
        // ]);
        return view('home', compact('name', 'age'));
    }

    function user($name, $age) {
        return view('user', compact('name', 'age'));
    }

    function posts() {
        $posts = [
            [
                'id' => 1,
                'title' => 'title 1',
                'body' => 'body 1'
            ],
            [
                'id' => 2,
                'title' => 'title 2',
                'body' => 'body 2'
            ],
            [
                'id' => 3,
                'title' => 'title 3',
                'body' => 'body 3'
            ],
            [
                'id' => 4,
                'title' => 'title 4',
                'body' => 'body 4'
            ],
            [
                'id' => 5,
                'title' => 'Prof Ezz',
                'body' => 'body 5'
            ],
            [
                'id' => 6,
                'title' => 'manager ezz',
                'body' => 'body 6'
            ]
        ];

        return view('posts', compact('posts'));
    }

    function answer($ans) {

        if($ans == 'a') {
            $msg = "Your answer is correct";
            $type = "success";
        }else {
            $msg = "Your answer is not correct";
            $type = "danger";
        }
        return view('answer', compact('msg', 'type'));
    }
}
