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
        $data = DB::table('cauhoi')->get();
        
       return view('home',compact('data'));
    }
    public function postHome(Request $re)
    {
        $ma = $re->id;
       
         for($i = 5; $i<=$ma ; $i++){
           $select =  $re->$i;
          echo $select;
            echo "<br>";
            $data = DB::table('cauhoi')->select('dapan')->where('id',$i)->get();
            $obj =  json_encode($data);
            // ?var_dump($obj);
            
            // echo $data;
         //    if($select == '2'){
         //        echo "dung";
         //    }else{
         //        echo "sai";
         //    }
         // }
       }
 
    
    }
}
