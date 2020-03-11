<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Override to method showRegistrationForm to show provinces to user
     *
     * @return void
     */
    public function showRegistrationForm()
    {
        $provinces = DB::table('provinces')->get();
        return view('/auth/register', compact('provinces'));
    }

    /**
     * Load the canton dropdown menu
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loadCanton(Request $request)
    {
        $cantons = DB::table('cantons')->where('prov', $request->province)->pluck('name', 'id');
        return response()->json($cantons);
    }

     /**
     * Load the district dropdown menu
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loadDistrict(Request $request)
    {
        $districts = DB::table('districts')->where('canton', $request->canton)->pluck('name', 'id');
        return response()->json($districts);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'lastName1' => $data['lastName1'],
            'lastName2' => $data['lastName2'],
            'province' => $data['province'],
            'canton' => $data['canton'],
            'district' => $data['district'],
            'address1' => $data['address1'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'id' => 'required|integer|digits:9|unique:users',
            'name' => 'required|string|max:190',
            'lastName1' => 'required|string|max:190',
            'lastName2' => 'required|string|max:190',
            'province' => 'required|gte:1|lte:7',
            'canton' => 'required|gte:1|lte:82',
            'district' => 'required|gte:1|lte:484',
            'address1' => 'required|string|max:190|min:10',
            'phone' => 'required|integer|digits:8',
            'email' => 'required|string|email|max:190|unique:users|confirmed',
            'email_confirmation' => 'required|string|email|max:190|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8'
        ]);

        if ($validData->passes()){
            event(new Registered($user = $this->create($request->all())));
            $rowData = DB::table('users')->where('email','=',$request->email)->get('id');
            if($rowData->isNotEmpty())
                return response()->json(['success'=> 'Data saved']);
            else
                return response()->json(['error'=> 'Data could not be saved']);
        }
        else {
            return response()->json(['error'=>$validData->errors()->all()]);
        }
    }
}
