<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Muscle;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MuscleRequest;

class MuscleController extends Controller
{
  public function __construct(private Muscle $muscle){}
 
  public function index()
  {
    try{
      $records = $this->muscle
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.muscles.index')
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

  public function store(MuscleRequest $request)
  {  
    try{

     $data = $request->validated();

      $this->muscle->updateOrCreate([
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

  public function edit(Muscle $muscle)
  {
    return response()->json([
      'element' => $muscle,
    ], 200);
  }

  public function destroy(Muscle $muscle)
  {
    try{
      $muscle->delete();
     
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