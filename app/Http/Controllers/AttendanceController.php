<?php

namespace KungFu\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use KungFu\Attendance;
use KungFu\Batch;
use KungFu\Response;
use KungFu\Student;

class AttendanceController extends Controller
{
    public function create(Request $request) {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'batch_id' => 'required|exists:batches,id'
        ]);

        $attendance = Attendance::query()->where('date', Carbon::today()->toDateString())
            ->where('student_id', '=', $request->get('student_id'));

        if (!$attendance->exists()) {
            $student = Student::query()->findOrFail($request->get('student_id'));
            $batch = Batch::query()->findOrFail($request->get('batch_id'));

            $attendance = new Attendance();
            $attendance->date = Carbon::now()->toDateString();
            $attendance->student()->associate($student);
            $attendance->batch()->associate($batch);
            $attendance->save();

            return Response::raw(201, $attendance);
        } else {
            return Response::raw(422, [
                'message' => "You have already attended today's lecture"
            ]);
        }
    }

    public function read(Request $request, $id) {
        $attendance = Attendance::query()->with(['batch', 'student'])->findOrFail($id);
        return Response::raw(200, $attendance);
    }

    public function readAll(Request $request) {
        $attendances = Attendance::query()->with(['batch', 'student'])->get();
        return Response::raw(200, $attendances);
    }

    public function update(Request $request, $id) {
        $attendance = Attendance::query()->findOrFail($id);

        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'batch_id' => 'required|exists:batches,id',
            'date' => 'required|date|date_format:m-d-Y'
        ]);

        $attendance = Attendance::query()
            ->where('date', Carbon::parse($request->get('date'))->toDateString())
            ->where('student_id', '=', $request->get('student_id'));

        if (!$attendance->exists()) {
            return Response::raw(422, [
                'message' => "Attendance doesn't exists!"
            ]);
        } else {
            $attendance->update($request->only(['student_id', 'batch_id']));
            $attendance->date = Carbon::parse($request->get('date'))->toDateString();
            $attendance->save();
        }
        return Response::raw(200, $attendance);
    }

    public function delete(Request $request, $id) {
        $attendance = Attendance::query()->findOrFail($id);
        $attendance->delete();
        return Response::raw(200, []);
    }
}
