<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends  Controller
{
    public function adminProfile()
    {
        return view('/admin.admin_profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function update($id, User $request)
    {
        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->surname = $request->get('surname');
        $user->password = $request->get('password');

        $user->save();

        return Redirect::route('admin.dashboard', [$user->id])->with('message', 'Вашите податоци се ажурирани!');
    }

    public function newPassword(Request $request)
    {
        $loggedUser = Auth::user();
        $currentPassword = $request->get('currentPassword');
        if(!md5($currentPassword,$loggedUser->password)){
            return back()->with('error', 'Вашата тековна лозинка е погрешна!!!');
        }

        $user = Auth::user();
        $user->password = Hash::make( $request->get('newPassword'));
        $user->save();
        return redirect::to('dashboard')->with('message', 'Лозинката е успешно променета!!!');
    }
}
