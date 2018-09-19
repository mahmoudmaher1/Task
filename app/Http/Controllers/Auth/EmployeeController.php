<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    protected $redirectTo = '/employee';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:Employee Page']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Employee::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'company' => $data['company'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => $data['image'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
