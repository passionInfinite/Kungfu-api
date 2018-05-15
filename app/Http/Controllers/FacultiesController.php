<?php

namespace KungFu\Http\Controllers;

use Illuminate\Http\Request;
use KungFu\Faculty;
use KungFu\Response;

class FacultiesController extends Controller
{
    public function readAll(Request $request) {
        $faculties = Faculty::query()->get();
        return Response::raw(200, $faculties);
    }

    public function read(Request $request, $id) {
        $faculty = Faculty::query()->findOrFail($id);
        return Response::raw(200, $faculty);
    }

    public function update(Request $request, $id) {
        $faculty = Faculty::query()->findOrFail($id);

        $this->validate($request, [
            'name' => 'string',
            'password' => 'string'
        ]);

        if ($request->has('password')) {
            $faculty->update(['password' => bcrypt($request->get('password'))]);
        }

        if ($request->has('name')) {
            $faculty->update(['name' => $request->get('name')]);
        }

        return Response::raw(200, $faculty);
    }

    public function delete(Request $request, $id) {
        $faculty = Faculty::query()->findOrFail($id);
        $faculty->delete();
        return Response::raw(200, []);
    }
}
