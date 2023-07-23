<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index() {
        return 'index page';
    }

    function info() {
        return 'info page';
    }

    function avg() {
        return 'avg page';
    }

    function subject() {
        return 'subject page';
    }

    function marks() {
        return 'marks page';
    }


}
