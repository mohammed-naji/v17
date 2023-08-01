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

    function form2() {
        return view('forms.form2');
    }

    function form2_data(Request $request) {


        $request->validate([
            'name' => 'required|min:4|max:20',
            'email' => 'required|email|ends_with:@gmail.com',
            'specialization' => 'required|in:it,eng',
        ]);

        dd( $request->all() );

        // $name = $request->input('name');
        $name = $request->name;
        $email = $request->email;
        $sp = $request->specialization;

        return view('forms.form2_info', compact('name', 'email', 'sp'));
    }

    function form3() {
        return view('forms.form3');
    }

    function form3_data(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'required',
            'gender' => 'required',
            // 'education' => 'required',
            // 'start_edu' => 'required',
            // 'end_edu' => 'required',
            // 'interesting' => 'required',
            'bio' => 'nullable|min:10',
        ]);

        dd($request->all());

    }
}
