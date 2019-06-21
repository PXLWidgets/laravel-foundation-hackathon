<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\AbstractUser;
use Laravel\Socialite\Two\InvalidStateException;

class GithubController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $github_user = Socialite::driver('github')->user();
        } catch (InvalidStateException $exception) {
            return redirect()->route('login_by_github');
        } catch (ClientException $exception) {
            return redirect()->route('login_by_github');
        }

        $user = User::where('github_id', $github_user['id'])->first();

        if (! $user) {
            $user = $this->create($github_user);
        }

        Auth::login($user);
        return redirect()->route('homepage');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(AbstractUser $data)
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'avatar_url' => $data->avatar,
            'github_access_token' => $data->token,
            'github_id' => $data->id,
            'github_username' => $data->nickname,
            'password' => Hash::make(uniqid()),
        ]);
    }

    protected function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
