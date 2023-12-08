<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return array('status'=>true,'data'=>TodoResource::collection(Todo::all()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoStoreRequest $request)
    {
        $storedData = Todo::create($request->validated());
        return array('status'=>true, 'data'=>TodoResource::make($storedData));
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $todoItem = Todo::find($id);
        return array('status'=>true, 'data'=>$todoItem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoUpdateRequest $request, String $id)
    {
        $todoItem = Todo::find($id);
        $input = $request->all();

        $todoItem->update($input);
        // $todoItem->update($request->validated());
        return array('status'=>true, 'data'=>$todoItem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todoItem = Todo::find($id);
        $todoItem->delete();

        return array('status'=>true,'data'=>$todoItem);
    }

    /*
        Update the completed status only
    */
    public function updateCompleteStatus(Request $request, String $id)
    {
        $todoItem = Todo::find($id);
        $input = $request->all();

        $todoItem->update($input);
        // $todoItem->update($request->validated());
        return array('status'=>true, 'data'=>$todoItem);
    }
}
