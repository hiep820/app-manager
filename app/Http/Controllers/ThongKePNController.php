<?php

namespace App\Http\Controllers;

use App\Models\hoa_don;
use App\Models\phongnghi;
use App\Models\room_detailed;
use Illuminate\Http\Request;

class ThongKePNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('thang');
        $thang = $request->get('thangg');
        $ten=$request->get('ten');
        $sum=0;
        $tong=0;

        $listRoom = phongnghi::all();

        $invoice = hoa_don::join("phong_nghi", "hoa_don.id_phong", "=", "phong_nghi.id_room")
        ->join("phongloai", "phong_nghi.loai_phong", "=", "phongloai.id")
        ->join("user", "hoa_don.id_user", "=", "user.id")
        ->where("phong_nghi.so_phong" ,"like","%$ten%")
        ->whereBetween("tg_tao", array($search,$thang))
        ->paginate(10);

            // $sogiay = strtotime(date('Y-m-d H:i:s', strtotime('gio_ket_thuc'))) - strtotime(date('Y-m-d H:i:s', strtotime('gio_bat_dau')));
            // $sogio = $sogiay / 60 / 60;
            // // dd($sogio);

        $sum= hoa_don::join("phong_nghi", "hoa_don.id_phong", "=", "phong_nghi.id_room")
        ->join("phongloai", "phong_nghi.loai_phong", "=", "phongloai.id")
        ->join("user", "hoa_don.id_user", "=", "user.id")
        ->whereBetween("tg_tao", array($search,$thang))
        ->where("phong_nghi.so_phong" ,"like","%$ten%")
        ->sum('so_gio');

        foreach ($invoice as $key){
            if($key->so_gio>0){
                $tong+=100000 + ($key->gia * $key->so_gio - $key->gia);
            }
        }

        return view('thongke_pn.index',[
            'invoice'=>$invoice,
            'sum' =>$sum,
            'tong'=>$tong,
            'ten'=>$ten,
            'search' =>$search,
            'thang'=>$thang,
            'listRoom'=>$listRoom,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
