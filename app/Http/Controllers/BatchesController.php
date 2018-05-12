<?php

namespace KungFu\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use KungFu\Batch;
use KungFu\Level;
use KungFu\Response;

class BatchesController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request, [
            'day' => 'required|string|'.Rule::in(array_values(Carbon::getDays())),
            'time' => 'required|date_format:H:i',
            'level_id' => 'required|exists:levels,id'
        ]);

        $level = Level::query()->findOrFail($request->get('level_id'));

        $batch = new Batch();
        $batch->day = $request->get('day');
        $batch->time = Carbon::now()->toTimeString();
        $batch->level()->associate($level);
        $batch->save();

        return Response::raw(201, $batch);
    }

    public function read(Request $request, $id)
    {
        $batch = Batch::query()->with('level')->findOrFail($id);
        return Response::raw(200, $batch);
    }

    public function readAll(Request $request)
    {
        $batches = Batch::query()->with('level')->get();
        return Response::raw(200, $batches);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'day' => 'string|'.Rule::in(array_values(Carbon::getDays())),
            'time' => 'date_format:H:i',
            'level_id' => 'exists:levels,id'
        ]);

        if ($request->has('level_id')) {
            $level = Level::query()->findOrFail($id);
        }

        $batch = Batch::query()->findOrFail($id);
        $batch->update($request->only(['day', 'time']));

        if ($request->has('level_id')) {
            $batch->level()->associate($level);
            $batch->save();
        }
        return Response::raw(200, $batch);
    }

    public function delete(Request $request, $id)
    {
        $batch = Batch::query()->findOrFail($id);
        $batch->delete();
        return Response::raw(200, []);
    }
}
