<?php

namespace KungFu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use KungFu\AccessTokenHelper;
use KungFu\Faculty;
use KungFu\Response;

class AuthenticationController extends Controller
{
    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|max:255|exists:faculties,email',
            'password' => 'required|min:5'
        ]);

        $faculty = Faculty::query()->where('email', $request->email)->firstOrFail();

        if (Hash::check($request->password, $faculty->password)) {
            return Response::raw(200, ['accessToken' => AccessTokenHelper::build()->generateAccessToken($faculty)]);
        } else {
            return Response::errors(422, [
                'email' => 'check your email',
                'password' => 'check your password'
            ]);
        }
    }

    public function register(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|unique:faculties,email',
            'password' => 'required|min:5',
            'name' => 'required|string',
        ]);

        $faculty = new Faculty();
        $fillables = array_keys($request->only(['name', 'email']));

        foreach ($fillables as $fillable) {
            if ($request->has($fillable)) {
                $faculty->setAttribute($fillable, $request->get($fillable));
            }
        }
        $faculty->password = bcrypt($request->get('password'));
        $faculty->save();

        return Response::raw(201, $faculty);
    }
}
