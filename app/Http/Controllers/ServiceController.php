<?php

namespace App\Http\Controllers;

use App\Models\dich_vu;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ListService = dich_vu::where("name", "like", "%$search%")
        ->paginate(5);
        return view('service_s.index',[
            'ListService'=>$ListService,
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
        $data = dich_vu::all();
        return view('service_s.create', [
            "data" => $data
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
        $data = new dich_vu();
        $data->name = $name;
        $data->gia=$gia;
        $data->save();
        return redirect()->route('service_s.index');
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
        $data = dich_vu::find();
        return view('service_s.edit',compact('data'));
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
        $data = dich_vu::find($id);
        $data->name=$name;
        $data->gia=$gia;
        $data->save();
        return redirect()->route('service_s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dich_vu::where('id_dv', $id)->delete();
        return redirect()->back();
    }
}