<?php

namespace App\Http\Controllers;

use App\Models\dich_vu;
use App\Models\invoiceroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;

class InvoiceRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user = Auth::user();
        // dd($user);
        $search = $request->get('search');
        $listhddv= invoiceroom::join("dich_vu", "hoa_don_dv.id_dv", "=", "dich_vu.id_dv")
        ->where("create_at", "like", "%$search%")
        ->paginate(10);
        return view('invoice_room.index', [
            'listhddv' => $listhddv,
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

        $dichvu = dich_vu::all();
        return view('invoice_room.create', [
            "dichvu" => $dichvu,
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
        $name = $request->get('dichvu');
        $soluong = $request->get('soluong');
        $createat = $request->get('createat');
        $data = new invoiceroom();
        $data->id_dv=$name;
        $data->so_luong=$soluong;
        $data -> create_at=$createat;

        $data->save();
        return redirect()->route('invoice_room.index');
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
