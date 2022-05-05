<?php
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);


//Route::get('/categories/{category:slug}', function (Category $category) {
//    return view ('posts',[
//        'posts'=> $category->posts->load(["category","author"]),
//        "currentCategory"=>$category,
 //       "categories"=>Category::all()
  //  ]);
//})->name('category');

Route::get('/?author={author:username}', function (User $author) {
    return view ('posts.index',[
        'posts'=> $author->posts->load(["category","author"]),
    ]);
});




Route::get('/hello', function () {
    return "hello world 🌍💣 bomb";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
