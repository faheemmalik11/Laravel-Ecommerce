<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Cookie;


class UserController extends Controller
{
    public function index(){
        $users = User::all()->except(auth()->user()->id);;
        return view('user.index',compact('users'));
    }
    public function register(){
        return view('user.register');
    }
    public function show(User $user){
        $this->authorize('view',$user);
        return view('user.profile',compact('user'));
    }

    public function create(){
        
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'min:6|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'min:6',
            'role_id' => 'required','integer',
   
        ]);

         unset($inputs['confirm-password']);
         $localImagePath = '/home/zubair/Downloads/no_image.jpg';

                $destinationPath = 'users/images';

                $filename = uniqid() . '.jpg';

                Storage::putFileAs($destinationPath, $localImagePath, $filename);

                $inputs['product_image'] = $destinationPath . '/' . $filename;
        $user =  User::create($inputs);
        $user->cart()->create();
         request()->session()->flash('message-user-created', 'User created successfully!');
        
         return redirect()->back();
    }

    public function update(User $user){
     
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'min:6|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'min:6'
   
        ]);

        if(request('profile_image')){
            $inputs['profile_image'] = request('profile_image')->store('users/images');
        }
         unset($inputs['confirm-password']);
         $user->update($inputs);
         if( $user->id == auth()->user()->id){

                setcookie('credentials', '', time() - 3600, '/');
                $credentials = request()->only('email', 'password');
                $credentials = json_encode($credentials);
                setcookie('credentials', $credentials, time() + 24*60*60, '/');
    }

         
        

         request()->session()->flash('message-user-updated', 'User updated successfully!');
        
         return redirect()->back();
    }

    public function delete(User $user){
        $user->delete();
        request()->session()->flash('message-user-deleted', 'User deleted successfully!');
        return redirect()->back();
    }

    public function dashboard(){
        return view('user.dashboard');
    }


    

}
