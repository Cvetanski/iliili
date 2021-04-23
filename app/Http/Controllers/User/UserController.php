<?php


namespace App\Http\Controllers\User;


use App\Events\User\UserWasRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('user.login_register');
    }

    public function register(Request $request)
    {
//        $this->validate($request,[
//            'name'=>'required|string|max:255',
//            'surname'=>'required|string|max::255',
//            'email'=>'required|string|email|unique:users,email',
//            'password'=>'required|min:8|confirmed',
//        ]);
//        $input_data=$request->all();
//        $input_data['password']=Hash::make($input_data['password']);
//        User::create($input_data);

        $request->validate([
            'name' => 'required|string|max:255',
            'surname'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'surname'=>$request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new UserWasRegistered($user));

        return redirect('login-page')->with('message','Успешно се регистриравте!');
    }

    public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/');
        }else{
            return back()->with('message','Внесовте погрешна адреса или лозинка, ве молиме обидете се повторно !');
        }
    }

    public function userAccount()
    {
        $profile=Auth()->user();

        return view('user.account')->with('profile',$profile);
    }
}
