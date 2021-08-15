<?php


namespace App\Http\Controllers;
use App\TodoItem;
use Illuminate\Http\Request;



class TodoItemsController extends Controller
{
    //private $sucess_status = 200;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function index()
     {
     
       $todoItems = TodoItem::all();
       if(count($todoItems) > 0) {
        return response()->json( $todoItems);
    }

    else {
        return response()->json(["status" => 404, "success" => false, "message" => "Whoops! no todoItems found"]);
    }
      
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
        //return response()->json($todoItem);

        if(!is_null($todoItem)) {
            return response()->json( $todoItem);
        }

        else {
            return response()->json(["status" => 404, "success" => false, "message" => "Whoops! no todoItem found"]);
        }
     }

     public function update(Request $request, $id)
     { 
        $todoItem= TodoItem::find($id);

        if(!is_null($todoItem)) {

            $todoItem->name = $request->input('name');
            $todoItem->description = $request->input('description');
            $todoItem->save();
             return response()->json($todoItem);
         }
        else 
        {
        return response()->json(["status" => 404, "success" => false, "message" => "Whoops! no todoItem found"]);
         }  
        
    }
     

     public function destroy($id)
     {
        $todoItem = TodoItem::find($id);
        if(!is_null($todoItem)) {
            $todoItem->delete();
        return response()->json('todoItem removed successfully');
         }
        else 
        {
        return response()->json(["status" => 404, "success" => false, "message" => "Whoops! no todoItem found"]);
         }  
        
       
     }
   
}