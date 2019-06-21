<?php

namespace App\Http\Controllers;

use App\Certificate;
 
class CertificateAPIController extends Controller
{
    public function index()
    {
        return Certificate::all();
    }
 
    public function show($id)
    {
        return Certificate::with(['course', 'users'])->find($id);
    }

    public function store(Request $request)
    {
        return Certificate::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->update($request->all());

        return $certificate;
    }

    public function delete(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
