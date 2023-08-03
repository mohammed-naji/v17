<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonalController extends Controller
{
    function home() {
        return view('personal.home');
    }

    function contact() {
        return view('personal.contact');
    }

    function contact_data(Request $request) {
        // dd($request->all());
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'image' => 'required',
        ]);

        $img_name = time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $img_name);

        $data = $request->except('_token');
        $data['image'] = $img_name;
        // dd($data);

        Mail::to('karaja70e@gmail.com')->send(new ContactUsMail($data));

        // PHPMailer
        // mailtrap
        // Mail::to('admin@gmail.com')->send(new TestMail());
    }

    function projects() {
        return view('personal.projects');
    }

    function resume() {
        return view('personal.resume');
    }

}
