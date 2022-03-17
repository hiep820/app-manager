<?php

namespace App\Http\Controllers;

use App\Models\phongloai;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ListKindOfRoom = phongloai::where("loai", "like", "%$search%")
        ->paginate(5);
        return view('kind_of_room.index',[
            'ListKindOfRoom'=>$ListKindOfRoom,
            'search'=>$search,
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
        return view('kind_of_room.create', [
            "ListKindOfRoom " => $ListKindOfRoom
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
        $gia = $request->get('gia');
        $data = new phongloai();
        $data->loai=$name;
        $data->gia=$gia;
        $data->save();
        return redirect()->route('kind_of_room.index');
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
        $data = phongloai::where('id',$id)->first();
        return view('kind_of_room.edit',compact('data'));
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
        $gia = $request->get('gia');
        $data = phongloai::find($id);
        $data->loai=$name;
        $data->gia=$gia;
        $data->save();
        return redirect()->route('kind_of_room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        phongloai::where('id', $id)->delete();
        return redirect()->back();
    }
}
