<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AccoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ListAccount = admin::where("name", "like", "%$search%")
        ->paginate(5);
        return view('account.index',[
            'ListAccount'=>$ListAccount,
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
        $ListAccount = admin::all();
        return view('account.create', [
            "ListAccount " => $ListAccount
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
        $password = $request->get('password');
        $phone = $request->get('phone');
        $quyen = $request->get('quyen');
        $account = new admin();
        $account->name=$name;
        $account->pass=$password;
        $account->phone=$phone;
        $account->quyen=$quyen;
        $account->save();
        return redirect()->route('account.index');
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
        $account = admin::Where('id',$id)->first();
        return view('account.edit',compact('account'));
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
        $name=$request->get('name');
        $password = $request->get('password');
        $phone = $request->get('phone');
        $quyen = $request->get('quyen');
        $account = admin::find($id);
        $account->name=$name;
        $account->pass=$password;
        $account->phone=$phone;
        $account->quyen=$quyen;
        $account->save();
        return redirect()->route('account.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id', $id)->delete();
        return redirect()->back();
    }
}
