<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    
    

    public function Authenticate(Request $request){
        $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ],
        [
            'nim.required'=> 'NIM tidak boleh kosong',
            'password.required'=> 'Password tidak boleh kosong'
        ]
        
    );
        $credentials = $request->only('nim','password');
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $nama = auth()->user()->nama;
            $nim = auth()->user()->nim;
            $waktu = date('Y-m-d H:i:s');

            $query = DB::table('log')->insert([
                'nama' => $nama,
                'nim' => $nim,
                'waktu' => $waktu
            ]);

            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'error' => 'Nim atau Password yang di masukkan tidak terdaftar',
        ]);
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('');
    }
}
