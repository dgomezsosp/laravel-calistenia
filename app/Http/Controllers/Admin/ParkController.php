<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Park;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ParkRequest;

class ParkController extends Controller
{
  public function __construct(private Park $park){}
 
  public function index()
  {
    try{
      $records = $this->park
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.parks.index')
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

  public function store(ParkRequest $request)
  {  
    try{

     $data = $request->validated();
      $this->park->updateOrCreate([
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

  public function edit(Park $park)
  {
    return response()->json([
      'element' => $park,
    ], 200);
  }

  public function destroy(Park $park)
  {
    try{
      $park->delete();
     
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