<?php

namespace App\Http\Controllers\Auth;

use App\Models\Level;
use App\Models\Student;
use App\Repositories\SchoolClassRepository;
use App\Repositories\StudentRepository;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Ramsey\Uuid\Uuid;

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
    protected $redirectTo = '/class/list';

	private $student;

	/**
	 * Create a new controller instance.
	 *
	 * @param StudentRepository $student
	 */
    public function __construct(StudentRepository $student)
    {
    	$this->student = $student;
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'role' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
        $user = User::create([
            'id' => Uuid::uuid1(),
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'student',
            'level_id' => $data['level_id'],
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {
        	$newData = [
        		'user_id' => $user->id,
		        'level_id' => $data['level_id']
	        ];

        	$this->student->fillAndSave($newData);

        	return $user;
        }
    }

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showRegistrationForm()
	{
		$data['levels'] = Level::all();
		return view('auth.register', $data);
	}
}
