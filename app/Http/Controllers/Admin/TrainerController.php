<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TrainerRequest;

class TrainerController extends Controller
{
  public function __construct(private Trainer $trainer){}
 
  public function index()
  {
    try{
      $records = $this->trainer
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.trainers.index')
         ->with('records', $records);

      return $view;
    }
    catch(\Exception $e){
     
    }
  }

  public function create()
  {
   try {
      if (request()->ajax()) {
        return response()->json([
        ], 200);
      }
    } catch (\Exception $e) {
      return response()->json([
        'message' =>  \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function store(TrainerRequest $request)
  {  
    try{

     $data = $request->validated();

      unset($data['password_confirmation']);
     
      if (!$request->filled('password') && $request->filled('id')){
        unset($data['password']);
      }

      $this->trainer->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      return response()->json([
        'message' =>  $request->input('id') ? \Lang::get('admin/notification.updated') : \Lang::get('admin/notification.created'),
      ], 201);
    }catch(\Exception $e){
      return response()->json([
        'error' => $e->getMessage(),
      ], 422);
    }    
  }

  public function edit(Trainer $trainer)
  {
    return response()->json([
      'element' => $trainer,
    ], 200);
  }

  public function destroy(Trainer $trainer)
  {
    try{
      $trainer->delete();
     
      return response()->json([
        'message' =>  \Lang::get('admin/notification.deleted'),
      ], 200);
    }catch(\Exception $e){
      return response()->json([
        'error' => $e->getMessage(),
      ], 500);
    }
  }
}