<?php

namespace KungFu\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use KungFu\Progress;
use KungFu\Rank;
use KungFu\Response;
use KungFu\Student;

class ProgressController extends Controller
{
    public function create(Request $request) {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'to_rank_id' => 'required|exists:ranks,id'
        ]);

        $student = Student::query()->findOrFail($request->get('student_id'));
        $currentRank = $student->rank;
        $toRank = Rank::query()->findOrFail($request->get('to_rank_id'));

        if ($toRank->id > $currentRank->id) {
            $progress = new Progress();
            $progress->date = Carbon::now()->toDateString();
            $progress->fromRank()->associate($currentRank);
            $progress->toRank()->associate($toRank);
            $progress->student()->associate($student);
            $progress->save();

            $student->rank()->associate($toRank);
            $student->save();
            return Response::raw(201, $progress);
        } else {
            return Response::raw(200, ['message' => 'Next rank should be greater than current rank!']);
        }
    }

    public function read(Request $request, $id) {
        $progress = Progress::query()->with(['toRank', 'fromRank', 'student'])->findOrFail($id);
        return Response::raw(200, $progress);
    }

    public function readAll(Request $request) {
        $progresses = Progress::query()->with(['toRank', 'fromRank', 'student'])->get();
        return Response::raw(200, $progresses);
    }

    public function update(Request $request, $id) {
        $progress = Progress::query()->findOrFail($id);

        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'to_rank_id' => 'required|exists:progresses,to_rank_id',
            'from_rank_id' => 'required|exists:progresses,from_rank_id',
            'date' => 'required|date|date_format:m-d-Y'
        ]);

        $student = Student::query()->findOrFail($request->get('student_id'));
        $toRank = Rank::query()->findOrFail($request->get('to_rank_id'));

        $progress->update($request->only(['student_id', 'from_rank_id', 'to_rank_id']));
        $progress->date = Carbon::parse($request->get('date'))->toDateString();
        $progress->save();

        $student->rank()->associate($toRank);
        $student->save();

        return Response::raw(200, $progress);
    }

    public function delete(Request $request, $id) {
        $progress = Progress::query()->findOrFail($id);
        $previousRank = $progress->fromRank;

        $student = $progress->student;
        $student->rank()->associate($previousRank);
        $student->save();
        $progress->delete();

        return Response::raw(200, []);
    }
}
