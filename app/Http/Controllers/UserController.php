<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class UserController extends Controller
{
    public function show(User $user){
        return view('user.profile',compact('user'));
    }

    public function update(User $user){
     
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile_image' => ['file','required'],
            'password' => 'min:6|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'min:6'
   
        ]);

         $inputs['profile_image'] = request('profile_image')->store('images');

         unset($inputs['confirm-password']);
         $user->update($inputs);
        setcookie('credentials', '', time() - 3600, '/');
         $credentials = request()->only('email', 'password');
         $credentials = json_encode($credentials);
        setcookie('credentials', $credentials, time() + 24*60*60, '/');

         
        

         request()->session()->flash('message-user-updated', 'User updated successfully!');
        
         return redirect()->back();
    }
}
