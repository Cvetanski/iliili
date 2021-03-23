<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.login');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'surname'=>'required|string|max::255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $input_data=$request->all();
        $input_data['password']=Hash::make($input_data['password']);
        User::create($input_data);
        return back()->with('message','Registered already!');
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



}