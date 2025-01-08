<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $superadmin=User::where('admin_role','superadmin')->get();

        if($superadmin==null){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'admin_role' =>'superadmin',
                'password' => Hash::make($request->password),
           ]);
           event(new Registered($user));
           Auth::login($user);
           return redirect('Login/log');
        }

       if($superadmin!='superadmin'){
                toastr()->warning('Already Super Admin Exist');
                return redirect()->back();
        }
            else{
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'admin_role' =>$request->admin_role,
                    'password' => Hash::make($request->password),
               ]);

               event(new Registered($user));
               Auth::login($user);

               return redirect('Login/log');
            }

        }

}

