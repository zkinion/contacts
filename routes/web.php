<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/delete_contact/{id}', [ ContactController::class, 'delete_contact' ]);
Route::get('/edit_contact/{id}', [ ContactController::class, 'edit_contact' ]);
Route::get('/add_new_contact/', [ ContactController::class, 'add_new_contact' ]);
Route::get('/save_contact/', [ ContactController::class, 'save_contact' ]);
Route::post('/save_edit_contact/', [ ContactController::class, 'save_edit_contact' ]);

Route::get('/dashboard', function () {

    $user = auth()->user();
    if($user == null){
        return redirect('/');
    }
    $user_id = $user->id;

    $contacts = Contact::where('user_id', '=', $user_id)->get();
    $data = array('contacts' => $contacts);
    return view('dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
