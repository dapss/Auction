<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\ListCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Lelang::all();
        return view('auction', compact('list'));
    }

    // public function index2($id)
    // {
    //     $row = DB::table('tb_barang')
    //     ->where('id_barang', $id)
    //     ->get();
    //     $data = [
    //         'Info'=>$row,
    //         'Title'=>'Edit'
    //     ];
    //     return view('auction.start', $data);
    // }

    public function index2($id) {
        $list = ListCrud::where('id_barang', $id)->get();
        return view('auction.start', compact('list'));
    }

    // public function user() {
    //     $user = auth()->user();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $request->validate([
            // 'name'=>'required',
            'id'=>'required',
            'auction-date'=>'required',
            'bid'=>'required',
            'user'=>'required',
            'petugas'=>'required',
        ]);

        $query = DB::table('tb_lelang')->insert([
            // 'id_barang'=>$request->input('id'),
            'id_barang'=>$request->input('id'),
            'tanggal_lelang'=>$request->input('auction-date'),
            'harga_akhir'=>$request->input('bid'),
            'id_user'=>$request->input('user'),
            'id_petugas'=>$request->input('petugas'),
        ]);

        if($query) {
            return back()->with('success', 'Data have been successfuly inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }

        return redirect('dashboard');
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
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(Lelang $lelang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lelang $lelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lelang $lelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lelang $lelang)
    {
        //
    }
}
