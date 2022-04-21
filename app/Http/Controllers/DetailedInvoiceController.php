<?php

namespace App\Http\Controllers;

use App\Models\hoa_don;
use App\Models\hoa_don_ct;
use App\Models\phongnghi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailedInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $phongnghi = phongnghi::all();
        $invoice= hoa_don::join("phong_nghi", "hoa_don.id_phong", "=", "phong_nghi.id_room")
        ->join("user", "hoa_don.id_user", "=", "user.id");
        $query = hoa_don_ct::query();
        $data=$query->join("hoa_don", "hoa_don_ct.id_hd", "=", "hoa_don.id_hd")
        ->join("phong_nghi", "hoa_don.id_phong", "=", "phong_nghi.id_room")
        ->join("phongloai", "phong_nghi.loai_phong", "=", "phongloai.id")
        ->join("user", "hoa_don.id_user", "=", "user.id");
        if($search != NULL) {
            $query->where("phong_nghi.so_phong", "like", "%$search%");
        };


        // $sogiay = (strtotime(date('Y-m-d H:i:s', strtotime($query->max('hoa_don_ct.gio_ket_thuc')))) - strtotime(date('Y-m-d H:i:s', strtotime($query->max('hoa_don.gio_bat_dau')))));
        // $sogio = $sogiay/60/60;
        $invoicedetailed=$query->paginate(10);

        return view('detailed_invoice.index', [
            // 'sotien' =>$sotien,
            // 'sogio' =>$sogio,
            'phongnghi' =>$phongnghi,
            'invoicedetailed'=>$invoicedetailed,
            'invoice'=>$invoice,
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

        $listHD = hoa_don::all();
        return view('detailed_invoice.create', [

            "listHD"=>$listHD
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
        $hoadon = $request->get('hoadon');
        $ketthuc = $request->get('ketthuc');
        $tao = $request->get('tao');
        $data = new hoa_don_ct();
        $data->id_hd=$hoadon;
        $data->gio_ket_thuc=$ketthuc;
        $data->gio_tao=$tao;
        $data->save();
        return redirect()->route('detailed_invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = hoa_don_ct::find($id);
        return view('detailed_invoice.edit',compact('data'));
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
        $hoadon = $request->get('hoadon');
        $ketthuc = $request->get('ketthuc');
        $tao = $request->get('tao');
        $data =  hoa_don_ct::find($id);
        $data->id_hd=$hoadon;
        $data->gio_ket_thuc=$ketthuc;
        $data->gio_tao=$tao;
        $data->save();
        return redirect()->route('detailed_invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hoa_don_ct::where('id_hdct', $id)->delete();
        return redirect()->back();
    }
}
