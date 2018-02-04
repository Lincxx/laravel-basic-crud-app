<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos')->with('todos', $todos);
    } 
    
    
    public function store(Request $request){
        //dd($request->todo);

        $todo = new Todo;

        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->back();
    }

    public function delete($id){
        //find a todo to delete
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back();
    }

    public function update($id){
        //find a todo to update
        $todo = Todo::find($id);
      
        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id) {
        //dd($request->all());
        $todo = Todo::find($id);

        $todo->todo = $request->todo;
        $todo->save();
        return redirect()->route('todos');
    }

    public function completed($id){
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();
        return redirect()->back();
    }
}
