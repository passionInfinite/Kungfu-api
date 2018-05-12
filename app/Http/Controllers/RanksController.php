<?php

namespace KungFu\Http\Controllers;

use Illuminate\Http\Request;
use KungFu\Level;
use KungFu\Rank;
use KungFu\Response;

class RanksController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request, [
            'level_id' => 'required|exists:levels,id',
            'belt_color' => 'required|string|unique:ranks,belt_color'
        ]);

        $level = Level::query()->findOrFail($request->get('level_id'));

        $rank = new Rank();
        $rank->belt_color = $request->get('belt_color');
        $rank->level()->associate($level);
        $rank->save();

        return Response::raw(201, $rank);
    }

    public function read(Request $request, $id)
    {
        $rank = Rank::query()->with(['level'])->findOrFail($id);
        return Response::raw(200, $rank);
    }

    public function readAll(Request $request)
    {
        $ranks = Rank::query()->with(['level'])->get();
        return Response::raw(200, $ranks);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'level_id' => 'exists:levels,id',
            'belt_color' => 'string|unique:ranks,belt_color'
        ]);

        if ($request->has('level_id')) {
            $level = $level = Level::query()->findOrFail($id);
        }

        $rank = Rank::query()->findOrFail($id);
        $rank->update($request->only(['belt_color']));

        if ($request->has('level_id')) {
            $rank->level()->associate($level);
            $rank->save();
        }
        return Response::raw(200, $rank);
    }

    public function delete(Request $request, $id)
    {
        $rank = Rank::query()->findOrFail($id);
        $rank->delete();
        return Response::raw(200, []);
    }
}
