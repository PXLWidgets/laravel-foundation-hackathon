<?php

namespace App\Http\Controllers;

use App\Resource;
 
class ResourceAPIController extends Controller
{
    public function index()
    {
        return Resource::all();
    }
 
    public function show($id)
    {
        return Resource::with(['resourceables'])->find($id);
    }

    public function store(Request $request)
    {
        return Resource::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);
        $resource->update($request->all());

        return $resource;
    }

    public function delete(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
