<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index()
    {
        $log = DB::table('log')->orderBy('waktu','DESC')->paginate(10);
        $data['title'] = "Log";
        $data['sub'] = 'Riwayat Login';
        return view('log.index',$data,['logs' => $log] );
    }
}
