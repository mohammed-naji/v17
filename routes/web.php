<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('', function() {
//     return 'Home';
// });

// Route::get('/about', function() {
//     return 'About Page';
// });

// Route::get('contact', function() {
//     return 'Contact Page';
// });


// include 'admin.php';
// http://127.0.0.1:8000/

// Route::get('url', 'action');
// Route::post('url', 'action');
// Route::put('url', 'action');
// Route::patch('url', 'action');
// Route::delete('url', 'action');

// Route::post('/', function() {
//     return 'Homepage';
// });

// Route::put('/', function() {
//     return 'Homepage';
// });

// Route::get('/', function() {
//     return view('welcome');
// });

// Route::view('/', 'welcome');

// Route::match(['put', 'patch'], '/edit', function() {
//     return 'Edit page';
// });

// Route::any('policy', function() {
//     return 'Any Content';
// });

// Route::get('user/{name}/{age}', function($name, $age) {
//     return "Welcome $name, your age is $age";
// })->whereAlpha('name');

// // method chain
// class Car {
//     protected $name;
//     protected $model;
//     function getName() {
//         echo $this->name;
//         return $this;
//     }
//     function getModel() {
//         echo $this->model;
//         return $this;
//     }
// }

// $c1 = new Car();
// $c1->getName()->getModel();


// home , about , contact
Route::get('/', function() {
    // $link = url('/contact-us');
    // $link = route('contactpage');
    // return "<a href='$link'>Contact Us</a>";

    $name = 'go';
    $type = 'classroom';

    // $link = "/courses/$name/$type";
    $link = route('coursepage', [$name, $type]);
    return "<a href='$link'>Course Page</a>";
});
// Route::get('/about', function() {
//     return 'About Us Page';
// });

Route::get('/contact-abc', function() {
    return 'Contact Us Page';
})->name('contactpage');

Route::get('/courses/2023/{name}/new/{type?}', function($name, $type = 'online') {
    return "Course $name and type $type";
})->name('page.course');









Route::prefix('student')->name('student.')->group(function() {
    Route::get('/home', [StudentController::class, 'index'])->name('home');
    Route::get('/info', [StudentController::class, 'info'])->name('info');
    Route::get('/avg', [StudentController::class, 'avg'])->name('avg');
    Route::get('/subject', [StudentController::class, 'subject'])->name('subject');
    Route::get('/marks', [StudentController::class, 'marks'])->name('marks');
});
