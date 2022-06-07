<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //post method to create a new task
        error_log($request->titulo);
        $task = new Task;
        $task->titulo = $request->titulo;
        $task->descripcion = $request->descripcion;
        $task->estado = $request->estado;
        $task->prioridad = $request->prioridad;
        $task->user_id = $request->usuario;
        $task->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get method to show all tasks by user id
        $tasks = Task::where('user_id', $id)->get();
        return $tasks;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
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
        // post method to edit a task
        //error_log($request);
        $task = Task::find($id);
        //error_log($task);
        $task->titulo = $request->titulo;
        $task->descripcion = $request->descripcion;
        $task->estado = $request->estado;
        $task->prioridad = $request->prioridad;
        $task->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // post method to delete a task
       // error_log($id);
        $task = Task::find($id);
        $task->delete();
    }
}
