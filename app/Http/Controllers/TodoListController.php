<?php

namespace App\Http\Controllers;

use App\Http\Resources\Todo\TodoShowResource;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = TodoShowResource::collection(TodoList::latest()->get());
        return inertia('MainPage', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $item = new TodoList();
        $item->name = $request->name;
        $item->priority = $request->priority;
        $item->save();

        return to_route('item');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        $item = new TodoList();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = TodoList::find($id);
        if($item){
            $item->completed = $request->item['completed'] ? true : false;
            $item->completed_at = $request->item['completed'] ? now() : null;
            $item->priority = $request->item['priority'] ? $request->item['priority'] :  $request->item['priority'];
            $item->save();
            session()->flash('message', "Record Entered Successfully");
            return to_route('item');
        }
        else{
            return to_route('item');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingItem = TodoList::find($id);
        if($existingItem){
            $existingItem->delete();
            return to_route('item');
        }
        else{
            return to_route('item');
        }
    }
}
