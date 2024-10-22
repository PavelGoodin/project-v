<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    //
    public  function index() {

        //$user = User::find(1);
        $user = Auth::user();

        return view('profile',compact('user'));
    }

    public function avatarSelect(){

        return view('layouts.avatarselect');  
    }

    public function avatarSave(Request $request){

        //dd($request);
        $user = Auth::user();
        $user->avatar = 'monster-'.$request->avatar.'.png';
        $user->save();

        return view('home',compact('user'));

    }
}
