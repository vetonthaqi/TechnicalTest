 <?php

class UserController extends BaseController
{
	public function getCreate()
	{
		return View::make('user.register');
	}

	public function getLogin()
	{
		return View::make('user.login');
	}

	public function postCreate()
	{
		$validate = Validator::make(Input::all(), array(
			'client_name' => 'required|unique:users',
			'username' => 'required|unique:users|min:4',
			'pass1' => 'required|min:6',
			'pass2' => 'required|same:pass1',
			'address' => 'required',
			'email' => 'required',
		));

		if($validate->fails())
		{
			return Redirect::route('getCreate')->withErrors($validate)->withInput();
		}
		else
		{
			$user = new User();
			$user->client_name = Input::get('client_name');
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('pass1'));
			$user->address = Input::get('address');
			$user->email = Input::get('email');

			if($user->save())
			{
				return Redirect::route('home')->with('success', 'You registered successfully. You can now login.');
			}
			else
			{
				return Redirect::route('home')->with('fail', 'An error occured while creating new user. Please try again.');	
			}
		}
	}

	public function postLogin()
	{
		$validator = Validator::make(Input::all(), array(
			'username' => 'required',
			'pass1' => 'required'
		));	

		if($validator->fails())
		{
			return Redirect::route('getLogin')->withErrors($validator)->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('pass1')
			), $remember);

			if($auth)
			{
				return Redirect::intended('/');
			}
			else
			{
				return Redirect::route('getLogin')->with('fail', 'You entered wrong username or password.');
			}
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('home');
	}
}