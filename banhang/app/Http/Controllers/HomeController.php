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
        $data = DB::table('category')->get();


        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('category')->get();
       
        return view('layouts.app' , compact('data'));
    }
    public function getHome()
    {   
        $data = DB::table('category')->get();
        $nhap_hoa = DB::table('db_flower')->sum('total_money');
        $thu_hoa = DB::table('db_flower')->sum('proceeds');
        $nhap_ao = DB::table('longdress')->sum('tongtien_longdress');
        $thu_ao= DB::table('longdress')->sum('thu_longdress');
        $tongnhap = $nhap_hoa + $nhap_ao;
        $tongthu = $thu_ao + $thu_hoa;
        $dabanhoa   =  DB::table('db_flower')->sum('sold');
        $dabanao  = DB::table('longdress')->sum('daban_longdress');
        $tongban = $dabanhoa + $dabanao;
        $sl_hoa   =  DB::table('db_flower')->sum('soluong');
        $sl_ao  = DB::table('longdress')->sum('soluong_longdress');
        $sl = $sl_ao + $sl_hoa;

        $product =  DB::table('lich_su')->get();
        return  view('home' , compact('data','tongthu','tongnhap','tongban','sl','product'));
    }
    public  function  postHome()
    {           
       $nhap_hoa = DB::table('db_flower')->sum('total_money');

        $thu_hoa = DB::table('db_flower')->sum('proceeds');
        $nhap_ao = DB::table('longdress')->sum('tongtien_longdress');
        $thu_ao= DB::table('longdress')->sum('thu_longdress');

        $tongnhap = $nhap_hoa + $nhap_ao;
        $tongthu = $thu_ao + $thu_hoa;
        $dabanhoa   =  DB::table('db_flower')->sum('sold');
        $dabanao  = DB::table('longdress')->sum('daban_longdress');
        $tongban = $dabanhoa + $dabanao;
        $sl_hoa   =  DB::table('db_flower')->sum('soluong');
        $sl_ao  = DB::table('longdress')->sum('soluong_longdress');
        $sl = $sl_ao + $sl_hoa;
        $con  = $sl - $tongban;

        $arrayName = array('tongnhap' =>$tongnhap , 'tongban' =>$tongthu ,'sl_ban'=>$tongban , 'sl_nhap'=>$sl,'con_hang'=>$con );
         $insert = DB::table('lich_su')->insert($arrayName);
           return redirect('home');
    }
    public function getCategory($id)
    {
        switch ($id) {
            case 1:
                return redirect('decorative');
                break;
            case 2:
               return redirect('longdress');
                break;
            default:
                # code...
                break;
        }
        

    }
    public function getDecorative()
    {
        $data = DB::table('category')->get();
        $product = DB::table('db_flower')->join('colorboard','db_flower.id_clorb','=','colorboard.id_color')->get();
        $nhap_hang = DB::table('db_flower')->sum('total_money');
        $thu_ve = DB::table('db_flower')->sum('proceeds');
        $sl_hang = DB::table('db_flower')->sum('soluong');
        $sl_ban  =   DB::table('db_flower')->sum('sold');
        $con_hang = $sl_hang - $sl_ban;
         return view('shop.Decorative.index',compact('data','product','nhap_hang','thu_ve','sl_hang' , 'sl_ban','con_hang'));
    }
    public function getCreateDecorative()
    {
        $data = DB::table('category')->get();
        $color = DB::table('colorboard')->get();
        return view('shop.Decorative.create',compact('data','color'));
    }
    public function  postCreateDecorative(Request  $re)
    {
         $sl  = $re->sl;
         $tien = $re->picre;
         $tong   = $tien * $sl ;
         $daban  = 0;
         $thu = $daban  * $tien  ;
         $hieu  = $tong - $thu ;
         $file  = $re->file('file');
         $fileName = $file->getClientOriginalName('file');
         $file->move('img',$fileName);
         $tien = $re->picre;
         $still = $sl - $daban;
         $arrayName = array('name_flower' => $re->name_Hoa , 'pic_flower'=>$fileName , 'id_category'=>1 , 'id_clorb'=>$re->color_db , 'soluong'=>$sl ,'price' => $tien , 'total_money' => $tong,
          'sold' => $daban , 'proceeds'=>$thu,'still' =>$still );
           $insert = DB::table('db_flower')->insert($arrayName);
           return redirect('decorative');


    }
  
    public function  getUpdate($id)
    {
        $product = DB::table('db_flower')->where('id_flower',$id)->get();
        $data = DB::table('category')->get(); 
        return view('shop.Decorative.update',compact('data','product'));
    }
    public function  postUpdate(Request  $re, $id)
    {
       $err = '';
       $nub = $re->sl ;
      $still = $re->slco;
      $tien  = $re->gt;
      $piccon = $re->da;
      $nubs = $nub +  $piccon;
         if ($nubs < $still) {
            
             $con = $still - $nubs;
             $tongban  = $con - $nub;
             
             $thu = $nubs * $tien;
             $arrayName = array('sold' => $nubs , 'proceeds' => $thu , 'still' => $con );
            $update = DB::table('db_flower')->where('id_flower',$id)->update($arrayName);
            return redirect('decorative');

         }elseif ($nub <= $still) {
              $thu = $nubs * $tien;
              $nubs = $nub +  $piccon;
              $con = $still - $nub;
               $tongban  = $con -  $re->sl;
               $arrayName = array('sold' =>  $nubs , 'proceeds' => $thu , 'still' => $con );
            $update = DB::table('db_flower')->where('id_flower',$id)->update($arrayName);
            return redirect('decorative');
         }
          else {
             $err= 'vượt quá số lượng trong kho';
             return redirect('decorative');
         }
         
       echo $still;
    }
    public function getEdit($id)
    {
       $data = DB::table('category')->get();
       $product = DB::table('db_flower')->where('id_flower',$id)->get(); 
       $color = DB::table('colorboard')->get();

       return view('shop.Decorative.edit',compact('data','product','color'));
   
    }
    public function postEdit(Request $re , $id)
    {
       $file  = $re->file('file');
         $fileName = $file->getClientOriginalName('file');
        echo $fileName;
    }
    public function getLongDress()
    {
       $data = DB::table('category')->get();
       $product = DB::table('longdress')->join('colorboard','longdress.color_longdress','=','colorboard.id_color')->join('db_size','longdress.size_longdress','=','db_size.id_size')->get();
       $nhap_hang = DB::table('longdress')->sum('tongtien_longdress');
        $thu_ve = DB::table('longdress')->sum('thu_longdress');
       return view('shop.longdress.index' , compact('data','product','nhap_hang','thu_ve'));

    }
    public function getCreateLong()
    {
         $data = DB::table('category')->get();
         $color = DB::table('colorboard')->get();
         $size = DB::table('db_size')->get();
         return view('shop.longdress.create' , compact('data' ,'color','size'));
    }
    public function postCreateLong(Request $re)
    {
        $sl  = $re->sl;
         $tien = $re->picre;
         $tong   = $tien * $sl ;
         $daban  = 0;
         $thu = $daban  * $tien  ;
         $hieu  = $tong - $thu ;
         $file  = $re->file('file');
         $fileName = $file->getClientOriginalName('file');
         $file->move('img',$fileName);
         $tien = $re->picre;
         $still = $sl - $daban;
         $arrayName = array('name_longdress' => $re->name_Ao , 'pic_longdress'=>$fileName , 'cat_longdress'=>1 , 'color_longdress'=>$re->color_db , 'soluong_longdress'=>$sl ,'size_longdress'=>$re->size_db,'picre_longdress' => $tien , 'tongtien_longdress' => $tong,
          'daban_longdress' => $daban , 'thu_longdress'=>$thu,'conhang_longdress' =>$still );
         $insert = DB::table('longdress')->insert($arrayName);
           return redirect('longdress');
    }
    public function getUpdateLong($id)
    {
         $product = DB::table('longdress')->where('id_longdress',$id)->get();
        $data = DB::table('category')->get(); 
        return view('shop.longdress.update',compact('data','product'));
    }
    public function  postUpdateLong(Request $re,$id)
    {
        $nub = $re->sl ;
      $still = $re->slco;
      $tien  = $re->gt;
      $piccon = $re->da;
       $nubs = $nub +  $piccon;
         if ($nubs < $still) {
           
             $con = $still - $nubs;
             $tongban  = $con - $nub;
             
             $thu = $nubs * $tien;
             $arrayName = array('daban_longdress' => $nubs , 'thu_longdress' => $thu , 'conhang_longdress' => $con );
            $update = DB::table('longdress')->where('id_longdress',$id)->update($arrayName);
            return redirect('longdress');

         } else {
             return redirect('longdress') ;
         }
    }
    public function  deleteflower($id)
    {
          $deleteCouse = DB::table('db_flower')->where('id_flower', $id)->delete();
       
       return back();
    }

    public function deleteLong($id)
    {
         $deleteCouse = DB::table('longdress')->where('id_longdress', $id)->delete();
       
       return back();
    }
}
