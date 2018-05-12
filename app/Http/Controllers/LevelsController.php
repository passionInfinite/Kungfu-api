<?php

namespace KungFu\Http\Controllers;

use Illuminate\Http\Request;
use KungFu\Level;
use KungFu\Response;

class LevelsController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request, [
            'type' => 'required|string|unique:levels,type'
        ]);

        $level = new Level();
        $level->type = $request->get('type');
        $level->save();

        return Response::raw(201, $level);
    }

    public function read(Request $request, $id)
    {
        $level = Level::query()->findOrFail($id);
        return Response::raw(200, $level);
    }

    public function readAll(Request $request)
    {
        $levels = Level::query()->get();
        return Response::raw(200, $levels);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'string|unique:levels,type'
        ]);

        $level = Level::query()->findOrFail($id);
        $level->update($request->only(['type']));
        return Response::raw(200, $level);
    }

    public function delete(Request $request, $id)
    {
        $level = Level::query()->findOrFail($id);
        $level->delete();
        return Response::raw(200, []);
    }
}
