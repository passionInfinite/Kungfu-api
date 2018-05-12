<?php

namespace KungFu\Http\Controllers;

use Illuminate\Http\Request;
use KungFu\Response;
use KungFu\Student;

class StudentsController extends Controller
{
    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required|string',
            'birthday' => 'required|date',
            'mobile_no' => 'required|numeric|size:10|unique:students,mobile_no',
            'email' => 'required|email|max:255|unique:students,email',
            'address' => 'required|string',
            'parents' => 'array',
            'parents.*.name' => 'required_with:parents|string',
            'parents.*.mobile_no' => 'required_with:parents|numeric|size:10|unique:students,mobile_no',
            'parents.*.email' => 'required_with:parents|email|max:255|unique:students,email',
            'parents.*.relation' => 'required_with:parents|in:Mother,Father',
            'parents.*.enrolled' => 'required_with:parents|boolean'
        ]);

        $student = new Student();
        $fillables = $request->only(['name', 'birthday', 'mobile_no', 'email', 'address']);
        foreach ($fillables as $fillable) {
            if ($request->has($fillable)) {
                $student->setAttribute($fillable, $request->get($fillable));
            }
        }
        $student->enrolled = true;
        $student->save();

        if ($request->has('parents')) {
            $parents = $request->get('parents');
            foreach ($parents as $parent) {
                $parentStudent = new Student();
                $fillables = array_only($parent, ['name', 'mobile_no', 'email', 'relation', 'enrolled']);
                foreach ($fillables as $fillable) {
                    $parentStudent->setAttribute($fillable, $request->get($fillable));
                }
                $parentStudent->save();
                $student->parents()->attach($parentStudent->id);
                $student->save();
            }
        }

        return Response::raw(201, $student);
    }

    public function read(Request $request, $id) {
        $student = Student::query()->findOrFail($id);
        return Response::raw(200, $student);
    }

    public function readAll(Request $request) {
        $students = Student::query()->get();

        return Response::raw(200, $students);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'string',
            'birthday' => 'string|date',
            'mobile_no' => 'numeric|size:10|unique:students,mobile_no',
            'address' => 'string'
        ]);

        $student = Student::query()->findOrFail($id);
        $student->update($request->only(['name','birthday', 'mobile_no', 'address']));
        return Response::raw(200, $student);
    }

    public function delete(Request $request, $id) {
        $student = Student::query()->findOrFail($id);
        $student->delete();
        return Response::raw(200, []);
    }
}
