<?php

namespace App\Http\Controllers;

use App\Models\phongloai;
use App\Models\phongnghi;
use Illuminate\Http\Request;

class PhongNghiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $LoaiPhong = $request->get('id-room');
        $trangthai = $request->get('tinh-trang');
        $ListKindOfRoom = phongloai::all();
        $query = phongnghi::query();
        $query->join("phongloai", "phong_nghi.loai_phong", "=", "phongloai.id");
        if($LoaiPhong!= NULL) {
            $query->where("phong_nghi.loai_phong", $LoaiPhong);
        }
        if($trangthai != NULL) {
            $query->where("phong_nghi.tinh_trang", $trangthai);
        }
        if($search != NULL) {
            $query->where("so_phong", "like", "%$search%");
        }
        $listRoomForRest=$query->paginate(10);
        return view('room_for_rest.index', [

            'LoaiPhong'=>$LoaiPhong,
            'listRoomForRest' => $listRoomForRest,
            'ListKindOfRoom'=>$ListKindOfRoom,
            'trangthai'=>$trangthai,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListKindOfRoom = phongloai::all();
        return view('room_for_rest.create', [
            "ListKindOfRoom" => $ListKindOfRoom
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
        $name = $request->get('name');
        $LoaiPhong = $request->get('loaiphong');
        $TinhTrang = $request->get('tinhtrang');
        $data = new phongnghi();
        $data->so_phong=$name;
        $data->loai_phong=$LoaiPhong;
        $data -> tinh_trang =$TinhTrang;
        $data->save();
        return redirect()->route('room_for_rest.index');
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
        $ListKindOfRoom = phongloai::all();
        $listRoomForRest = phongnghi::join("phongloai","phong_nghi.loai_phong","=","phongloai.id")->find($id);
        return view('room_for_rest.edit',[
            'ListKindOfRoom'=>$ListKindOfRoom,
            'listRoomForRest'=>$listRoomForRest
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
        $name = $request->get('name');
        $LoaiPhong = $request->get('loaiphong');
        $TinhTrang = $request->get('tinhtrang');
        $data = phongnghi::find($id);
        $data->so_phong=$name;
        $data->loai_phong=$LoaiPhong;
        $data -> tinh_trang =$TinhTrang;
        $data->save();
        return redirect()->route('room_for_rest.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        phongnghi::where('id_room', $id)->delete();
        return redirect()->back();
    }
}
