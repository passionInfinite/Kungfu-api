<?php

namespace KungFu\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use KungFu\Response;
use KungFu\Sale;
use KungFu\Student;

class SalesController extends Controller
{
    public function create(Request $request) {

        $this->validate($request, [
            'type' => 'required|'.Rule::in(Sale::getTypes()),
            'message' => 'string',
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric'
        ]);

        $student = Student::query()->findOrFail($request->get('student_id'));

        $sale = new Sale();
        $fillables = array_keys($request->only(['type', 'student_id', 'amount']));
        foreach ($fillables as $fillable) {
            if ($request->has($fillable)) {
                $sale->setAttribute($fillable, $request->get($fillable));
            }
        }
        if ($request->has('message')) {
            $sale->message = $request->get('message');
        }
        $sale->date = Carbon::now();
        $sale->save();
        $sale->student()->associate($student);
        $sale->save();

        return Response::raw(201, $sale);
    }

    public function read(Request $request, $id) {
        $student = Student::query()->with('sales')->findOrFail($id);
        return Response::raw(200, $student);
    }

    public function readAll(Request $request) {
        $sales = Sale::query()->with('student')->get();
        return Response::raw(200, $sales);
    }

    public function readById(Request $request, $id) {
        $sale = Sale::query()->with('student')->findOrFail($id);
        return Response::raw(200, $sale);
    }

    public function delete(Request $request, $id) {
        $sale = Sale::query()->findOrFail($id);
        $sale->delete();
        return Response::raw(200, []);
    }
}
