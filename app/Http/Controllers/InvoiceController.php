<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\hoa_don;
use App\Models\phongnghi;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ngay = $request->get('ngay');
        $phongnghi= phongnghi::all();
        $user = admin::all();
        $query = hoa_don::query();
        $query->join("phong_nghi", "hoa_don.id_phong", "=", "phong_nghi.id_room")
        ->join("user", "hoa_don.id_user", "=", "user.id");
        if($search != NULL) {
            $query->where("phong_nghi.so_phong", "like", "%$search%");
        }
        if($ngay != NULL) {
            $query->where("hoa_don.tg_tao", "like", "%$ngay%");
        }
        $invoice=$query->paginate(10);
        return view('invoice.index', [
            'user' => $user,
            'phongnghi'=>$phongnghi,
            'invoice'=>$invoice,
            'search' => $search,
            'ngay'=>$ngay,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Listphong = phongnghi::all();
        $listUser = admin::all();
        return view('invoice.create', [
            "Listphong" => $Listphong,
            "listUser"=>$listUser
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('phong');
        $thanhtoan = $request->get('thanhtoan');
        $user= $request->get('user');
        $giobt = $request->get('bt');
        $tao = $request->get('tao');
        $data = new hoa_don();
        $data->id_phong=$name;
        $data->id_user=$user;
        $data -> gio_bat_dau=$giobt;
        $data->thanh_toan=$thanhtoan;
        $data->tg_tao=$tao;
        $data->save();
        return redirect()->route('invoice.index');
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
        $Listphong = phongnghi::all();
        $listUser = admin::all();
        $hoaDon = hoa_don::join("phong_nghi", "hoa_don.id_phong", "=", "phong_nghi.id_room")
        ->join("user", "hoa_don.id_user", "=", "user.id")->find($id);
        return view('invoice.edit',[
            "Listphong" => $Listphong,
            "listUser"=>$listUser,
            "hoaDon"=> $hoaDon
        ]);
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
        $name = $request->get('phong');
        $user= $request->get('user');
        $giobt = $request->get('bt');
        $thanhtoan = $request->get('thanhtoan');
        $tao = $request->get('tao');
        $data =  hoa_don::find($id);
        $data->id_phong=$name;
        $data->id_user=$user;
        $data -> gio_bat_dau=$giobt;
        $data->thanh_toan=$thanhtoan;
        $data->tg_tao=$tao;
        $data->save();
        return redirect()->route('invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hoa_don::where('id_hd', $id)->delete();
        return redirect()->back();
    }
}
