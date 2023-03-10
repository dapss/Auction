<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListCrud;

class CRUD extends Controller
{
    //
    function index() {

        $list = ListCrud::all();
        return view('dashboard', compact('list'));
    }

    function addCRUD(Request $request) {

        $request->validate([
            'name'=>'required',
            // 'id'=>'required',
            'description'=>'required',
            'opening'=>'required',
            'date'=>'required',
            'status'=>'required',
            
        ]);

        $query = DB::table('tb_barang')->insert([
            // 'id_barang'=>$request->input('id'),
            'nama_barang'=>$request->input('name'),
            'deskripsi_barang'=>$request->input('description'),
            'harga_awal'=>$request->input('opening'),
            'tanggal'=>$request->input('date'),
            'status'=>$request->input('status'),
        ]);

        if($query) {
            return back()->with('success', 'Data have been successfuly inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }

        return redirect('dashboard');
    }

    // function show($id) {
    //     $detail = Detail::find($id);
    //     return view('detail.show', ['detail' => $detail]);
    // }
    function show(ListCrud $list, $id_barang) 
    {
        // $list = ListCrud::find($id_barang);
        $list = ListCrud::where('id_barang',$id_barang)->get();

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
        $item = ListCrud::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard')->with('success', 'Item deleted successfully');
    }


    function edit($id) {
        // echo $id;
        $row = DB::table('tb_barang')
        ->where('id_barang', $id)
        ->first();
        $data = [
            'Info'=>$row,
            'Title'=>'Edit'
        ];
        return view('items.editPage', $data);
    }

    function update(Request $request) {
        $request->validate([
            'name'=>'required',
            // 'id'=>'required',
            'description'=>'required',
            'opening'=>'required',
            'date'=>'required',
            'status'=>'required',
        ]);

        $updating = DB::table('tb_barang')
                        ->where('id_barang', $request->input('id'))
                        ->update([
                            'nama_barang'=>$request->input('name'),
                            'deskripsi_barang'=>$request->input('description'),
                            'harga_awal'=>$request->input('opening'),
                            'tanggal'=>$request->input('date'),
                            'status'=>$request->input('status'),
                        ]);

                        $updating = DB::table('tb_lelang')
                        ->where('id_lelang', $request->input('id'))
                        ->update([
                            'status'=>$request->input('status'),
                        ]);
        return redirect('dashboard');
    }

}
