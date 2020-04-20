<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('ban')->get();
        return view('home',compact('data'));
    }
    public function getListMon($id)
    {    
        $data = DB::table('mon_an')->get();
        return  view('MonAn.listMon' , compact('data'));
    }
    public function  getInsertMon()
    {   
        $loai  = DB::table('loai_mon')->get();
        return view('MonAn.create' , compact('loai'));
    }
    public function  postInsertMon(Request $re)
    {      
           $file  = $re->file('file');
           $fileName = $file->getClientOriginalName('file');
           $file->move('img',$fileName);
           $name = $re->name_mon;
           $price = $re->name_gt;
           $sl  = $re->name_sl;
           $loai = $re->name_loai;
           $tong =  $price * $sl;
           $daban  =  0;
           $conhang = $sl  -  $daban;
           $tp  = $re->name_tp;
           $tongban  = $sl  * $daban;
           $thu = $tong - $tongban;
           $arrayName = array('name_mon' =>$name ,'pic_mon' =>$fileName , 'picre_mon'=>$price,'sl_mon'=>$sl , 'tong_mon'=>$tong , 'daban' => $daban ,'conmon'=>$conhang , 'tongtiendaban'=>$tongban ,  'loai_mon'=>$loai ,  'thanhphan'=>$tp);
            $insert = DB::table('mon_an')->insert($arrayName);
         return redirect('home');
           

    }
    public function getdat()
    {
      
    }
}
