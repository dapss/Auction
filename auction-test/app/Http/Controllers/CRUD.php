<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\ListCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUD extends Controller
{
    //
    function index(Request $request)
    {
        $status = $request->input('status', 'all');
        if ($status == 'all') {
            $list = listCrud::orderByRaw("CASE WHEN status = 'open' THEN 1 WHEN status = 'closed' THEN 2 ELSE 3 END")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $list = listCrud::where('status', $status)->orderBy('created_at', 'desc')->get();
        }

        return view('dashboard', ['list' => $list, 'status' => $status], compact('list'));
    }

    public function create()
    {
        return view('items.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'harga_awal' => 'required',
            'auctioneer' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'lots' => 'required',

        ]);

        $input = $request->all();

        if ($image = $request->file('lots')) {
            $destinationPath = 'bids/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['lots'] = "$profileImage";
        }

        ListCrud::create($input);

        return redirect()->route('dashboard')->with('success', 'Data have been successfuly inserted');
    }

    // function show($id) {
    //     $detail = Detail::find($id);
    //     return view('detail.show', ['detail' => $detail]);
    // }
    function show(ListCrud $list, $id_barang)
    {
        // $list = ListCrud::find($id_barang);
        $list = ListCrud::where('id_barang', $id_barang)->get();

        return view('items.detail', compact('list'));
    }

    // function delete(ListCrud $id_barang) {
    //     $delete = DB::table('tb_barang')
    //     ->where('id_barang', $id_barang)
    //     ->delete();
    //     return redirect('tb_barang');
    // }

    public function destroy($id)
    {
        $delete = DB::table('tb_barang')
            ->where('id_barang', $id)
            ->delete();

        $delete = DB::table('tb_lelang')
            ->where('id_barang', $id)
            ->delete();

        return redirect()->route('dashboard')->with('success', 'Item deleted successfully');
    }


    function edit($id)
    {
        // echo $id;
        $row = DB::table('tb_barang')
            ->where('id_barang', $id)
            ->first();
        $data = [
            'Info' => $row,
            'Title' => 'Edit'
        ];
        return view('items.editPage', $data);
    }

    function update(Request $request, ListCrud $barang)
    {
        $request->validate([
            'name' => 'required',
            // 'id'=>'required',
            'description' => 'required',
            'auctioneer' => 'required',
            'opening' => 'required',
            'date' => 'required',
            'status' => 'required',
            // 'lots'=>'required',
        ]);

        $updating = DB::table('tb_barang')
            ->where('id_barang', $request->input('id'))
            ->update([
                'nama_barang' => $request->input('name'),
                'deskripsi_barang' => $request->input('description'),
                'harga_awal' => $request->input('opening'),
                'auctioneer' => $request->input('auctioneer'),
                'tanggal' => $request->input('date'),
                'status' => $request->input('status'),
                // 'lots' => $request['lots'],
            ]);

        $updatings = DB::table('tb_lelang')
            ->where('id_barang', $request->input('id'))
            ->update([
                'status' => $request->input('status'),
            ]);

        $updatingss = DB::table('tb_history_lelang')
            ->where('id_barang', $request->input('id'))
            ->update([
                'nama_barang' => $request->input('name'),
                'auctioneer' => $request->input('auctioneer'),
            ]);

        return redirect('dashboard');

    }

}