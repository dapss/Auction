<?php

namespace App\Http\Controllers;

use App\Models\ListCrud;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ListCrud::all();
        return view('dashboard', compact('list'));
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
        $request->validate([
            'name'=>'required',
            'id'=>'required',
            'description'=>'required',
            'opening'=>'required',
            'date'=>'required',
        ]);

        $query = DB::table('tb_barang')->insert([
            'id_barang'=>$request->input('id'),
            'nama_barang'=>$request->input('name'),
            'deskripsi_barang'=>$request->input('description'),
            'harga_awal'=>$request->input('opening'),
            'tgl'=>$request->input('date'),
        ]);

        if($query) {
            return back()->with('success', 'Data have been successfuly inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListCrud  $listCrud
     * @return \Illuminate\Http\Response
     */
    public function show(ListCrud $listCrud)
    {
        return view('detail',compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListCrud  $listCrud
     * @return \Illuminate\Http\Response
     */
    public function edit(ListCrud $listCrud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListCrud  $listCrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListCrud $listCrud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListCrud  $listCrud
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListCrud $listCrud)
    {
        //
    }
}
