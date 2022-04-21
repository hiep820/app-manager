<?php

namespace App\Http\Controllers;

use App\Models\dich_vu;
use App\Models\invoiceroom;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data= $request->all();
        // dd($data);
        // $form_date=$data['form_date'];
        // $to_date=$data['to_date'];
        // $get = invoiceroom::whereBetween('create_at',[ $form_date, $to_date ])->orderBy('create_at','ASC')->get();
        // foreach($get as $key=>$value){
        //     $chart_data[]=array(
        //         'ngay'=>$value->created_at,
        //         'soluong'=>$value->so_luong,
        //     );
        // };
        $search = $request->get('thang');
        $thang = $request->get('thangg');
        $ten=$request->get('ten');
        // dd($thang);
        $sum=0;
        $tong=0;
        $query = invoiceroom::query();

        // dd($tong);

        $dichvu = dich_vu::all();
        $sum=invoiceroom::join("dich_vu", "hoa_don_dv.id_dv", "=", "dich_vu.id_dv")
        ->whereBetween("create_at", array($search,$thang))
        ->where("dich_vu.name" ,"like","%$ten%")
        ->sum('so_luong');

        $invoicedv = invoiceroom::join("dich_vu", "hoa_don_dv.id_dv", "=", "dich_vu.id_dv")
            ->where("dich_vu.name" ,"like","%$ten%")
            ->whereBetween("create_at", array($search,$thang))
            ->paginate(10);

            // $query->join("dich_vu", "hoa_don_dv.id_dv", "=", "dich_vu.id_dv");
            // if($ten!= NULL) {
            //     $query->where("dich_vu.name","like","%$ten%");
            // }
            // if($search!= NULL && $thang != NULL ) {
            //     $query->whereBetween("create_at", array($search,$thang));
            // }
            // $invoicedv=$query->paginate(10);

            foreach($invoicedv as $key){
                $tong+= $key->gia * $key->so_luong;

            }
        return view('thongke.index', [
            'ten'=>$ten,
            'search' =>$search,
            'invoicedv' => $invoicedv,
            'sum'=>$sum,
            'dichvu'=>$dichvu,
            'tong'=>$tong,
            'thang'=>$thang

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
