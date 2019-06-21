<?php

namespace App\Http\Controllers;

use App\Resourceable;
 
class ResourceableAPIController extends Controller
{
    public function index()
    {
        return Resourceable::all();
    }
 
    public function show($id)
    {
        return Resourceable::with(['resource'])->find($id);
    }

    public function store(Request $request)
    {
        return Resourceable::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $resourceable = Resourceable::findOrFail($id);
        $resourceable->update($request->all());

        return $resourceable;
    }

    public function delete(Request $request, $id)
    {
        $resourceable = Resourceable::findOrFail($id);
        $resourceable->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
