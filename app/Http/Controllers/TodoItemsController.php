<?php


namespace App\Http\Controllers;
use App\TodoItem;
use Illuminate\Http\Request;



class TodoItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
     public function index()
     {
     
       $todoItems = TodoItem::all();
       return response()->json($todoItems);
     }

     public function create(Request $request)
     {
       $todoItem = new TodoItem;
       $todoItem->name= $request->name;
       $todoItem->description= $request->description;
       
       $todoItem->save();
       return response()->json($todoItem);
     }

     public function show($id)
     {
        $todoItem = TodoItem::find($id);
        return response()->json($todoItem);
     }

     public function update(Request $request, $id)
     { 
        $todoItem= TodoItem::find($id);
        
        $todoItem->name = $request->input('name');
        $todoItem->description = $request->input('description');
        $todoItem->save();
        return response()->json($todoItem);
     }

     public function destroy($id)
     {
        $todoItem = TodoItem::find($id);
        $todoItem->delete();
        return response()->json('todoItem removed successfully');
     }
   
}