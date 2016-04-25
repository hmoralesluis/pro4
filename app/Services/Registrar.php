<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}


	public function validate_update(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|',
		]);
	}

    public function validate_password(array $data)
    {
        return Validator::make($data,[
            'password_1' => 'required_with:password',
             crypt('password_1') => 'exists:users,password,email,'.$data['email'],
            'password' => 'required_with:password_1|confirmed|min:6',
        ]);
    }

    public function update_password(array $data, User $user)
    {
        $user->password = crypt($data['password']);
        return $user->save();
    }

	public function update(array $data, User $user)
	{
		$user->name = $data['name'];
		$user->email = $data['email'];


		return $user->save();
	}

}
