<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/usuarios', function () {
//     return view('admin-usuarios');
// });

Route::group(['prefix' => 'admin'], function () {
  Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController', [
    'parameters' => [
      'usuarios' => 'user',
    ],
    'names' => [
      'index' => 'users',
      'create' => 'users_create',
      'edit' => 'users_edit',
      'store' => 'users_store',
      'destroy' => 'users_destroy',
    ]
  ]);
});

Route::group(['prefix' => 'admin'], function () {
  Route::resource('entrenadores', 'App\Http\Controllers\Admin\TrainerController', [
    'parameters' => [
      'entrenadores' => 'trainer',
    ],
    'names' => [
      'index' => 'trainers',
      'create' => 'trainers_create',
      'edit' => 'trainers_edit',
      'store' => 'trainers_store',
      'destroy' => 'trainers_destroy',
    ]
  ]);
});

Route::group(['prefix' => 'admin'], function () {
  Route::resource('clientes', 'App\Http\Controllers\Admin\CustomerController', [
    'parameters' => [
      'clientes' => 'customer',
    ],
    'names' => [
      'index' => 'customers',
      'create' => 'customers_create',
      'edit' => 'customers_edit',
      'store' => 'customers_store',
      'destroy' => 'customers_destroy',
    ]
  ]);
});

Route::group(['prefix' => 'admin'], function () {
  Route::resource('ejercicios', 'App\Http\Controllers\Admin\ExerciseController', [
    'parameters' => [
      'ejercicios' => 'exercise',
    ],
    'names' => [
      'index' => 'exercises',
      'create' => 'exercises_create',
      'edit' => 'exercises_edit',
      'store' => 'exercises_store',
      'destroy' => 'exercises_destroy',
    ]
  ]);
}); 

Route::group(['prefix' => 'admin'], function () {
  Route::resource('musculos', 'App\Http\Controllers\Admin\MuscleController', [
    'parameters' => [
      'musculos' => 'muscle',
    ],
    'names' => [
      'index' => 'muscles',
      'create' => 'muscles_create',
      'edit' => 'muscles_edit',
      'store' => 'muscles_store',
      'destroy' => 'muscles_destroy',
    ]
  ]);
}); 

Route::group(['prefix' => 'admin'], function () {
  Route::resource('materiales', 'App\Http\Controllers\Admin\MaterialController', [
    'parameters' => [
      'materiales' => 'material',
    ],
    'names' => [
      'index' => 'materials',
      'create' => 'materials_create',
      'edit' => 'materials_edit',
      'store' => 'materials_store',
      'destroy' => 'materials_destroy',
    ]
  ]);
}); 

Route::group(['prefix' => 'admin'], function () {
  Route::resource('parques', 'App\Http\Controllers\Admin\ParkController', [
    'parameters' => [
      'parques' => 'park',
    ],
    'names' => [
      'index' => 'parks',
      'create' => 'parks_create',
      'edit' => 'parks_edit',
      'store' => 'parks_store',
      'destroy' => 'parks_destroy',
    ]
  ]);
}); 