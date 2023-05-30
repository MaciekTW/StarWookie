<?php

namespace App\Http\Controllers;
use App\Rules\IsPasswordDiffrent;
use App\Rules\IsPasswordCorrect;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.changePassword');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required',new IsPasswordCorrect()],
            'new_password' => ['required', new IsPasswordDiffrent(),
                Rules\Password::min(6)->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
            'new_confirm_password' => ['same:new_password'],
        ]);



        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect("/dashboard");

    }
}
