<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return response()->json($times);
    }

    public function show($id)
    {
        $time = Time::find($id);
        return response()->json($time);
    }

    public function store(Request $request)
    {
        $time = Time::create($request->all());
        return response()->json($time, 201);
    }

    public function update(Request $request, $id)
    {
        $time = Time::findOrFail($id);
        $time->update($request->all());
        return response()->json($time, 200);
    }

    public function destroy($id)
    {
        $time = Time::findOrFail($id);
        $time->delete();
        return response()->json(null, 204);
    }
}
