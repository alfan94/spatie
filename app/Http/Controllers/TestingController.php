<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tes;

class TestingController extends Controller
{

    public function __construct(){
        $this->middleware('role_or_permission:tes',['only'=>['coba']]);
            
        }
    
    public function index()
    {
        $tamtam=Db::table('tes')->get();
        return view('tes',compact('tamtam'));
    }
    public function create(Request $request)
    {
          $te= new Tes;
          $te->nama=$request->nama;
          $te->save();
    }
    public function coba()
    {
        dd('bau');
    }
}
