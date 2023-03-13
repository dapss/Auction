<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\ListCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $listLelang = Lelang::all();
        $list = ListCrud::all();
        return view('auction', compact('listLelang'));
    }

    // public function index3()
    // {
    //     $list = ListCrud::all();
    //     return view('auction', compact('list'));
    // }

    public function index2($id) {
        $listLelang = ListCrud::where('id_barang', $id)->get();
        return view('auction.start', compact('listLelang'));
    }

    // public function user() {
    //     $user = auth()->user();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $request->validate([
            // 'name'=>'required',
            'item-id'=>'required',
            'item-name'=>'required',
            'date'=>'required',
            'bid'=>'required',
            'name'=>'required',
            'auctioneer'=>'required',
            'status'=>'required',
        ]);

        $query = DB::table('tb_lelang')->insert([
            // 'id_barang'=>$request->input('id'),
            'id_barang'=>$request->input('item-id'),
            'nama_barang'=>$request->input('item-name'),
            'tanggal_lelang'=>$request->input('date'),
            'harga_akhir'=>$request->input('bid'),
            'user_name'=>$request->input('name'),
            'auctioneer'=>$request->input('auctioneer'),
            'status'=>$request->input('status'),
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

    public function bid($id)
    {
        //
         // echo $id;
         $row = DB::table('tb_lelang')
         ->where('id_barang', $id)
         ->first();
         $data = [
             'Info'=>$row,
             'Title'=>'Bid'
         ];
         return view('auction.bid', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $originalValue = DB::table('tb_lelang')->where('id_lelang', $request->input('id'))->value('harga_akhir');

        $request->validate([
            'item-id'=>'required',
            'item-name'=>'required',
            'date'=>'required',
            // 'bid'=>'required',
            'bid' => 'required|numeric|gt:' . $originalValue,
            'name'=>'required',
            'auctioneer'=>'required',
            'status'=>'required',
        ]);

        $updating = DB::table('tb_lelang')
                        ->where('id_lelang', $request->input('id'))
                        ->update([
                            'id_barang'=>$request->input('item-id'),
                            'nama_barang'=>$request->input('item-name'),
                            'tanggal_lelang'=>$request->input('date'),
                            // 'harga_akhir'=>$request->input('bid'),
                            'harga_akhir' => $request['bid'],
                            'user_name'=>$request->input('name'),
                            'auctioneer'=>$request->input('auctioneer'),
                            'status'=>$request->input('status'),
                        ]);

        $updatings = DB::table('tb_barang')
                        ->where('id_barang', $request->input('id'))
                        ->update([
                            'status'=>$request->input('status'),
                        ]);
        return redirect('auction');
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
