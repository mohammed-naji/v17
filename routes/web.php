<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\StudentController;
use App\Models\Post;
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
// Route::get('/', function() {
//     // $link = url('/contact-us');
//     // $link = route('contactpage');
//     // return "<a href='$link'>Contact Us</a>";

//     $name = 'go';
//     $type = 'classroom';

//     // $link = "/courses/$name/$type";
//     $link = route('coursepage', [$name, $type]);
//     return "<a href='$link'>Course Page</a>";
// });
// Route::get('/about', function() {
//     return 'About Us Page';
// });

// Route::get('/contact-abc', function() {
//     return 'Contact Us Page';
// })->name('contactpage');

// Route::get('/courses/2023/{name}/new/{type?}', function($name, $type = 'online') {
//     return "Course $name and type $type";
// })->name('page.course');








// Route::prefix('student')->name('student.')->group(function() {
//     Route::get('/home', [StudentController::class, 'index'])->name('home');
//     Route::get('/info', [StudentController::class, 'info'])->name('info');
//     Route::get('/avg', [StudentController::class, 'avg'])->name('avg');
//     Route::get('/subject', [StudentController::class, 'subject'])->name('subject');
//     Route::get('/marks', [StudentController::class, 'marks'])->name('marks');
// });


// Route::get('/home', [AppController::class, 'home'])->name('home');

// Route::get('user/{name}/{age}', [AppController::class, 'user']);

// Route::get('/posts', [AppController::class, 'posts'])->name('posts');

// Route::get('/answer/{ans}', [AppController::class, 'answer'])->name('answer');


Route::get('/', [PersonalController::class, 'home'])->name('index');

Route::get('contact', [PersonalController::class, 'contact'])->name('contact');
Route::post('contact', [PersonalController::class, 'contact_data'])->name('contact_data');

Route::get('projects', [PersonalController::class, 'projects'])->name('projects');
Route::get('resume', [PersonalController::class, 'resume'])->name('resume');

Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/post', 'post')->name('post');
});

Route::get('form1', [FormController::class, 'form1'])->name('form1');
Route::post('form1', [FormController::class, 'form1_data'])->name('form1_data');

Route::get('form2', [FormController::class, 'form2'])->name('form2');
Route::post('form2', [FormController::class, 'form2_data'])->name('form2_data');

Route::get('form3', [FormController::class, 'form3'])->name('form3');
Route::post('form3', [FormController::class, 'form3_data'])->name('form3_data');

Route::get('form4', [FormController::class, 'form4'])->name('form4');
Route::post('form4', [FormController::class, 'form4_data'])->name('form4_data');

Route::get('posts', function() {
    dd( Post::all() );
});




// Products CRUD App
// C => Create
// R => Read
// U => Update
// D => Delete

// // Create Routes
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// // Read Routes
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// // Update Routes
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::match(['put', 'patch'],'/products/{product}', [ProductController::class, 'update'])
// ->name('products.update');

// // Delete Routes
// Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::get('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');
Route::delete('/products/{product}/forcedelete', [ProductController::class, 'forcedelete'])->name('products.forcedelete');
Route::resource('products', ProductController::class);




Route::get('/users', [RelationController::class, 'users']);





//
