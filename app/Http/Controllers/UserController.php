<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeJobMail;
use App\Mail\WelcomeUserMail;
use App\Models\Maladie;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    public function allUsersPage(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $profiles = UserProfile::query()
            ->where('full_name', 'LIKE', "%{$search}%")
            ->orWhere('mobile_phone', 'LIKE', "%{$search}%")
            ->with("user")
            ->paginate(20);
        return view('dashboard.users.users', ['users' => $profiles]);
    }

    public function show($id)
    {
        return view('dashboard.users.id', ['user' => User::with('profile')->with('carnets')->with('maladies')->find($id), 'maladies' => Maladie::all()]);
    }

    public function createUserPage()
    {
        return view('dashboard.users.create');
    }


    public function editUserPage($id)
    {
        return view('dashboard.users.update', ['user' => User::with('profile')->with('maladies')->find($id), "maladies" => Maladie::all()]);
    }

    public function createUser(Request $request)
    {
        //return dd($request->all());
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email|unique:users', // make sure the email is an actual email
            'password' => 'required|min:3', // password can only be alphanumeric and has to be greater than 3 characters
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_phone' => 'required|min:13|max:13|unique:user_profiles',
            'city' => 'required',
            'gender' => 'required',
            'role' => 'required'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {

            if (!$request->acceptsHtml()) {
                return response()->json($validator, 401);
            }
            return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => $request->get('email'),
                'role'     => $request->get('role'),
                'password'  => Hash::make($request->get('password')),
            );

            // attempt to create a user

            $user = User::create($userdata);


            $user->profile()->create($request->only(["first_name", 'last_name', 'city', 'mobile_phone', 'gender', 'birthday']));


            if (!$request->acceptsHtml()) {

                //
                return response()->json(['data' => $user->toArray()], 201);
            }


            SendWelcomeJobMail::dispatch($user);
            return redirect()->back()->with('message', 'Utlisateur a été creé');
        }
    }


    public function update(Request $request, $id)
    {
        //return dd($request->all());
        // validate the info, create rules for the inputs
        $rules = array(
            // password can only be alphanumeric and has to be greater than 3 characters
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_phone' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'role' => 'required'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {

            if (!$request->acceptsHtml()) {
                return response()->json($validator, 401);
            }
            return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {



            // attempt to create a user

            $user = User::find($id);
            $user->role = $request->get('role');
            $user->save();
            $profile = $user->profile();
            $profile->update($request->only(["first_name", 'last_name', 'city', 'mobile_phone', 'gender', 'birthday']));

            if (!$request->acceptsHtml()) {

                //
                return response()->json(['data' => $user->toArray()], 201);
            }



            return redirect()->back()->with('message', 'Utlisateur a été modifié avec succes');
        }
    }

    public function setMaladie(Request $request, $id)
    {
        $rules = array(

            'maladies' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );


        // return response()->json($request->all(), 200);
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator, 401);
        }
        $user = User::with('maladies')->find($id);
        $user->maladies()->sync(request()->get('maladies'));

        return response()->json(['data' => $user]);
    }

    public function setPassword(Request $request, $id)
    {
        //return dd($request->all());
        // validate the info, create rules for the inputs
        $rules = array(

            'password' => 'required',


        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {

            if (!$request->acceptsHtml()) {
                return response()->json($validator, 401);
            }
            return redirect()->back()
                ->withErrors($validator);
        } else {



            // attempt to create a user

            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->save();

            if (!$request->acceptsHtml()) {

                //
                return response()->json(['data' => $user->toArray()], 201);
            }



            return redirect()->back()->with('message', 'Mot de passe modifié');
        }
    }
}
