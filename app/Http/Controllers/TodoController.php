<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //$todos = Todo::all();
            $todos =Todo::orderBy('created_at', 'desc')->get();
            return view('todo.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(),[
            'Item' => 'required',
            'Description' => 'required',
            'Duedate' => 'required'
        ]);
        if ($validateData->fails())
        {
            return redirect()->back()->withErrors($validateData->errors())->withInput();
        }


        //create todo
        $todo = new Todo;
        $todo->Item = $request->input('Item');
        $todo->Description = $request->input('Description');
        $todo->Duedate = $request->input('Duedate');
        $todo->save();

        return redirect('/')->with('success', 'Todo Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = Validator::make($request->all(),[
            'Item' => 'required',
            'Description' => 'required',
            'Duedate' => 'required'
        ]);
        if ($validateData->fails())
        {
            return redirect()->back()->withErrors($validateData->errors())->withInput();
        }


        //create todo
        $todo = Todo::find($id);
        $todo->Item = $request->input('Item');
        $todo->Description = $request->input('Description');
        $todo->Duedate = $request->input('Duedate');
        $todo->save();

        return redirect('/')->with('success', 'Todo Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/')->with('success', 'Todo Deleted');
    }
}