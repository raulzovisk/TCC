<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ExercicioController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\InstrutorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});




Route::post('/register', function (\Illuminate\Http\Request $request) {
    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/Aluno/create', [AlunoController::class, 'create'])->name('Aluno.create')->middleware('auth');
Route::post('/Aluno/create', [AlunoController::class, 'store'])->name('Aluno.store')->middleware('auth');
Route::get('/Aluno/edit/{id}', [AlunoController::class, 'edit'])->name('Aluno.edit')->middleware('auth');
Route::put('/Aluno/update/{id}', [AlunoController::class, 'update'])->name('Aluno.update')->middleware('auth');
Route::get('/Aluno/delete/{id}', [AlunoController::class, 'delete'])->name('Aluno.delete')->middleware('auth');
Route::get('/Aluno/show', [AlunoController::class, 'show'])->name('Aluno.show')->middleware('auth');
Route::get('/aluno/teste', [AlunoController::class, 'teste'])->name('aluno.teste')->middleware('auth');


Route::get('/Categoria', [CategoriaController::class, 'index'])->name('Categoria.index')->middleware('auth');
Route::get('/Categoria/create', [CategoriaController::class, 'create'])->name('Categoria.create')->middleware('auth');
Route::post('/Categoria/create', [CategoriaController::class, 'store'])->name('Categoria.store')->middleware('auth');
Route::get('/Categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('Categoria.edit')->middleware('auth');
Route::post('/Categoria/update/{id}', [CategoriaController::class, 'update'])->name('Categoria.update')->middleware('auth');
Route::get('/Categoria/delete/{id}', [CategoriaController::class, 'delete'])->name('Categoria.delete')->middleware('auth');
Route::get('/categoria/teste', [CategoriaController::class, 'teste'])->name('categoria.teste')->middleware('auth');

Route::get('/Exercicio', [ExercicioController::class, 'index'])->name('Exercicio.index')->middleware('auth');
Route::get('/Exercicio/create', [ExercicioController::class, 'create'])->name('Exercicio.create')->middleware('auth');
Route::post('/Exercicio/create', [ExercicioController::class, 'store'])->name('Exercicio.store')->middleware('auth');
Route::get('/Exercicio/edit/{id}', [ExercicioController::class, 'edit'])->name('Exercicio.edit')->middleware('auth');
Route::post('/Exercicio/update/{id}', [ExercicioController::class, 'update'])->name('Exercicio.update')->middleware('auth');
Route::get('/Exercicio/delete/{id}', [ExercicioController::class, 'delete'])->name('Exercicio.delete')->middleware('auth');
Route::get('/exercicio/teste', [ExercicioController::class, 'teste'])->name('exercicio.teste')->middleware('auth');

Route::get('/Ficha', [FichaController::class, 'index'])->name('Ficha.index')->middleware('auth');
Route::get('/Ficha/create', [FichaController::class, 'create'])->name('Ficha.create')->middleware('auth');
Route::post('/Ficha/create', [FichaController::class, 'store'])->name('Ficha.store')->middleware('auth');
Route::get('/Ficha/edit/{id}', [FichaController::class, 'edit'])->name('Ficha.edit')->middleware('auth');
Route::post('/Ficha/update/{id}', [FichaController::class, 'update'])->name('Ficha.update')->middleware('auth');
Route::get('/Ficha/delete/{id}', [FichaController::class, 'delete'])->name('Ficha.delete')->middleware('auth');
Route::get('/ficha/teste', [FichaController::class, 'teste'])->name('ficha.teste')->middleware('auth');


Route::get('/Instrutor/create', [InstrutorController::class, 'create'])->name('Instrutor.create')->middleware('auth');
Route::post('/Instrutor/create', [InstrutorController::class, 'store'])->name('Instrutor.store')->middleware('auth');
Route::get('/Instrutor/edit/{id}', [InstrutorController::class, 'edit'])->name('Instrutor.edit')->middleware('auth');
Route::put('/Instrutor/update/{id}', [InstrutorController::class, 'update'])->name('Instrutor.update')->middleware('auth');
Route::get('/Instrutor/delete/{id}', [InstrutorController::class, 'delete'])->name('Instrutor.delete')->middleware('auth');
Route::get('/instrutor/teste', [InstrutorController::class, 'teste'])->name('instrutor.teste')->middleware('auth');

//TESTE

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/Instrutor', [InstrutorController::class, 'index'])->name('Instrutor.index');
        Route::get('/Instrutor/assign', [InstrutorController::class, 'assign'])->name('Instrutor.assign');
        Route::get('/Instrutor/assign/{id}', [InstrutorController::class, 'assignUser'])->name('Instrutor.assignUser');
    });

    Route::middleware(['instrutor'])->group(function () {
        Route::get('/Aluno', [AlunoController::class, 'index'])->name('Aluno.index');
    });
});






