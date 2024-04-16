<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('home');
        }else{
            return redirect()->route('login')->withErrors(['message' => 'Invalid username or password']);
        }

        
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'desusername' => 'required|unique:users,username',
            'despassword' => 'required',
            'reppassword' => 'required|same:despassword',
            'fullname' => 'required',
            'mainaddress' => 'required',
        ], [
            'desusername.unique' => 'This username is already taken.',
        ]);

        if (User::where('username', $validatedData['desusername'])->exists()) {
           return redirect('register')->withErrors(['desusername' => 'This username is already taken.']);
        }
    
        $user = new User();
        $user->username = $validatedData['desusername'];
        $user->password = bcrypt($validatedData['despassword']);
        $user->fullname = $validatedData['fullname'];
        $user->main_address = $validatedData['mainaddress'];
        $user->save();
    
        return redirect('/');
    }
    
    public function getUsers(){
        $users = User::orderBy('created_at', 'desc')->simplePaginate(50);
        return view('find-users', ['users' => $users]);
    }

    public function getUserView($username) {
        $user = User::where('username', $username)->firstOrFail();
        $addresses = Address::where('username', $username)->get();
        return view('view-user', ['user' => $user, 'addresses' => $addresses]);
    }

    public function getAddresses($username){
        $addresses = Address::where('username', $username)->get();
        return $addresses;
    }

    public function getUserEdit($username) {
        $addresses = $this->getAddresses($username);
        $user = User::where('username', $username)->firstOrFail();
        return view('edit-user', ['user' => $user, 'addresses' => $addresses]);
    }

    public function getCounts(){
        $userCount = User::count();
        $additionalAddressCount = Address::count();
        $addressCount = $userCount + $additionalAddressCount;

        return view('home', [
            'userCount' => $userCount,
            'addressCount' => $addressCount,
        ]);
    }

    public function userSearch(Request $request)
    {
        $input = $request->input('input');
    
        $users = User::where('fullname', 'like', '%' . $input . '%')->simplePaginate(50);
    
        return view('search-results', ['users' => $users]);
    }

    public function exportUsers(){
        return FacadesExcel::download(new UserExport, 'users.xlsx');
    }
}
