<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function form1() {
        return view('forms.form1');
    }

    function form1_data(Request $request) {
        dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('_token', 'std_name'));
        // dump('eee');
    }
}
