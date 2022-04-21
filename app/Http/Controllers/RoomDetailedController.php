<?php

namespace App\Http\Controllers;

use App\Models\phongnghi;
use App\Models\room_detailed;
use Illuminate\Http\Request;

class RoomDetailedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = room_detailed::query();
        $query->join("phong_nghi", "room_detailed.id_phong", "=", "phong_nghi.id_room");
        if($search != NULL) {
            $query->where("create_at", "like", "%$search%");
        }
        $RoomDetail=$query->paginate(10);
        return view('room_detailed.index', [

            'RoomDetail' =>$RoomDetail,
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
        $ListRoom = phongnghi::all();
        return view('room_detailed.create', [
            "ListRoom" => $ListRoom
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
        $sophong = $request->get('sophong');
        $sogio = $request->get('gio');
        $sotien = $request->get('tien');
        $note = $request->get('note');
        $thoigian = $request->get('tg');
        $data = new room_detailed();
        $data->id_phong =$sophong;
        $data->so_gio_nghi=$sogio;
        $data -> gia_tien =$sotien;
        $data->note=$note;
        $data->create_at=$thoigian;
        $data->save();
        return redirect()->route('room_detailed.index');
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
        $ListRoom = phongnghi::all();
        $RoomDetail =room_detailed::join("phong_nghi", "room_detailed.id_phong", "=", "phong_nghi.id_room")->find($id);
        return view('room_detailed.edit',[
            'ListRoom'=>$ListRoom,
            'RoomDetail'=>$RoomDetail
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
        $sophong = $request->get('sophong');
        $sogio = $request->get('gio');
        $sotien = $request->get('tien');
        $note = $request->get('note');
        $thoigian = $request->get('tg');
        $data =  room_detailed::find($id);
        $data->id_phong=$sophong;
        $data->so_gio_nghi=$sogio;
        $data -> gia_tien =$sotien;
        $data->note=$note;
        $data->create_at=$thoigian;
        $data->save();
        return redirect()->route('room_detailed.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        room_detailed::where('id_room_detailed', $id)->delete();
        return redirect()->back();
    }
}
